<?php
namespace Saas;

/**
 * Undocumented class
 */
final class WechatFormat{
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
                'scope'                  =>  null,
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
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['authorization_info'] ){
            $return_json_data = array(
                'authorizer_access_token'    =>  !empty($json_data['authorization_info']['authorizer_access_token']) ? $json_data['authorization_info']['authorizer_access_token'] : null,
                'authorizer_refresh_token'   =>  !empty($json_data['authorization_info']['authorizer_access_token']) ? $json_data['authorization_info']['authorizer_access_token'] : null,
                'expires_in'                 =>  !empty($json_data['authorization_info']['expires_in']) ? $json_data['authorization_info']['expires_in'] : 0,
                // 'func_info'                  =>  !empty($json_data['authorization_info']['func_info']) ? $json_data['authorization_info']['func_info'] : null,
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
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $return_json_data = array(
                'authorizer_access_token' =>  !empty($json_data['data']['access_token']) ? $json_data['data']['access_token'] : null,
                'authorizer_refresh_token' =>  !empty($json_data['data']['refresh_token']) ? $json_data['data']['refresh_token'] : null,
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
        $return_json_data = array();
        if($json_data['errno'] == 0 && $json_data['data'] ){
            $return_json_data = array(
                'result'        =>  !empty($json_data['data']['result']) ? true : false,
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
                'result'        =>  !empty($json_data['data']['template_id']) ? true : false,
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
            $return_json_data = array(
                'page_list'        =>  $json_data['data'],
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
        if($json_data['errno'] != 0 ){
            return array(false,array($json_data['errno'],$json_data['msg'],null));
        }
        return array(true , null);

    }
}
    