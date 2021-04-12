<?php

require_once __DIR__ . '/bootstrap.php';

//数据接口

// 查询日订单文件
$orderFile = new \WGCYunPay\Service\DataFileService($config);

//$d1 = $orderFile
//    // 查询时间（不能查询当日）
//    ->setOrderDate("2021-01-01")
//    ->setMethodType("order")
//    ->query();
//var_dump($d1);
//die();

// 查询订单记录
//$order = new \WGCYunPay\Service\DataFileService($config);
//$d2 = $order
//    // 订单查询⽇期（必填）
//    ->setOrderDate("2020-08-01")
//    // 偏移量，最⼩从0开始 （必填）
//    ->setOffset("0")
//    // 每⻚最多返回条数，最⼤为200 （必填）
//    ->setLength("50")
//    //  银⾏卡，⽀付宝，微信(不填时为银⾏卡订单查询)(选填)
//    ->setchannel("支付宝")
//    //  如果为encryption，则对返回的data进行加密(选填)
//    ->setDataType("encryption")
//    ->setMethodType("order_record")
//    ->query();
//var_dump($d2);
//die();

// 查询日流水文件
//$orderFile = new \WGCYunPay\Service\DataFileService($config);
//
//$d3 = $orderFile
//    // 查询时间（不能查询当日）
//    ->setOrderDate("2021-01-01")
//    ->setMethodType("bill_file")
//    ->query();
//var_dump($d3);
//die();


// 充值记录查询
//$recharge = new \WGCYunPay\Service\DataFileService($config);
//$d4 = $recharge
//    // 查询起止时间（不能超过30天）
//    ->setAt("2021-03-01", "2021-03-20")
//    ->setMethodType("recharge_record")
//    ->query();
//var_dump($d4);
//die();


// 查询日订单文件（交易和退款）
//$orderFile = new \WGCYunPay\Service\DataFileService($config);
//
//$d5 = $orderFile
//    // 查询时间（不能查询当日）
//    ->setOrderDate("2021-01-01")
//    ->setMethodType("order_day")
//    ->query();
//var_dump($d5);
