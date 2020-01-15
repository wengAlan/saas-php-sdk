<?php
namespace Saas\Storage;

use Saas\Config;
use Saas\Format;
use Saas\Baidu;
use Saas\Wechat;
use Saas\Http\Client;
use Saas\Http\Error;
/**
 * Baidu Applet Third Party Open Class
 */
final class BaiduOpen
{
    /**
     * Configuration file name
     */

    /**
     * Get Baidu third-party platform access_token
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'token',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }   

    /**
     * Get Baidu Applet Third-Party Pre-Authorization Code pre_auth_code
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'pre_auth_code',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     *Get Baidu Applet Third Party Authorization Page Information
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
         return array(array('authorization_url'=>$request_url),array('errno'=>0,'msg'=>'请求成功'));
    }
    
    /**
     * Get the interface calling credentials and authorization information of the applet after authorizing the Baidu applet third-party platform
     *
     * @param [type] $token
     * @param [type] $authorization_code
     * @param string $grant_type
     * @return void
     */
    public static function applets_token ( $token, $authorization_code, $client_id = null )
    {
         //获取url
         $config_key                  = 'applets_access_token_url';
         $applets_access_token_url   = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $grant_type='app_to_tp_authorization_code';
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

         //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'applets_access_token',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
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
        $grant_type  = 'app_to_tp_refresh_token';
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

         //格式化输出百度或者微信数据
         list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'refresh_applets_access_token',Format::BADI_FORMAT_NAME);
         return array($json_data,array('errno'=>$errno,'msg'=>$msg));
        // return array($response->json(), null);
    }

    public static function applets_info ( $access_token , $client_id = null , $authorizer_appid = null) 
    {
         //获取url
         $config_key                  = 'get_applets_info_url';
         $get_applets_info_url       = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params                     = array(
            'access_token'           =>  $access_token,
         );
         $keys = http_build_query($params, null, '&');
         $request_url = $get_applets_info_url.'?'.$keys;
         $response  = Client::get($request_url);
         if (!$response->ok()) {
             return array(null, new Error($request_url, $response));
         }
 
          //格式化输出百度或者微信数据
          list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'get_applets_info',Format::BADI_FORMAT_NAME);
          return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Baidu third-party platform retrieves authorization code
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'find_authorization_code',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Baidu authorized applet upload package
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
        if(is_array( $ext_json ))  $ext_json = json_encode($ext_json,true);
              
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
         //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'upload_applets',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Baidu authorized applet upload package
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'submit_audit',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Applet release
     * @param [type] $access_token
     * @param [type] $package_id
     * @return void
     */
    public static function release ( $access_token = null ,$package_id = null )
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'release',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));  
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
         $rollback_url                 = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params              = array(
            'access_token'       =>  $access_token,
            'package_id'         =>  $package_id,
         );
         $response  = Client::post($rollback_url,$params);
         if (!$response->ok()) {
             return array(null, new Error($rollback_url, $response));
         }
         //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'rollback',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));  
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
          //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'cancle_review',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg)); 
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
          //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'get_package_list',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg)); 
    }


    /**
     * Get a list of pages for uploaded code
     * @param [type] $access_token
     * @return void
     */
    public static function get_package_detail ( $access_token ,$packge_type,$package_id)
    {
        //获取url
        $config_key                   = 'get_package_detail_url';
        $get_package_detail_url      = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params              = array(
            'access_token'       =>  $access_token,
        );
        if(!empty($packge_type)) $params['type']       = $packge_type;
        if(!empty($package_id)) $params['package_id']  = $package_id;
        $keys = http_build_query($params, null, '&');
        $request_url = $get_package_detail_url.'?'.$keys;
        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
          //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'get_package_detail',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg)); 
    }


    /**
     * Baidu Applet Third Party Platform Template List
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
         //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'get_template_list',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Baidu applet third-party platform delete template
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'del_template',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Baidu Applet Third Party Platform Draft List
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'draft_list',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
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
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'add_draft_to_template',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));

    }

    /**
     * Add draft to template
     * @param [type] $token
     * @param [type] $draft_id
     * @param [type] $user_desc
     * @return void
     */
    public static  function  get_applet_qrcode ( $access_token, $package_id = '' ,$path = '',$width = 0)
    {
         //获取url
         $config_key                   = 'get_applet_qrcode_url';
         $get_applet_qrcode_url       = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params                      = array(
             'access_token'           =>  $access_token,
            
         );
         if (!empty ($package_id)) $params ['package_id'] = $package_id;
         if (!empty ($path)) $params ['path'] = $path;
         if (!empty ($width)) $params ['width'] = $width;
         $keys = http_build_query($params, null, '&');
        $request_url = $get_applet_qrcode_url.'?'.$keys;
        $response  = Client::get($request_url);
        if (!$response->ok()) {
            return array(null, new Error($request_url, $response));
        }
       

        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getQrCodeFormatData($response->json(),$response->body,$response->headers,'get_applet_qrcode',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));

    }
    
    /**
     * Set applet server domain name
     *
     * @param [type] $access_token
     * @param [type] $action
     * @param [type] $domain_list
     * @return void
     */
    public static  function  modify_services_domain($access_token ,$action ,$domain_list)
    {
        //获取url
        $config_key                           = 'set_applet_service_domain_url';
        $set_applet_service_domain_url       = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params                      = array(
            'access_token'           =>  $access_token,
            'action'                 =>  $action,
        );
        $download_domain_list =  $request_domain_list = $socket_domain_list  = $upload_domain_list = array();
        if($action != 'get'){
            $download_domain_list   =   isset($domain_list['download_domain']) ? (!empty($domain_list['download_domain']) ?$domain_list['download_domain'] : array() ) :array();
            $request_domain_list    =   isset($domain_list['request_domain']) ? (!empty($domain_list['request_domain']) ?$domain_list['request_domain'] : array() ) :array();
            $socket_domain_list     =   isset($domain_list['socket_domain']) ? (!empty($domain_list['socket_domain']) ?$domain_list['socket_domain'] : array() ) :array();
            $upload_domain_list     =   isset($domain_list['upload_domain']) ? (!empty($domain_list['upload_domain']) ?$domain_list['upload_domain'] : array() ) :array();
        }

        if(!empty($download_domain_list)){
            $params['download_domain']  = implode(',',$download_domain_list);
        }
        if(!empty($request_domain_list)){
            $params['request_domain']  = implode(',',$request_domain_list);
        }
        if(!empty($socket_domain_list)){
            $params['socket_domain']  = implode(',',$socket_domain_list);
        }
        if(!empty($upload_domain_list)){
            $params['upload_domain']  = implode(',',$upload_domain_list);
        }
        $response  = Client::post($set_applet_service_domain_url,$params);
        if (!$response->ok()) {
             return array(null, new Error($set_applet_service_domain_url, $response));
         }

       //格式化输出百度或者微信数据
       list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'modify_services_domain',Format::BADI_FORMAT_NAME);
       return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Set applet webview domain name
     *
     * @param [type] $access_token
     * @param [type] $action
     * @param [type] $domain_list
     * @return void
     */
    public static  function  modify_webview_domain($access_token ,$action ,$domain_list)
    {
        //获取url
        $config_key                           = 'set_applet_webview_domain_url';
        $set_applet_webview_domain_url       = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params                      = array(
            'access_token'           =>  $access_token,
            'action'                 =>  $action,
        );
        if($action != 'get'){
            $params['web_view_domain']  = implode(',',$domain_list);

        }
        $response  = Client::post($set_applet_webview_domain_url,$params);

        if (!$response->ok()) {
             return array(null, new Error($set_applet_webview_domain_url, $response));
         }

       //格式化输出百度或者微信数据
       list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'modify_webview_domain',Format::BADI_FORMAT_NAME);
       return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }



    /**
     * Set applet server domain name
     *
     * @param [type] $access_token
     * @param [type] $action
     * @param [type] $domain_list
     * @return void
     */
    public static  function  modify_platform_services_domain($access_token ,$action ,$domain_list)
    {
        //获取url
        $config_key                           = 'set_platform_service_domain_url';
        $set_platform_service_domain_url     = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params                      = array(
            'access_token'           =>  $access_token,
            'action'                 =>  $action,
        );
        $download_domain_list =  $request_domain_list = $socket_domain_list  = $upload_domain_list = array();
        if($action != 'get'){
            $download_domain_list   =   isset($domain_list['download_domain']) ? (!empty($domain_list['download_domain']) ?$domain_list['download_domain'] : array() ) :array();
            $request_domain_list    =   isset($domain_list['request_domain']) ? (!empty($domain_list['request_domain']) ?$domain_list['request_domain'] : array() ) :array();
            $socket_domain_list     =   isset($domain_list['socket_domain']) ? (!empty($domain_list['socket_domain']) ?$domain_list['socket_domain'] : array() ) :array();
            $upload_domain_list     =   isset($domain_list['upload_domain']) ? (!empty($domain_list['upload_domain']) ?$domain_list['upload_domain'] : array() ) :array();
        }

        if(!empty($download_domain_list)){
            $params['download_domain']  = implode(',',$download_domain_list);
        }
        if(!empty($request_domain_list)){
            $params['request_domain']  = implode(',',$request_domain_list);
        }
        if(!empty($socket_domain_list)){
            $params['socket_domain']  = implode(',',$socket_domain_list);
        }
        if(!empty($upload_domain_list)){
            $params['upload_domain']  = implode(',',$upload_domain_list);
        }
        $response  = Client::post($set_platform_service_domain_url,$params);
        if (!$response->ok()) {
             return array(null, new Error($set_platform_service_domain_url, $response));
         }

       //格式化输出百度或者微信数据
       list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'modify_platform_services_domain',Format::BADI_FORMAT_NAME);
       return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Set applet webview domain name
     *
     * @param [type] $access_token
     * @param [type] $action
     * @param [type] $domain_list
     * @return void
     */
    public static  function  modify_platform_webview_domain($access_token ,$action ,$domain_list)
    {
        //获取url
        $config_key                           = 'set_platform_webview_domain_url';
        $set_platform_webview_domain_url     = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
        $params                      = array(
            'access_token'           =>  $access_token,
            'action'                 =>  $action,
        );
        if($action != 'get' && !empty($domain_list)){
            $params['web_view_domain']  = implode(',',$domain_list);

        }
        $response  = Client::post($set_platform_webview_domain_url,$params);

        if (!$response->ok()) {
             return array(null, new Error($set_platform_webview_domain_url, $response));
         }

       //格式化输出百度或者微信数据
       list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'modify_platform_webview_domain',Format::BADI_FORMAT_NAME);
       return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

    /**
     * Undocumented function
     *
     * @param [type] $access_token
     * @param [type] $version
     * @return void
     */
    public static function set_support_version ($access_token,$version)
    {
         //获取url
         $config_key                           = 'set_applet_support_version_url';
         $set_applet_support_version_url      = Config::getConfigByKey(Config::BADI_CONFING_NAME,$config_key);
         $params                      = array(
             'access_token'           =>  $access_token,
             'version'                =>  $version,
         );
       
         $response  = Client::post($set_applet_support_version_url,$params);
         if (!$response->ok()) {
              return array(null, new Error($set_applet_support_version_url, $response));
          }
 
        //格式化输出百度或者微信数据
        list($errno,$msg,$json_data) = Format::getFormatData($response->json(),'set_support_version',Format::BADI_FORMAT_NAME);
        return array($json_data,array('errno'=>$errno,'msg'=>$msg));
    }

}
