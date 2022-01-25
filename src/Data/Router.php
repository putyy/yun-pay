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
    //主要接口
    const SERVICE_URL     = 'https://api-jiesuan.yunzhanghu.com';

    //+----------------------------------
    //|  打款接⼝ 支付提交地址
    //+----------------------------------

    /**
     * 银⾏卡实时下单
     */
    const BANK_CARD = 'api/payment/v1/order-bankpay';

    const ALI_PAY   = 'api/payment/v1/order-alipay';
    const WX_PAY    = 'api/payment/v1/order-wxpay';

    /**
     * 查询单笔订单信息
     */
    const QUERY_REALTIME_ORDER = 'api/payment/v1/query-order';

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

    /**
     * 查询商户VA账户信息
     */
    const ORDER_AV_ACCOUNT     = 'api/payment/v1/va-account';


    //+----------------------------------
    //| 数据接⼝
    //+----------------------------------

    /**
     * 查询⽇订单⽂件
     */
    const ORDER_DOWNLOAD  = 'api/dataservice/v1/order/downloadurl';

    /**
     * 查询⽇流⽔文件
     */
    const BILL_DOWNLOAD   = 'api/dataservice/v2/bill/downloadurl';

    /**
     * 查询商户充值记录
     */
    const RECHARGE_RECORD = 'api/dataservice/v2/recharge-record';

    /**
     * 查询日订单数据
     */
    const ORDER_RECORD    = 'api/dataservice/v1/orders';

    /**
     * 查询⽇订单⽂件 (打款和退款订单)
     */
    const ORDER_DAY       = 'api/dataservice/v1/order/day/url';

    /**
     *  查询⽇流⽔数据
     */
    const ORDER_BILLS     = 'api/dataservice/v1/bills';


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
     * 上传用户免验证名单信息
     */
    const WHITE_INFO_UPLOAD            = 'api/payment/v1/user/exempted/info';

    /**
     * 查看⽤户⽩名单是否存在
     */
    const USER_WHITE_CHECK             = 'api/payment/v1/user/white/check';

    /**
     * 银行卡信息查询
     */
    const BANK_INFO                    = 'api/payment/v1/card';

    //+----------------------------------
    //|  发票接⼝
    //+----------------------------------
    /**
     * 查询商户已开具发票⾦额和待开具发票⾦额
     */
    const INVOICE_STAT       = 'api/payment/v1/invoice-stat';

    /**
     * 查询可开票额度
     */
    const INVOICE_AMOUNT     = 'api/invoice/v2/invoice-amount';
    /**
     * 开票申请
     */
    const INVOICE_APPLY      = 'api/invoice/v2/apply';

    /**
     * 查询开票申请状态
     */
    const INVOICE_APPLY_STATUS   = 'api/invoice/v2/invoice/invoice-status';

    /**
     * 下载发票PDF
     */
    const INVOICE_PDF            = 'api/invoice/v2/invoice/invoice-pdf';

    /**
     * 发送发票扫描件压缩包下载链接邮件
     */
    const INVOICE_REMINDER_EMAIL = 'api/invoice/v2/invoice/reminder/email';

    //+----------------------------------
    //|  个税扣缴明细表下载接口
    //+----------------------------------
    /**
     * 下载个税扣缴明细表
     */
    const TAX_DOWNLOAD           = 'api/tax/v1/taxfile/download';

    /**
     * 查询纳税⼈是否为跨集团⽤户
     */
    const TAX_CROSS              = 'api/tax/v1/user/cross';

    public static function getRouter(string $route = ''): string
    {
        return self::SERVICE_URL . '/' . $route;
    }
}
