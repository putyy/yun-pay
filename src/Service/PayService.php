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
// | Date : 2019/7/26 15:24
// +----------------------------------------------------------------------


namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataTrait;

class PayService extends BaseService
{
    protected $dealer_broker = true;

    use DataTrait;
}
