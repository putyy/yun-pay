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
// | Date : 2019/8/5s 17:05s
// +----------------------------------------------------------------------


namespace WGCYunPay\Util;

/**
 * 订单状态码
 * Class OrderStatus
 * @package WGCYunPay\Util
 */
class Status
{
    /**
     * 注：
     *   1. 银⾏卡和⽀付宝通道打款，仅需要订单状态码status即可判断订单是否打款成功：1成功，2或9a
     *   失败，15取消⽀付。
     *   2. 对于状态1（已打款），在⽆退汇情况下是最终状态（退汇存在于微信和银⾏卡通道：微信红包
     *   退回；⽤户银⾏卡为II/III类银⾏卡收款超限额，导致打款先成功后退汇（较少情况））。
     *  // [0] => 状态说明
     *  // [1]=>详细解释
     */
    const PAY_STATUS = [
        -1 => ['删除', '被标记为删除的订单，只有通过web⻚⾯打款的情况才会出现（最终状态，不会回调），api接⼝打款不会出现此状态'],
        0  => ['已受理', '⽀付订单接收成功，尚未处理（中间状态，不会回调）'],
        1  => ['已打款', '订单提交到⽀付⽹关成功（中间状态，会回调）'],
        2  => ['打款失败', '主要表示订单数据校验不通过（最终状态，会回调）'],
        4  => ['待打款(暂停处理)', '暂停处理，满⾜条件后会继续⽀付，例如账户余额不⾜，充值后可以继续打款（中间状态，会回调）'],
        5  => ['打款中(状态未知)', '调⽤⽀付⽹关超时等状态异常情况导致，处于等待交易查证的中间状态（中间状态，不会回调）'],
        8  => ['待打款', '订单税务筹划完毕，等待执⾏打款的状态（中间状态，不会回调）'],
        9  => ['打款失败', '（已退款，退汇或者冲正⽀付被退回（最终状态，会回调）'],
        15 => ['取消⽀付', '表示待打款(暂停处理)订单数据被商户主动取消（最终状态，会回调）'],
    ];


    /**
     *  // [0] => 状态说明
     *  // [1]=>详细解释
     */
    const PAY_STATUS_DETAILS = [
        0  => ['成', '功'],
        20 => ['账户余额不', '户余额不⾜'],
        22 => ['通道维护暂停打', '道维护暂停打款'],
        25 => ['要素认证情况未', '素认证情况未知'],
        27 => ['微信红包待领', '信红包已发放，待领取'],
        28 => ['单笔打款超出限', '笔打款超出限额'],
        29 => ['⽤户未签', '要⽤户到云账户微信⼩程序进⾏签约'],
        213 => ['系统打款和代征主体打款都失', '统打款和代征主体打款都失败'],
        251 => ['身份证姓名不匹', '份证姓名不匹配'],
        252 => ['身份证号错', '份证号错误'],
        254 => ['银⾏卡号错', '⾏卡号错误'],
        255 => ['姓名和银⾏卡号不匹', '名和银⾏卡号不匹配'],
        2552 => ['收款账号、户名不匹', '名和银⾏卡号不匹配'],
        257  => ['银⾏卡受', '⾏卡受限'],
        2571 => ['II、III类账户不允许此交易 II、III类账户不允许此交易'],
        2572 => ['收款账户状态⾮法或睡', '款账户状态⾮法或睡眠'],
        2573 => ['收款账户不合法或已注销或超过有效', '款账户不合法或已注销或超过有效期'],
        2574 => ['副卡不允许此交', '卡不允许此交易'],
        2575 => ['业务累计⾦额/笔数超过规定上', '务累计⾦额/笔数超过规定上限'],
        2582 => ['匹配⿊名', '配⿊名单'],
        6053 => ['收款⾏收款失败，请联系发卡', '款⾏收款失败，请联系发卡⾏'],
        261  => ['⽀付宝账号错', '付宝账号错误'],
        262  => ['⽀付宝账号与姓名不匹', '付宝账号与姓名不匹配'],
        265  => ['身份证号或收款户名不可以为', '份证号或收款户名不可以为空'],
        266  => ['⽀付宝账号受', '户可能未完成⽀付宝实名认证'],
        5077 => ['收款⽅⽀付宝账户不存', '户⽀付宝账户填写错误或有隐私设置'],
        267 => ['该⼿机号对应多个⽀付宝账', '⼿机号对应多个⽀付宝账户'],
        271 => ['微信账号错', '信账号错误'],
        273 => ['此请求可能存在⻛险，已被微信拦', '⼀个活跃的微信号'],
        274 => ['该⽤户今⽇领取红包个数超过限', '⽤户今⽇领取红包个数超过限额'],
        275 => ['微信红包发送红包⾦额不在限额范围内发送红包⾦额不在限额范围内'],
        277 => ['OpenID和AppID不匹配 OpenID和AppID不匹配'],
        278 => ['微信红包超过频率限制，请稍后重', '信红包超过频率限制，请稍后重试'],
        302 => ['报税⻛险：单⼈⽉⾦额超', '务⻛控挂单，该笔订单将造成签约关系下该⽤户打款额度超过累计额度配置'],
        304 => ['报税⻛险：单⼈年⾦额超', '务⻛控挂单，该笔订单将造成签约关系下该⽤户打款额度超过年累计额度配置'],
        305 => ['报税⻛险：单⼈全平台⽉⾦额超', '务⻛控挂单，该笔订单将造成单⼈全平台⽉累计超限'],
        2051 => ['微信转账打款失', '信转账打款失败(⼿动重试)'],
        2052 => ['没有该接⼝权', '合服务平台⾃动重试:没有该接⼝权限'],
        2053 => ['发送转账⾦额不在限制范围', '账失败:发送转账⾦额不在限制范围内'],
        2054 => ['微信账户余额不', '合服务平台⾃动重试:微信账户余额不⾜'],
        2055 => ['OpenID和AppID不匹', '账失败:OpenID和AppID不匹配'],
        2056 => ['超过频率限制，请稍后再', '合服务平台⾃动重试:超过频率限制，请稍后再试'],
        2057 => ['姓名校验出', '账失败:姓名校验出错'],
        2058 => ['收款账户未实', '账失败:收款账户未实名'],
        2059 => ['微信转账订单不存', '合服务平台⼿动重试:微信转账订单不存在'],
        2060 => ['已经达到今⽇付款总额上限/已达到付款给此⽤户额度上', '账失败:已经达到今⽇付款总额上限/已达到付款给此⽤户额度上限'],
        2061 => ['该⽤户今⽇付款次数超过限', '账失败:该⽤户今⽇付款次数超过限制'],
        2068 => ['OpenID错', '账失败:OpenID错误'],
    ];

    /**
     * 接⼝错误码
     * 错误码 错误提示语
     */
    const API_ERROR = [
        0000 => '成功',
        1000 => '缺少请求参数',
        1001 => '签名已过期',
        1002 => '请求参数格式不正确',
        1003 => '签名错误',
        1004 => '加密错误',
        1005 => '商户未设置3deskey或没有设置appkey',
        2001 => '上传数据有误',
        2002 => '已上传过该笔流⽔',
        2003 => '实名认证失败',
        2006 => '银⾏卡号错误',
        2018 => '订单不存在',
        2016 => '错误的打款⾦额',
        2024 => '订单⾦额⼩于0',
        2038 => '该商户不属于该经纪公司',
        5000 => '不存在的账单',
        5277 => '该签约关系不存在或已失效（请检查broker_id或dealer_id是否填写正确）',
        8300 => '获取⽇流⽔链接失败',
        9024 => '时间间隔超过规定天数',
    ];
}
