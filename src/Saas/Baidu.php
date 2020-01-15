<?php
namespace Saas;

/**
 * Undocumented class
 */
final class Baidu{
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function returnUrlList(){
        return array(
            'token_url'                         =>  'https://openapi.baidu.com/public/2.0/smartapp/auth/tp/token',
            'pre_auth_code_url'                 =>  'https://openapi.baidu.com/rest/2.0/smartapp/tp/createpreauthcode',
            'authorization_page_url'            =>  'https://smartprogram.baidu.com/mappconsole/tp/authorization',
            'applets_access_token_url'          =>  'https://openapi.baidu.com/rest/2.0/oauth/token',
            'refresh_applets_token_url'         =>  'https://openapi.baidu.com/rest/2.0/oauth/token',
            'find_authorization_code_url'        =>  'https://openapi.baidu.com/rest/2.0/smartapp/auth/retrieve/authorizationcode',
            'get_applets_info_url'              =>  'https://openapi.baidu.com/rest/2.0/smartapp/app/info',
            'upload_applets_url'                =>  'https://openapi.baidu.com/rest/2.0/smartapp/package/upload',
            'submit_audit_applets_url'          =>  'https://openapi.baidu.com/rest/2.0/smartapp/package/submitaudit',
            'release_url'                       =>  'https://openapi.baidu.com/rest/2.0/smartapp/package/release',
            'rollback_url'                      =>  'https://openapi.baidu.com/rest/2.0/smartapp/package/rollback',
            'withdraw_url'                      =>  'https://openapi.baidu.com/rest/2.0/smartapp/package/withdraw',
            'get_package_list_url'              =>  'https://openapi.baidu.com/rest/2.0/smartapp/package/get',
            'get_package_detail_url'            =>  'https://openapi.baidu.com/rest/2.0/smartapp/package/getdetail',
            'get_template_list_url'             =>  'https://openapi.baidu.com/rest/2.0/smartapp/template/gettemplatelist',
            'get_del_template_url'              =>  'https://openapi.baidu.com/rest/2.0/smartapp/template/deltemplate',
            'get_draft_list_url'                =>  'https://openapi.baidu.com/rest/2.0/smartapp/template/gettemplatedraftlist',
            'get_add_draft_to_tmp_url'          =>  'https://openapi.baidu.com/rest/2.0/smartapp/template/addtotemplate',
            'get_applet_qrcode_url'             =>  'https://openapi.baidu.com/rest/2.0/smartapp/app/qrcode',
            'set_applet_service_domain_url'     =>  'https://openapi.baidu.com/rest/2.0/smartapp/app/modifydomain',
            'set_applet_webview_domain_url'     =>  'https://openapi.baidu.com/rest/2.0/smartapp/app/modifywebviewdomain',
            'set_platform_service_domain_url'   =>  'https://openapi.baidu.com/rest/2.0/smartapp/tp/modifydomain',
            'set_platform_webview_domain_url'   =>  'https://openapi.baidu.com/rest/2.0/smartapp/tp/modifywebviewdomain',
            'set_applet_support_version_url'    =>  'https://openapi.baidu.com/rest/2.0/smartapp/app/setsupportversion',
        );
    }
}
    