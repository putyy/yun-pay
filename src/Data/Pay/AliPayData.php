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
// | Date : 2019/7/26 15:13
// +----------------------------------------------------------------------


namespace WGCYunPay\Data\Pay;

use WGCYunPay\Data\Pay\BaseData;
use WGCYunPay\Data\Router;

class AliPayData extends BaseData
{
    /**
     * 收款⼈⽀付宝账户(必填)
     * @var
     */
    public $card_no;

    /**
     * 校验⽀付宝账户姓名，可填 Check、NoCheck
     * @var string
     */
    public $check_name = 'NoCheck';

    protected $route = Router::ALI_PAY;
}
