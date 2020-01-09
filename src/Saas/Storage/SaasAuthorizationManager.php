<?php
namespace Saas\Storage;

use Saas\Config;
use Saas\Http\Error;

/**
 * Saas applet authorization management Class
 *  [包含：微信，百度，今日头条]
 * 主要用来调用调用Saas第三方开发平台的接口
 *
 */
final class SaasAuthorizationManager
{   
    public static $instance;

    /**
     * sass调用的平台渠道
     * @var [type]
     */
    public  $channel;
    public  $class_name;
    private $config;
    /**
     * Construction method
     */
    public function __construct ($channel)
    {
        $this->channel    =  $channel;
        $name             =  $channel.'Open';
        $this->class_name =  str_replace('classname', $name, 'Saas\Storage\classname');
    }
    
    public static function getinstance($channel)
    {
        if (!self::$instance) {
            self::$instance = new self($channel);
        }

        return self::$instance;
    }

    /**
     * Get third-party platform access_token
     * @param [type] $ticket
     * @param [type] $client_id
     * @param [type] $appsecret
     * @return void
     */
    public function token ( $ticket, $client_id, $appsecret= null )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::token($client_id,$ticket,$appsecret);
       return  $result;
    }

    /**
     * Get pre-authorization code
     * @param [type] $client_id
     * @param [type] $access_token
     * @return void
     */
    public function pre_auth_code ( $token, $client_id = null )
    {
       $classname = $this->class_name;
       if(!class_exists($classname)){
        return array(null, new Error('', 'Does not match the specified platform'));
      }
       $result    = $classname::pre_auth_code( $token,$client_id );
       return  $result;
    }

    /**
     * Get Authorization Pag
     * @param [type] $client_id
     * @param [type] $pre_auth_code
     * @param [type] $redirect_uri
     * @return void
     */
    public function authorization ($client_id = null, $pre_auth_code = null , $redirect_uri = null)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::authorization_information( $client_id, $pre_auth_code , $redirect_uri);
        return  $result;
    }

    /**
     * Get the interface call credentials and authorization information of the applet after authorizing the third-party platform
     * [获取授权第三方平台后的小程序的接口调用凭据和授权信息]
     * @param [type] $token
     * @param [type] $authorization_code
     * @param [type] $client_id
     * @return void
     */
    public function applets_access_token ( $token, $authorization_code, $client_id = null )
    {   
        
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::applets_token( $token, $authorization_code );
        return  $result;
    }


     /**
     * Refresh applet refresh_token
     *
     * @param [type] $token
     * @param [type] $refresh_token
     * @param [type] $client_id
     * @param [type] $authorizer_appid
     * @return void
     */
    public function refresh_applets_access_token ( $token, $refresh_token, $client_id = null,$authorizer_appid = null)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::refresh_applets_token( $token, $refresh_token, $client_id, $authorizer_appid);
        return  $result;
    }

    

    /**
     * Undocumented function
     *
     * @param [type] $token
     * @param [type] $applet_app_id
     * @return void
     */
    public function find_authorization_code ( $token,$applet_app_id )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        if($classname == Config::WECHAT_CONFING_NAME)
        {
            return array(null, new Error('', 'WeChat no search authorization code interface'));

        }
        $result    = $classname::find_authorization_code( $token, $applet_app_id );
        return  $result;
    }
    
   
     /**
     * Get applet details
     *
     * @param [type] $token
     * @param [type] $refresh_token
     * @param [type] $client_id
     * @param [type] $authorizer_appid
     * @return void
     */
    public function get_applets_info  ( $access_token , $client_id = null , $authorizer_appid = null) 
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::applets_info( $access_token, $client_id, $authorizer_appid);
        return  $result;
    }

}