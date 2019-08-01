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
// | Date : 2019/8/1 14:05
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Authentication;

use WGCYunPay\Data\Authentication\BaseData;
use WGCYunPay\Data\Router;

/**
 * 银⾏卡四要素确认鉴权（上传短信验证码）
 * Class VerifyConfirmData
 * @package WGCYunPay\Data\Authentication
 */
class VerifyConfirmData extends BaseData
{
    protected $route = Router::VERIFY_CONFIRM;

    /**
     * 银⾏卡号
     * @var
     */
    public $card_no;

    /**
     * 开户预留⼿机号
     */
    public $mobile;

    /**
     * 短信验证码
     */
    public $captcha;

    /**
     * 交易凭证
     */
    public $ref;
}
