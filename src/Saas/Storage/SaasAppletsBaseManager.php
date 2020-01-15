<?php
namespace Saas\Storage;

use Saas\Http\Error;
use Saas\Config;

/**
 * 
 *  [包含：微信，百度，今日头条]
 * 主要用来调用调用Saas第三方开发平台的接口
 *
 */
final class SaasAppletsBaseManager
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
     * Get Applet Qrcode
     *
     * @return void
     */
    public function  get_applet_qrcode ($access_token, $package_id = null ,$scene = null ,$path = null,$width = null)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        switch($this->channel){
            case 'Baidu':
                $result    = $classname::get_applet_qrcode( $access_token, $package_id,$path,$width );

                 break;
            case 'Wechat':
                $result    = $classname::get_applet_qrcode( $access_token, $scene,$path,$width );
                 break;
            default:
                return array(null, new Error('', 'Does not match the specified platform'));
                break;
        }
        return  $result;
    }

    /**
     * Configure applet service domain name
     * @param [string] $access_token
     * @param [string] $action
     * @param [array] $download_domain
     * @param [array] $request_domain
     * @param [array] $socket_domain
     * @param [array] $upload_domain
     * @return void
     */
    public function modify_services_domain ($access_token ,$action , $domain_list = array())
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        if($action != 'get'){
            if(empty($domain_list)){
                return array(null, new Error('', 'No configured domain name parameters'));

            }
            $is_isset = false;
            foreach (Config::DOMAIN_KEY as $_value){
                if(array_key_exists( $_value,$domain_list)){
                    $is_isset = true;
                    break;
                } 
            }
            if(!$is_isset){
                return array(null, new Error('', 'No configured domain name parameters'));

            }

            $is_empty = true;
            array_walk_recursive($domain_list, function($value) use (&$is_empty) {
                if($value) {
                    $is_empty = false;
                    return false;
                }
            });
            if($is_empty){
                return array(null, new Error('', 'No configured domain name parameters'));
            }
        }
        
        
        $result    = $classname::modify_services_domain( $access_token ,$action ,$domain_list  );

        return  $result;

    }


    /**
     * Configure applet business domain name
     * @param [string] $access_token
     * @param [string] $action
     * @param [array] $download_domain
     * @param [array] $request_domain
     * @param [array] $socket_domain
     * @param [array] $upload_domain
     * @return void
     */
    public function modify_webview_domain ($access_token ,$action , $domain_list = array())
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        if($action != 'get'){
            if(empty($domain_list)){
                return array(null, new Error('', 'No configured domain name parameters'));

            }
        }
        
        
        $result    = $classname::modify_webview_domain( $access_token ,$action ,$domain_list  );

        return  $result;

    }


    /**
    * Configure platform service domain name
     * @param [string] $access_token
     * @param [string] $action
     * @param [array] $download_domain
     * @param [array] $request_domain
     * @param [array] $socket_domain
     * @param [array] $upload_domain
     * @return void
     */
    public function modify_platform_services_domain ($token ,$action , $domain_list = array())
    {
        if($this->channel == 'Wechat'){
            return array(null, new Error('', 'This method is not available on this platform'));
 
        }
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        if($action != 'get'){
            if(empty($domain_list)){
                return array(null, new Error('', 'No configured domain name parameters'));

            }
            $is_isset = false;
            foreach (Config::DOMAIN_KEY as $_value){
                if(array_key_exists( $_value,$domain_list)){
                    $is_isset = true;
                    break;
                } 
            }
            if(!$is_isset){
                return array(null, new Error('', 'No configured domain name parameters'));

            }

            $is_empty = true;
            array_walk_recursive($domain_list, function($value) use (&$is_empty) {
                if($value) {
                    $is_empty = false;
                    return false;
                }
            });
            if($is_empty){
                return array(null, new Error('', 'No configured domain name parameters'));
            }
        }
        
        
        $result    = $classname::modify_platform_services_domain( $token ,$action ,$domain_list  );

        return  $result;

    }


    /**
     * Configure platform business domain name
     * @param [string] $access_token
     * @param [string] $action
     * @param [array] $download_domain
     * @param [array] $request_domain
     * @param [array] $socket_domain
     * @param [array] $upload_domain
     * @return void
     */
    public function modify_platform_webview_domain ($access_token ,$action , $domain_list = array())
    {
        if($this->channel == 'Wechat'){
            return array(null, new Error('', 'This method is not available on this platform'));
 
        }
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        if($action != 'get'){
            if(empty($domain_list)){
                return array(null, new Error('', 'No configured domain name parameters'));

            }
        }
        
        
        $result    = $classname::modify_platform_webview_domain( $access_token ,$action ,$domain_list  );

        return  $result;

    }


    /**
     * Set Applets support version
     *
     * @param [string] $access_token
     * @param [string] $version
     * @return array
     */
    public function set_support_version ($access_token ,$version)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        
        $result    = $classname::set_support_version( $access_token ,$version  );

        return  $result;

    }

}