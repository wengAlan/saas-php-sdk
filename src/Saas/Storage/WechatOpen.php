<?php
namespace Saas\Storage;

use Saas\Config;
use Saas\Baidu;
use Saas\Wechat;
use Saas\Http\Client;
use Saas\Http\Error;
/**
 * Wechat Applet Third Party Open Class
 */
final class WechatOpen
{
    /**
     * Configuration file name
     */

    /**
     * Get Wechat third-party platform access_token
     * @param string $client_id
     * @param string $ticket
     * @param [type] $appsecret
     * @return void
     */
    public static function  token ( $client_id = null, $ticket = null, $appsecret = null )
    {
        //获取url
        $config_key        = 'token_url';
        $access_token_url = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params           = array(
            'client_id'   => $client_id,
            'ticket'      => $ticket,
        );
        $keys = http_build_query($params, null, '&');
        $request_url = $access_token_url.'?'.$keys;

        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
        return array($response->json(), null);
    }   

    /**
     * Get Wechat Applet Third-Party Pre-Authorization Code pre_auth_code
     * @param [type] $access_token
     * @param [type] $client_id
     * @return void
     */
    public static function pre_auth_code ( $token = null , $client_id = null )
    {
        //获取url
        $config_key           = 'pre_auth_code_url';
        $pre_auth_code_url   = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
            'access_token'   => $token,
        );
        $keys = http_build_query($params, null, '&');
        $request_url = $pre_auth_code_url.'?'.$keys;
        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
        return array($response->json(), null);
    }

    /**
     * Get Wechat Applet Third Party Authorization Page Information
     * @param [type] $client_id
     * @param [type] $pre_auth_code
     * @param [type] $redirect_uri
     * @return void
     */
    public static function authorization_information ( $client_id = null , $pre_auth_code = null , $redirect_uri =null )
    {
         //获取url
         $config_key           = 'authorization_page_url';
         $pre_auth_code_url   = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params              = array(
            'client_id'         =>  $client_id,
            'pre_auth_code'     =>  $pre_auth_code,
            'redirect_uri'      =>  $redirect_uri
         );
         $keys = http_build_query($params, null, '&');
         $request_url = $pre_auth_code_url.'?'.$keys;
         return array(array('stat'=>1,'request_url'=>$request_url,'msg'=>'success'),null);
    }
    
    /**
     * Get the interface calling credentials and authorization information of the applet after authorizing the Baidu applet third-party platform
     *
     * @param [type] $token
     * @param [type] $authorization_code
     * @param string $grant_type
     * @return void
     */
    public static function applets_token ( $token, $authorization_code, $grant_type='app_to_tp_authorization_code' )
    {
         //获取url
         $config_key                  = 'applets_access_token_url';
         $applets_access_token_url   = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params              = array(
            'access_token'      =>  $token,
            'code'              =>  $authorization_code,
            'grant_type'        =>  $grant_type
         );
         $keys = http_build_query($params, null, '&');
         $request_url = $applets_access_token_url.'?'.$keys;
         $response  = Client::get($request_url);
         if (!$response->ok()) {
             return array(null, new Error($request_url, $response));
         }
         return array($response->json(), null);
    }

    /**
     * Refresh the interface call credentials of the authorization applet
     * @param [type] $token
     * @param [type] $refresh_token
     * @param string $grant_type
     * @return void
     */
    public static function refresh_applets_token ( $token, $refresh_token, $client_id = null, $authorizer_appid = null, $grant_type='app_to_tp_authorization_code')
    {
        //获取url
        $config_key                  = 'refresh_applets_token_url';
        $applets_access_token_url   = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
           'access_token'      =>  $token,
           'refresh_token'     =>  $refresh_token,
           'grant_type'        =>  $grant_type
        );
        $keys = http_build_query($params, null, '&');
        $request_url = $applets_access_token_url.'?'.$keys;
        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
        return array($response->json(), null);
    }

    /**
     * Wechat third-party platform retrieves authorization code
     * @param [type] $token
     * @param [type] $applet_app_id
     * @return void
     */
    public static function find_authorization_code ( $token,$applet_app_id)
    {
        //获取url
        $config_key                  = 'find_authorization_code_url';
        $applets_access_token_url   = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
           'access_token'       =>  $token,
           'app_id'             =>  $applet_app_id,
        );
        $response  = Client::post($applets_access_token_url,$params);
        if (!$response->ok()) {
            return array(null, new Error($applets_access_token_url, $response));
        }
        return array($response->json(), null);
    }

    /**
     * Wechat authorized applet upload package
     * @param [type] $access_token
     * @param [type] $template_id
     * @param [type] $user_desc
     * @param [type] $user_version
     * @param [type] $ext_json
     * @return void
     */
    public static function upload_applets($access_token,$template_id,$user_desc,$user_version,$ext_json)
    {
        //获取url
        $config_key                   = 'upload_applets_url';
        $upload_applets_url          = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        if(!is_array( $ext_json ))
                $ext_json = json_encode($ext_json);
        $params              = array(
           'access_token'       =>  $access_token,
           'template_id'        =>  $template_id,
           'user_desc'          =>  $user_desc,
           'user_version'       =>  $user_version,
           'ext_json'           =>  $ext_json
        );
        $response  = Client::post($upload_applets_url,$params);
        if (!$response->ok()) {
            return array(null, new Error($upload_applets_url, $response));
        }
        return array($response->json(), null);
    }

    /**
     * Wechat authorized applet upload package
     * @param [type] $access_token
     * @param [type] $template_id
     * @param [type] $user_desc
     * @param [type] $user_version
     * @param [type] $ext_json
     * @return void
     */
    public static function submit_audit_applets($access_token, $content, $package_id,$remark , $feedback_info = null ,$feedback_stuff = null)
    {
        //获取url
        $config_key                   = 'submit_audit_applets_url';
        $submit_audit_applets_url    = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
           'access_token'       =>  $access_token,
           'content'            =>  $content,
           'package_id'         =>  $package_id,
           'remark'             =>  $remark,
        );
        $response  = Client::post($submit_audit_applets_url,$params);
        if (!$response->ok()) {
            return array(null, new Error($submit_audit_applets_url, $response));
        }
        return array($response->json(), null);
    }

    /**
     * Applet release
     * @param [type] $access_token
     * @param [type] $package_id
     * @return void
     */
    public static function release ( $access_token,$package_id)
    {
         //获取url
         $config_key                   = 'release_url';
         $release_url                 = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params              = array(
            'access_token'       =>  $access_token,
            'package_id'         =>  $package_id,
         );
         $response  = Client::post($release_url,$params);
         if (!$response->ok()) {
             return array(null, new Error($release_url, $response));
         }
         return array($response->json(), null); 
    }

    /**
     * Applet rollback
     * @param [type] $access_token
     * @param [type] $package_id
     * @return void
     */
    public static function rollback ( $access_token,$package_id)
    {
         //获取url
         $config_key                   = 'rollback_url';
         $release_url                 = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params              = array(
            'access_token'       =>  $access_token,
            'package_id'         =>  $package_id,
         );
         $response  = Client::post($release_url,$params);
         if (!$response->ok()) {
             return array(null, new Error($release_url, $response));
         }
         return array($response->json(), null); 
    }

    /**
     * Authorize applet to revoke review
     * @param [type] $access_token
     * @param [type] $package_id
     * @return void
     */
    public static function withdraw ( $access_token,$package_id = null)
    {
         //获取url
         $config_key                   = 'withdraw_url';
         $withdraw_url                = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params                 = array(
            'access_token'       =>  $access_token,
            'package_id'         =>  $package_id,
         );
         $response  = Client::post($withdraw_url,$params);
         if (!$response->ok()) {
             return array(null, new Error($withdraw_url, $response));
         }
         return array($response->json(), null); 
    }

    /**
     * Get a list of pages for uploaded code
     * @param [type] $access_token
     * @return void
     */
    public static function get_package_list ( $access_token )
    {
        //获取url
        $config_key                   = 'get_package_list_url';
        $get_package_list_url        = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
            'access_token'       =>  $access_token,
        );
        $keys = http_build_query($params, null, '&');
        $request_url = $get_package_list_url.'?'.$keys;
        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
        return array($response->json(), null); 
    }


    /**
     * Wechat Applet Third Party Platform Template List
     * @param [type] $token
     * @param [type] $page
     * @param [type] $page_size
     * @return void
     */
    public static function get_template_list ( $token, $page = null ,$page_size = null )
    {

        //获取url
        $config_key                   = 'get_template_list_url';
        $get_template_list_url       = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
            'access_token'       =>  $token,
        );
        $keys = http_build_query($params, null, '&');
        $request_url = $get_template_list_url.'?'.$keys;
        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
        return array($response->json(), null); 
    }

    /**
     * Wechat applet third-party platform delete template
     * @param [type] $token
     * @param [type] $page
     * @param [type] $page_size
     * @return void
     */
    public static function del_template ( $token, $template_id )
    {

        //获取url
        $config_key                   = 'get_del_template_url';
        $get_del_template_url        = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
            'access_token'       =>  $token,
            'template_id'        =>  $template_id,
        );
        $response  = Client::post($get_del_template_url,$params);
        if (!$response->ok()) {
            return array(null, new Error($get_del_template_url, $response));
        }
        return array($response->json(), null); 
    }

    /**
     * Wechat Applet Third Party Platform Draft List
     * @param [type] $token
     * @param [type] $page
     * @param [type] $page_size
     * @return void
     */
    public static function get_draft_list ( $token, $page = null ,$page_size = null )
    {

        //获取url
        $config_key                   = 'get_draft_list_url';
        $get_draft_list_url          = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params                  = array(
            'access_token'       =>  $token,
        );
        $keys = http_build_query($params, null, '&');
        $request_url = $get_draft_list_url.'?'.$keys;
        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
        return array($response->json(), null); 
    }

    /**
     * Add draft to template
     * @param [type] $token
     * @param [type] $draft_id
     * @param [type] $user_desc
     * @return void
     */
    public static  function  add_draft_to_template ( $token, $draft_id ,$user_desc )
    {
         //获取url
         $config_key                   = 'get_add_draft_to_tmp_url';
         $get_add_draft_to_tmp_url    = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params                  = array(
             'access_token'       =>  $token,
             'draft_id'           =>  $draft_id,
             'user_desc'          =>  $user_desc,
         );
         $response  = Client::post($get_add_draft_to_tmp_url,$params);
         if (!$response->ok()) {
             return array(null, new Error($get_add_draft_to_tmp_url, $response));
         }
         return array($response->json(), null); 

    }
    


}
