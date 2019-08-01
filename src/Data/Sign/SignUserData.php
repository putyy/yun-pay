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
// | Date : 2019/8/1 14:58
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Sign;


use WGCYunPay\Data\Sign\BaseData;
use WGCYunPay\Data\Router;

class SignUserData extends BaseData
{
    protected $route = Router::SIGN_USER;
    protected $method = 'post';

    /**
     * ⽤户⼿机号
     * @var
     */
    public $phone;

    /**
     * 是否是海外⽤户，海外⽤户必填
     * @var bool
     */
    public $is_abroad = false;

    /**
     * 商户推送回调地址
     * @var string
     */
    public $notify_url = '';
}
