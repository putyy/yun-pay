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
// | Date : 2019/7/31 15:06
// +----------------------------------------------------------------------


namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\Data\Router;

class AccountService extends BaseService
{
    protected function getDes3Data()
    {
        return ['dealer_id'  => $this->config->dealer_id];
    }

    protected function getRequestInfo()
    {
        return [Router::QUERY_ACCOUNTS];
    }
}
