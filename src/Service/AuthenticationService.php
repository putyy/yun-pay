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
// | Date : 2019/8/1 13:46
// +----------------------------------------------------------------------


namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataTrait;

class AuthenticationService extends BaseService
{
    protected $dealer_broker = false;

    use DataTrait;
}
