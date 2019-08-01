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
// | Date : 2019/8/1 14:03
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Authentication;

use WGCYunPay\Data\Authentication\BaseData;
use WGCYunPay\Data\Router;

/**
 * 银⾏卡三要素验证
 * Class BankcardThree
 * @package WGCYunPay\Data\Authentication
 */
class BankcardThree extends BaseData
{
    protected $route = Router::VERIFY_BANKCARD_THREE_FACTOR;

    /**
     * 银⾏卡号
     * @var
     */
    public $card_no;
}
