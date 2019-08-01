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
// | Date : 2019/7/31 10:48
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Pay;

use WGCYunPay\Data\Pay\BaseData;
use WGCYunPay\Data\Router;

class WxPayData extends BaseData
{
    /**
     * 商户AppID下，某⽤户的openid(必填)
     * @var
     */
    public $openid;

    /**
     * 微信打款商户微信AppID(选填，最⼤⻓度为200)
     * @var
     */
    public $wx_app_id;

    /**
     * 微信打款模式(选填，⼆种取值，可填 "", "transfer")
     * @var string
     */
    public $wxpay_mode = "";

    protected $route = Router::WX_PAY;
}
