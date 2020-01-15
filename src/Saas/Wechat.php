<?php
namespace Saas;

/**
 * Undocumented class
 */
final class Wechat{
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function returnUrlList(){
        return array(
            'access_token_url'              =>  'https://api.weixin.qq.com/cgi-bin/component/api_component_token',
            'pre_auth_code_url'             =>  'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode',
            'authorization_page_url'        =>  'https://mp.weixin.qq.com/cgi-bin/componentloginpage',
            'applets_token_url'             =>  'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token',
            'refresh_applets_token_url'     =>  'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token',
            'upload_applets_url'            =>  'https://api.weixin.qq.com/wxa/commit',
            'submit_audit_applets_url'      =>  'https://api.weixin.qq.com/wxa/submit_audit',
            'release_url'                   =>  'https://api.weixin.qq.com/wxa/release',
            'rollback_url'                  =>  'https://api.weixin.qq.com/wxa/revertcoderelease',
            'withdraw_url'                  =>  'https://api.weixin.qq.com/wxa/undocodeaudit',
            'get_package_list_url'          =>  'https://api.weixin.qq.com/wxa/get_page',
            'get_template_list_url'         =>  'https://api.weixin.qq.com/wxa/gettemplatelist',
            'get_del_template_url'          =>  'https://api.weixin.qq.com/wxa/deletetemplate',
            'get_draft_list_url'            =>  'https://api.weixin.qq.com/wxa/gettemplatedraftlist',
            'get_add_draft_to_tmp_url'      =>  'https://api.weixin.qq.com/wxa/addtotemplate',
            'set_applet_support_version'    =>  'https://openapi.baidu.com/rest/2.0/smartapp/app/setsupportversion',

        );
    }
}
    