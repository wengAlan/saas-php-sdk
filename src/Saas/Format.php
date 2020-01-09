<?php
namespace Saas;
/**
 * Format file class
 */
final class Format
{
    const SDK_VER = '1.0.0';
    const BADI_FORMAT_NAME ='Saas\BaiduFormat';
    const WECHAT_FORMAT_NAME ='Saas\WechatFormat';

    /**
     * Undocumented function
     */
    public function __construct()
    {   

    }

    /**
     * Get Format information
     * @param [type] $config_name
     * @param [type] $config_key
     * @return void
     */
    public static function getFormatData($responese_data,$method,$format_class = null)
    {
        try{
            list($errno,$msg,$json_data)  = $format_class::$method($responese_data);
            return array($errno,$msg,$json_data);
        }catch(\Exception $exception){
            return false;
        }
        
    }

     /**
     * Get Format information
     * @param [type] $config_name
     * @param [type] $config_key
     * @return void
     */
    public static function getQrCodeFormatData($responese_data,$body,$hearders,$method,$format_class = null)
    {
        try{
            list($errno,$msg,$json_data)  = $format_class::$method($body,$hearders,$responese_data);
           
            return array($errno,$msg,$json_data);
        }catch(\Exception $exception){
            return false;
        }
        
    }



}
