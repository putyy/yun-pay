<?php
// +----------------------------------------------------------------------
// | Created by LW放下.
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2021/4/12 10:39 上午
// +----------------------------------------------------------------------


namespace WGCYunPay\AbstractInterfaceTrait;


use WGCYunPay\Service\Des3Service;

trait DataHandleTrait
{
    protected function callback(array $res)
    {
        if (isset($res['data']) && is_string($res['data'])) {
            $res['data'] = Des3Service::decode($res['data'], $this->config->des3_key);
        }
        return $res;
    }
}