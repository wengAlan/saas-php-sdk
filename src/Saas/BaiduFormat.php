<?php
namespace Saas;

/**
 * Undocumented class
 */
final class BaiduFormat{
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function token($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $return_json_data = array(
                'component_access_token' =>  !empty($json_data['data']['access_token']) ? $json_data['data']['access_token'] : null,
                'expires_in'             =>  !empty($json_data['data']['expires_in']) ? $json_data['data']['expires_in'] : 0,
                'scope'                  =>  !empty($json_data['data']['scope']) ? $json_data['data']['scope'] : '',
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function pre_auth_code($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $return_json_data = array(
                'pre_auth_code' =>  !empty($json_data['data']['pre_auth_code']) ? $json_data['data']['pre_auth_code'] : null,
                'expires_in'    =>  !empty($json_data['data']['expires_in']) ? $json_data['data']['expires_in'] : 0,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function applets_access_token($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array(
            'authorizer_access_token'   =>  !empty($json_data['access_token']) ? $json_data['access_token'] : null,
            'authorizer_refresh_token'  =>  !empty($json_data['refresh_token']) ? $json_data['refresh_token'] : null,
            'expires_in'                =>  !empty($json_data['expires_in']) ? $json_data['expires_in'] : 0,
        );
        return array(  0, '请求成功' ,$return_json_data);
    }


    /**
     * Undocumented function
     *
     * @param [type] $json_data
     * @return void
     */
    public static function get_applets_info($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $applets_icon = '';
           
            if(!empty($json_data['data']['photo_addr'])){
                $json_data['data']['photo_addr'] = json_decode($json_data['data']['photo_addr'],true);
                $applets_icon = $json_data['data']['photo_addr'][0]['cover'];
            }
            $return_json_data = array(
                'app_id'            =>  !empty($json_data['data']['app_id']) ? $json_data['data']['app_id'] : null,
                'app_name'          =>  !empty($json_data['data']['app_name']) ? $json_data['data']['app_name'] : null,
                'app_key'           =>  !empty($json_data['data']['app_key']) ? $json_data['data']['app_key'] : null,
                'app_desc'          =>  !empty($json_data['data']['app_desc']) ? $json_data['data']['app_desc'] : null,
                'applets_icon'      =>  $applets_icon,
                'qualification'      =>  !empty($json_data['data']['qualification']) ? $json_data['data']['qualification'] : null,
                'category'          =>  !empty($json_data['data']['category']) ? $json_data['data']['category'] : null,
                'audit_info'        =>  !empty($json_data['data']['audit_info']) ? $json_data['data']['audit_info'] : null,
                'modify_count'      =>  !empty($json_data['data']['modify_count']) ? $json_data['data']['modify_count'] : null,
                'auth_info'         =>  !empty($json_data['data']['auth_info']) ? $json_data['data']['auth_info'] : null,
                'min_swan_version'  =>  !empty($json_data['data']['min_swan_version']) ? $json_data['data']['min_swan_version'] : null,
                'min_swan_version'  =>  !empty($json_data['data']['min_swan_version']) ? $json_data['data']['min_swan_version'] : null,
                'status'            =>  isset($json_data['data']['status']) ? $json_data['data']['status'] : -1,
                'web_status'        =>  isset($json_data['data']['web_status']) ? $json_data['data']['web_status'] : 0,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function refresh_applets_access_token($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        $return_json_data = array(
            'authorizer_access_token'   =>  !empty($json_data['access_token']) ? $json_data['access_token'] : null,
            'authorizer_refresh_token'  =>  !empty($json_data['refresh_token']) ? $json_data['refresh_token'] : null,
            'expires_in'                =>  !empty($json_data['expires_in']) ? $json_data['expires_in'] : 0,
        );
        return array(  0, '请求成功' ,$return_json_data);
    }

     /**
     * Undocumented function
     *
     * @return void
     */
    public static function find_authorization_code($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $return_json_data = array(
                'authorization_code' =>  !empty($json_data['data']['authorization_code']) ? $json_data['data']['authorization_code'] : null,
                'expires_in'    =>  !empty($json_data['data']['expires_in']) ? $json_data['data']['expires_in'] : 0,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function get_template_list($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $return_json_data = array(
                'count'         =>  !empty($json_data['data']['count']) ? $json_data['data']['count'] : 0,
                'template_list' =>  !empty($json_data['data']['list']) ? $json_data['data']['list'] : 0,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

     /**
     * Undocumented function
     *
     * @return void
     */
    public static function del_template($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = null;
        if($json_data['errno'] == 0){
            $return_json_data = array(
                'result'        =>  true,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function draft_list($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $return_json_data = array(
                'count'        =>  !empty($json_data['data']['count']) ? $json_data['data']['count'] : 0,
                'draft_list'   => !empty($json_data['data']['list']) ? $json_data['data']['list'] : array(),
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function add_draft_to_template($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['data'] && $json_data['msg'] == 'success'){
            $return_json_data = array(
                'result'        =>  !empty($json_data['data']['template_id']) ? $json_data['data']['template_id'] : false,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function upload_applets($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $return_json_data = array(
                'result'        =>  true,
            );
        }else{
            $return_json_data = array(
                'result'        =>  false,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function submit_audit($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $return_json_data = array(
                'result'        =>  true,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function release($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $return_json_data = array(
                'result'        =>  true,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function rollback($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $return_json_data = array(
                'result'        =>  true,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function cancle_review($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $return_json_data = array(
                'result'        =>  true,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function get_package_list($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();

        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $data =  $json_data['data'];
            
           if(!empty($data)){
            foreach ($data as &$_data ){
                if (!isset($_data['upload_status'])) $_data['upload_status'] =0;
                if (!isset($_data['upload_status_desc'])) $_data['upload_status_desc'] ='';
                if (!isset($_data['rollback_version']))   $_data['rollback_version'] ='';
                if (!isset($_data['remark']))             $_data['remark'] ='';
                if (!isset($_data['msg']))                $_data['msg'] ='';
                if (!isset($_data['remark']))             $_data['remark'] ='';
                if (!isset($_data['status']))             $_data['status'] = 0;
                if (!isset($_data['package_id']))         $_data['package_id'] = 0;
            }
           }
            $return_json_data = array(
                'page_list'        =>  $data,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function get_package_detail($json_data = null ){
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();

        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $data =  $json_data['data'] ? $json_data['data'] : array();
            $return_json_data = $data;
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    
     /**
     * 检查参数
     *
     * @param [type] $json_data
     * @return void
     */
    public static function get_applet_qrcode( $body,$headers,$json_data = null ){
        if(!empty($json_data) ){
            return array($json_data['error_code'],$json_data['error_msg'],null);
        }
        if(empty($body)){
            return array(90000,'无内容数据',null);

        }
        
        $return_json_data = array(
            'content_type' =>  $headers['Content-Type'],
            'content_length' =>  $headers['Content-Length'],
            'image_binary_stream' => $body,
        );
       
        
        return array(  0,'success' ,$return_json_data);

    }

    /**
     * Undocumented function
     *
     * @param [type] $json_data
     * @return void
     */
    public static function modify_services_domain($json_data = null)
    {
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();

        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $data =  $json_data['data'] ? $json_data['data'] : array();
            $request_domain = $upload_domain = $download_domain = $socket_domain = array();
            if($data){
                $request_domain     = explode(',',$data['request_domain']);
                $upload_domain      = explode(',',$data['upload_domain']);
                $download_domain    = explode(',',$data['download_domain']);
                $socket_domain      = explode(',',$data['socket_domain']);
                $return_json_data   = array(
                   'request_domain'     =>  $request_domain,
                   'upload_domain'      =>  $upload_domain,
                   'download_domain'    =>  $download_domain,
                   'socket_domain'      =>  $socket_domain
                );
            }else{
                $return_json_data = $data;

            }
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @param [type] $json_data
     * @return void
     */
    public static function modify_webview_domain($json_data = null)
    {
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();

        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){

            $data =  $json_data['data'] ? $json_data['data'] : array();
            if($data){
                $web_view_domain     = explode(',',$data);
                $return_json_data   = $web_view_domain;
            }else{
                $return_json_data =  array();

            }
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }


    /**
     * Undocumented function
     *
     * @param [type] $json_data
     * @return void
     */
    public static function modify_platform_services_domain($json_data = null)
    {
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();

        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $data =  $json_data['data'] ? $json_data['data'] : array();
            $request_domain = $upload_domain = $download_domain = $socket_domain = array();
            if($data){
                $return_json_data   = array(
                   'request_domain'     =>  $data['request_domain'],
                   'upload_domain'      =>  $data['upload_domain'],
                   'download_domain'    =>  $data['download_domain'],
                   'socket_domain'      =>  $data['socket_domain'],
                );
            }else{
                $return_json_data = $data;

            }
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * Undocumented function
     *
     * @param [type] $json_data
     * @return void
     */
    public static function modify_platform_webview_domain($json_data = null)
    {
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();

        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $return_json_data =  $json_data['data'] ? $json_data['data'] : array();
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $json_data
     * @return void
     */
    public static function set_support_version ($json_data = null)
    {
        list($result , $response_data) = self::check_response_data ( $json_data);
        if (!$result)  return $response_data;
        $return_json_data = array();
        if($json_data['errno'] == 0  && $json_data['msg'] == 'success'){
            $return_json_data = array(
                'result'        =>  true,
            );
        }
        $errno   = isset($json_data['errno']) ? $json_data['errno'] : '90000';
        $msg     = isset($json_data['msg']) ? $json_data['msg'] : '请求数据失败';
        return array(  $errno, $msg ,$return_json_data);
    }

    /**
     * 检查参数
     *
     * @param [type] $json_data
     * @return void
     */
    protected static function check_response_data ( $json_data = null ){
        if(empty($json_data) || $json_data === null){
            return array(false,array(0,'请求失败',null));
        }
        
        if(isset($json_data['error'])){
            return array(false,array($json_data['error'],$json_data['error_description'],null));

        }
        if(isset($json_data['errno'])){
            if($json_data['errno'] != 0 ){
                return array(false,array($json_data['errno'],$json_data['msg'],null));
            }
        }
        if(isset($json_data['error_code']) || isset($json_data['error_msg'])){
            return array(false,array($json_data['error_code'],$json_data['error_msg'],null));

        }
        
        return array(true , null);

    }


    
   
}
    