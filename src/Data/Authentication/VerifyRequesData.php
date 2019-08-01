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
// | Date : 2019/8/1 13:48
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Authentication;

use WGCYunPay\Data\Authentication\BaseData;
use WGCYunPay\Data\Router;

class VerifyRequesData extends BaseData
{
    protected $route = Router::VERIFY_REQUEST;

    /**
     * 银⾏卡号
     * @var
     */
    public $card_no;

    /**
     * # 开户预留⼿机号
     * @var
     */
    public $mobile;
}
