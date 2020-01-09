<?php
namespace Saas\Utils;

/**
 * Copyright (C) 2018 Baidu, Inc. All Rights Reserved.
 * PHP AES 消息加解密
 */
class AesEncryptUtil
{
    public static $blockSize = 32;
    //your aesKey
    private $aesKey;
    /**
     * AesEncryptNewUtilUtil constructor.
     * @param $encodingAesKey
     */
    public function __construct($encodingAesKey)
    {
        $this->aesKey = base64_decode($encodingAesKey . "=");
    }

    /**
     * 对密文进行解密
     * @param $encrypted
     * @return bool|string
     * @throws Exception
     */
    public function decrypt($encrypted)
    {
        try {
            // 使用BASE64对需要解密的字符串进行解码
            $ciphertextDec = base64_decode($encrypted);
            $iv = substr($this->aesKey, 0, 16);
            // 解密
            $decrypted = openssl_decrypt($ciphertextDec, 'aes-256-cbc', $this->aesKey, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $iv);
        } catch (\Exception $e) {
            throw new \Exception('AesEncryptUtil AES解密串非法，小于16位;');
        }
        try {
            // 去除补位字符
            $result = $this->decode($decrypted);
            // 去除16位随机字符串,网络字节序和clientId
            if (strlen($result) < 16) {
                throw new \Exception('AesEncryptUtil AES解密串非法，小于16位;');
            }
            $content = substr($result, 16, strlen($result));
            $lenList = unpack("N", substr($content, 0, 4));
            $xmlLen = $lenList[1];
            $xmlContent = substr($content, 4, $xmlLen);

        } catch (\Exception $e) {
            throw new \Exception('AesEncryptUtil AES解密串非法，小于16位;');
        }
        return $xmlContent;
    }


    /**
     * 对解密后的明文进行补位删除
     * @param $text
     * @return bool|string
     */
    private function decode($text)
    {
        $pad = ord(substr($text, -1));
        if ($pad < 1 || $pad > self::$blockSize) {
            $pad = 0;
        }
        return substr($text, 0, (strlen($text) - $pad));
    }

}
