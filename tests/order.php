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
// | Date : 2019/7/31 14:47
// +----------------------------------------------------------------------
require_once __DIR__ . '/bootstrap.php';

//var_dump($config);
// 查询订单
$order = new \WGCYunPay\Service\OrderService($config);
$res = $order
     ->setOrderId('2019002156137016ss3971231341211')
     ->setChannel('支付宝')
     ->query();
var_dump($res);
//
//// 电子回值单
$order = new \WGCYunPay\Service\OrderService($config);
$res = $order
     ->setOrderId('20190021561370163971231341211')
     ->setMethodType(\WGCYunPay\Service\OrderService::RECEIPT)
     ->setChannel('支付宝')
     ->query();
var_dump($res);
//
//// 取消待打款订单
//$order = new \WGCYunPay\Service\OrderService($config);
//$res = $order
//    ->setOrderId('2019a00215613s7016a3971231341211')
////  # 商户订单号（商户订单号和综合服务平台 订单号必须⼆选⼀
////    ->setRef('20s19002156137s0163971231341211')
//    ->setMethodType(\WGCYunPay\Service\OrderService::ORDER_FAIL)
//    ->setChannel('支付宝')
//    ->query();
//var_dump($res);

