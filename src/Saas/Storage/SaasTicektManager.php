<?php
namespace Saas\Storage;

use Saas\Config;
use Saas\Http\Error;
use Saas\Utils\AesEncryptUtil;

/**
 * saasTicek protocol control class
 *  [包含：微信，百度，今日头条]
 * 主要用来调用调用Saas第三方开发平台的接口
 *
 */
final class SaasTicektManager
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
       
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $key
     * @param [type] $code
     * @return void
     */
    public function decrypt ( $key = null ,$code = null )
    {
        $encryUtil = new AesEncryptUtil($key);
        $result = $encryUtil ->decrypt($code);
        return $result;
    }
   

}