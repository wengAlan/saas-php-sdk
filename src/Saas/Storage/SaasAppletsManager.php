<?php
namespace Saas\Storage;

use Saas\Http\Error;

/**
 * 
 *  [包含：微信，百度，今日头条]
 * 主要用来调用调用Saas第三方开发平台的接口
 *
 */
final class SaasAppletsManager
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
     * Upload Authorization Applet
     * @param [type] $access_token
     * @param [type] $template_id
     * @param [type] $user_desc
     * @param [type] $user_version
     * @param [type] $ext_json
     * @return void
     */
    public function upload ( $access_token, $template_id, $user_desc, $user_version, $ext_json )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::upload_applets($access_token,$template_id,$user_desc,$user_version,$ext_json);
       return  $result;
    }

    /**
     * Submit review applet
     * @param [type] $access_token
     * @param [type] $content
     * @param [type] $package_id
     * @param [type] $remark
     * @param [type] $feedback_info
     * @param [type] $feedback_stuff
     * @return void
     */
    public function submit_audit ( $access_token, $content = null, $package_id = null,$remark = null, $feedback_info = null ,$feedback_stuff = null)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::submit_audit_applets($access_token, $content, $package_id,$remark, $feedback_info ,$feedback_stuff );
       return  $result;
    }


    /**
     * Applet release
     * @param [type] $access_token
     * @param [type] $package_id
     * @return void
     */
    public function release ( $access_token,$package_id = null )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::release($access_token, $package_id );
       return  $result;
    }

    /**
     * Applet rollback
     * @param [type] $access_token
     * @param [type] $package_id
     * @return void
     */
    public function rollback ( $access_token,$package_id = null )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::rollback( $access_token, $package_id );
       return  $result;
    }

    /**
     * Authorize applet to revoke review
     * @param [type] $access_token
     * @param [type] $package_id
     * @return void
     */
    public function cancle_review ( $access_token,$package_id = null )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::withdraw( $access_token, $package_id );
       return  $result;
    }

    /**
     * Get a list of pages for uploaded code
     * @param [type] $access_token
     * @return void
     */
    public function get_package_list ( $access_token )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::get_package_list( $access_token );
       return  $result;
    }

    /**
     * Get a detail code
     *
     * @param [string] $access_token
     * @param [string] $packge_type
     * @param [string] $package_id
     * @return void
     */
    public function get_package_detail ( $access_token,$package_id = null ,$packge_type = null)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
       $result    = $classname::get_package_detail( $access_token ,$packge_type,$package_id);
       return  $result;
    }
    
    
}