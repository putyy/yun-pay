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
// | Date : 2019/8/1 14:55
// +----------------------------------------------------------------------


namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataTrait;

class SignService extends BaseService
{
    protected $dealer_broker = true;

    use DataTrait;
}
