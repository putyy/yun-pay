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
// | Date : 2019/8/1 13:50
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Authentication;

use WGCYunPay\Data\Authentication\BaseData;
use WGCYunPay\Data\Router;

class VerifyIdData extends BaseData
{
    protected $route = Router::VERIFY_ID;
}