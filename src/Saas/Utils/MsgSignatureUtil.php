<?php
namespace Saas\Utils;

/**
 * Copyright (C) 2018 Baidu, Inc. All Rights Reserved.
 * 计算智能小程序第三方平台的消息签名接口
 */
class MsgSignatureUtil
{
    /**
     * 用SHA1算法生成安全签名
     *
     * @param string $token 消息验证TOKEN
     * @param string $timestamp 时间戳
     * @param string $nonce 随机字符串
     * @param string $encrypt_msg 密文
     * @return string 安全签名
     * @throws Exception
     */
    public function getMsgSignature($token, $timestamp, $nonce, $encrypt_msg)
    {
        try {
            $array = array($encrypt_msg, $token, $timestamp, $nonce);
            sort($array, SORT_STRING);
            $str = implode($array);
            return sha1($str);
        } catch (\Exception $e) {
            throw new \Exception("生成安全签名失败");
        }
    }
}