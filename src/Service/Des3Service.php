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
// | Date : 2019/8/1 10:19
// +----------------------------------------------------------------------


namespace WGCYunPay\Service;

use WGCYunPay\Util\DesUtil;

class Des3Service
{
    public static function encode(array $data, string $des3Key): ?string
    {
        $DesUtil = new DesUtil($des3Key);
        return $DesUtil->encrypt(json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static function decode(string $dec3Value, string $des3Key): ?array
    {
        $DesUtil = new DesUtil($des3Key);
        return json_decode($DesUtil->decrypt($dec3Value), true);
    }
}
