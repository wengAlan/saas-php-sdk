<?php
namespace Saas;
/**
 * Configuration file class
 */
final class Config
{
    const SDK_VER = '1.0.0';
    const BADI_CONFING_NAME ='Saas\Baidu';
    const WECHAT_CONFING_NAME ='Saas\Wechat';
    const DOMAIN_KEY          = array(
        'download_domain','request_domain','socket_domain','upload_domain'
    );

    /**
     * Undocumented function
     */
    public function __construct()
    {   

    }

    /**
     * Get config information
     * @param [type] $config_name
     * @param [type] $config_key
     * @return void
     */
    public static function getConfigByKey($config_name,$config_key)
    {
        try{
            $config_info  = $config_name::returnUrlList();
            if(!array_key_exists($config_key,$config_info))
                return false;
            return $config_info[$config_key];
        }catch(\Exception $exception){
            return false;
        }
        
    }



}
