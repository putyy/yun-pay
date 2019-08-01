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
// | Date : 2019/7/26 11:28
// +----------------------------------------------------------------------


namespace WGCYunPay\Util;


class SignUtil
{
    public static function hmacHash(array $signData, string $key, string $al = 'sha256'): string
    {
        $signStr = urldecode(http_build_query($signData));
        return hash_hmac($al, $signStr, $key);
    }
}