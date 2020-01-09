<?php
namespace Saas\Storage;

use Saas\Config;
use Saas\Http\Error;
/**
 * Saas applet template management Class
 *  [包含：微信，百度，今日头条]
 * 主要用来调用调用Saas第三方开发平台的接口
 *
 */
final class SaasStencilManager
{
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
    
    /**
     * Saas platform template list
     * @param [type] $token
     * @param integer $page
     * @param integer $page_size
     * @return void
     */
    public function get_template_list ($token ,$page = 1, $page_size = 10)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::get_template_list( $token, $page  ,$page_size );
        return  $result;  
    }

    /**
     * Saas platform delete template
     * @param [type] $token
     * @param [type] $template_id
     * @return void
     */
    public function del_template ( $token ,$template_id )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::del_template( $token, $template_id );
        return  $result;  
    }

    /**
     * Saas platform draft list
     * @param [type] $token
     * @param integer $page
     * @param integer $page_size
     * @return void
     */
    public function draft_list  ($token ,$page = 1, $page_size = 10)
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::get_draft_list( $token, $page  ,$page_size);
        return  $result;  
    }

    /**
     * Saas adds draft as template
     * @return void
     */
    public function add_draft_to_template( $token, $draft_id ,$user_desc = null )
    {
        $classname = $this->class_name;
        if(!class_exists($classname)){
            return array(null, new Error('', 'Does not match the specified platform'));
        }
        $result    = $classname::add_draft_to_template( $token, $draft_id ,$user_desc );
        return  $result;  
    }

    


}