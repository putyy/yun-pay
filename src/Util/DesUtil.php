<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | user : 放下
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2019/7/25 17:22
// +----------------------------------------------------------------------

namespace WGCYunPay\Util;

class DesUtil
{
    /**
     *  密钥向量
     * @var string
     */
    private $des3key;

    /**
     * 混淆向量
     * @var string|null
     */
    private $iv;

    /**
     * 构造，传递⼆个已经进⾏base64_encode的KEY与IV
     *
     * @param string $des3key
     * @param string $iv
     */
    function __construct($des3key, $iv = null)
    {
        $this->des3key = $des3key;
        $this->iv      = $iv;
    }

    /**
     * 加密
     * @param <type> $value
     * @return <type>
     */
    public function encrypt($value)
    {
        $iv  = substr($this->des3key, 0, 8);
        $ret = openssl_encrypt($value, 'DES-EDE3-CBC', $this->des3key, 0, $iv);
        if (false === $ret) {
            return openssl_error_string();
        }
        return $ret;
    }

    /**
     * 解密
     * @param <type> $value
     * @return <type>
     */
    public function decrypt($value)
    {
        $iv  = substr($this->des3key, 0, 8);
        $ret = openssl_decrypt($value, 'DES-EDE3-CBC', $this->des3key, 0, $iv);
        if (false === $ret) {
            return openssl_error_string();
        }

        return $ret;
    }
}
