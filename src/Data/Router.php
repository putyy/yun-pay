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
// | Date : 2019/7/26 10:55
// +----------------------------------------------------------------------

namespace WGCYunPay\Data;

class Router
{

    const SERVICE_URL = 'https://api-jiesuan.yunzhanghu.com';

    //+----------------------------------
    //|  打款接⼝
    //+----------------------------------
    /**
     * 支付提交地址
     */
    const BANK_CARD = 'api/payment/v1/order-realtime';
    const ALI_PAY   = 'api/payment/v1/order-alipay';
    const WX_PAY    = 'api/payment/v1/order-wxpay';

    /**
     * 订单查询
     */
    const QUERY_REALTIME_ORDER = 'api/payment/v1/query-realtime-order';

    /**
     * 余额查询
     */
    const QUERY_ACCOUNTS       = 'api/payment/v1/query-accounts';

    /**
     * 电子回单
     */
    const RECEIPT_FILE         = 'api/payment/v1/receipt/file';

    /**
     * 取消待打款订单
     */
    const ORDER_FAIL           = 'api/payment/v1/order/fail';


    //+----------------------------------
    //| 税务⻛控
    //+----------------------------------

    /**
     * 查看⽤户打款⾦额是否超出全⽹⽉限额
     *
     */
    const RISK_CHECK_AMOUNT    = 'api/payment/v1/risk-check/amount';


    //+----------------------------------
    //| 数据接⼝
    //+----------------------------------

    /**
     * 查询⽇订单⽂件
     */
    const ORDER_DOWNLOAD  = 'api/dataservice/v1/order/downloadurl';

    /**
     * 查询⽇流⽔⽂
     */
    const BILL_DOWNLOAD   = 'api/dataservice/v2/bill/downloadurl';

    /**
     * 查询商户充值记录
     */
    const RECHARGE_RECORD = 'api/dataservice/v2/rechargerecord';


    //+----------------------------------
    //|  ⽤户信息验证接⼝
    //+----------------------------------
    /**
     * 银⾏卡四要素请求鉴权（下发短信验证码）
     */
    const VERIFY_REQUEST  = 'authentication/verify-request';

    /**
     * 银⾏卡四要素确认鉴权（上传短信验证码）
     */
    const VERIFY_CONFIRM  = 'authentication/verify-confirm';

    /**
     * 银⾏卡四要素验证
     */
    const VERIFY_BANKCARD_FOUR_FACTOR  = 'authentication/verify-bankcard-four-factor';

    /**
     * 银⾏卡三要素验证
     */
    const VERIFY_BANKCARD_THREE_FACTOR = 'authentication/verify-bankcard-three-factor';

    /**
     * 身份证实名验证
     */
    const VERIFY_ID                    = 'authentication/verify-id';


    /**
     * 查看⽤户⽩名单是否存在
     */
    const USER_WHITE_CHECK             = 'api/payment/v1/user/white/check';


    //+----------------------------------
    //|  ⽤户签约接⼝
    //+----------------------------------

    /**
     * ⽤户签约信息上传
     */
    const SIGN_USER        = 'api/payment/v1/sign/user';
    /**
     * 获取⽤户签约状态
     */
    const SIGN_USER_STATUS = 'api/payment/v1/sign/user/status';


    //+----------------------------------
    //|  发票接⼝
    //+----------------------------------
    /**
     * 查询商户已开具发票⾦额和待开具发票⾦额
     */
    const INVOICE_STAT     = 'api/payment/v1/invoice-stat';


    public static function getRouter(string $route = ''): string
    {
        return self::SERVICE_URL . '/' . $route;
    }
}
