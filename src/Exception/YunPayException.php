<?php
// +----------------------------------------------------------------------
// | Created by LW放下.
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2021/4/9 8:33 上午
// +----------------------------------------------------------------------


namespace WGCYunPay\Exception;

class YunPayException extends \Exception
{
    /**
     * 2021/4/9 9:10 上午
     * @param string $message
     * @throws YunPayException
     */
    public static function throwSelf(string $message)
    {
        throw new YunPayException($message);
    }
}