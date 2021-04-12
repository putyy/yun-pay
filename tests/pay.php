<?php

require_once __DIR__ . '/bootstrap.php';

//  打款接口  
//// 支付宝实时下单
//$AliPayData = new \WGCYunPay\Data\Pay\AliPayData();
//$AliPayData->order_id   = "123213213";
//$AliPayData->real_name  = "WGC";
//$AliPayData->id_card    = "123213213213";
//$AliPayData->pay        = "100.00";
//$AliPayData->pay_remark = "备注";
//$AliPayData->card_no    = "312312312312";
//$AliPayData->check_name = "Check";
//$AliPayData->notify_url = "http://xxxxx/yun-pay/notify";
//$GoPay = new \WGCYunPay\Service\PayService($config, $AliPayData);
//$result = $GoPay->query();
//var_dump($result);
//die();

// 银行卡实时下单
//$BankPayData = new \WGCYunPay\Data\Pay\BankPayData();
//$BankPayData->order_id   = "1234567123";
//$BankPayData->real_name  = "WGC";
//$BankPayData->id_card    = "324234423325";
//$BankPayData->card_no    = "2342341243214";
//$BankPayData->phone_no   = "321432432143";
//$BankPayData->pay        = "100.00";
//$BankPayData->pay_remark = "备注";
//$BankPayData->notify_url = "http://14321241433/yun-pay/notify";
//
//$GoPay = new \WGCYunPay\Service\PayService($config, $BankPayData);
//
//$r1 = $GoPay->query();
//var_dump($r1);
//die();


// 企业付款到微信零钱实时下单
//$WxPayData = new \WGCYunPay\Data\Pay\WxPayData();
//$WxPayData->order_id   = "21321312";
//$WxPayData->real_name  = "WGC";
//$WxPayData->id_card    = "3241234231414";
//$WxPayData->pay        = "100.00";
//$WxPayData->pay_remark = "备注";
//$WxPayData->openid     = "1234312342114";
//$WxPayData->wx_app_id  = "12313241";
//$WxPayData->wxpay_mode = "transfer";
//$WxPayData->notify_url = "http://sfsfsfwe/yun-pay/notify";
//$GoPay = new \WGCYunPay\Service\PayService($config, $WxPayData);
//$r2 = $GoPay->query();
//var_dump($r2);
//die();

// 查询订单
//$order = new \WGCYunPay\Service\OrderService($config);
//$r3 = $order
//    ->setOrderId("1234567123")
//    ->setchannel("支付宝")
//    ->setDataType("encryption")
//    ->query();
//var_dump($r3);
//die();

//// 查询商户余额
//$accounts = new \WGCYunPay\Service\OrderService($config);
//$r4 = $accounts
//    ->setMethodType("query_accounts")
//    ->query();
//var_dump($r4);
//die();

// 查询电子回单
//$receipt = new \WGCYunPay\Service\OrderService($config);
//$r5 = $receipt
//    ->setOrderId("123456")
//    ->setRef("12345678990")
//    ->setMethodType("receipt")
//    ->query();
//var_dump($r5);
//die();

// 取消待打款订单
//$cancel = new \WGCYunPay\Service\OrderService($config);
//$r6 = $cancel
//    ->setOrderId("123456")
//    ->setRef("12345678990")
//    ->setChannel("支付宝")
//    ->setMethodType("order_fail")
//    ->query();
//var_dump($r6);
//die();

//回调+验签
//$notifyJsonData = '{"data":"RDthP6Va2vzHbAjAc5S17BozGK4AxlvWJbWpVdo/GGg1OZR96ga3U+fsB34bIkQtecZIr7yrsfMBL1RXCn+Vri/OjA0dSDFhe+LNhmy+NWw6r6qzyXetBVi0fgCFIg4rk8wrG4ZAzHt3UF2o/Zvm3DX5oHHySvBHuo4Xu5Lm4V2sQFyE8G4Y9HnN+Fe11EqvrPmf2uoPw4NANkLchZNQwwvLHqknqgD3+4gpuf6UXjyhhDvs1Icz6x3Uef001wnUmMDAWwDWfyRWFsiI3NP0KfBlOTj/oGfIGzV32X5uAn8kbXegbuql890muZVD1ik6QEh5Stl78ne3jKvJlzfoMx95N0qrfmlhlTeZ+ouu2/3112gFyVlzwJtMpPAYv/Rt8NB9dy0H05Hgg1bLEGI8HCy71HjKeZY2mvXHmvt38cTWu2gctwukAaJZZjOYMfWq61YmSmewMWsU/UEOZqLaS/QNxC0p319EgQ3WDzj0oYEev0qE2Zmzjes+Hky0DZ5G7giCYpvIJnM+TD/pGLZ+dzqaouu8mo+GKxbRDWi88EJYPxvEmNiSfKKusgAHVsG4QNp0Q21lguqzD2wUcjmzJnKHPCs7zqro4R/oyM+WKUQo4EvBEPZpunGtVsX0AQpOH9ipFa+b6u9O8OZn6zsI177KCnJo5AR73YXcSWGBFaGtrgTNCIsPgujulGNHFKLkBOuAzc40KhEm7JBFiXiX9H1bvb415yedDTFvPTTPVyGkQ+i/Km3L0yr/eCxnMWTKAS1YPijhPg/ybhi+8KfTVHFnlEzvsLmNlhaju7TJyuaOeazL9iNfaT/nCxcUi2hh1ZMW0eI0+iU97IQM6uNNloe3LcTptE6uMqeXha7mR3iPrbIyQgTl2t49n4JTmIcoFAmr1Hb4oM+CWLrhuYN8SM4nPo1G/lKd","mess":"3361023","timestamp":"1594897034","sign":"LKWfx/XQLlribLPkf30PB56trFgangdcS2ypj/Ilmzf0eotJ7ZxNmzxoE0nuKR5OOo99YG+wpF9lDVszzdRZZ1uuKHWXvcXMuDh40bN6tMdLoH5G2wBlTrKWe/3AoG+P/xuVng/HdHHyXDwBynTBLBIrzDYNjrxUHz3U5HAWmvo=","sign_type":"rsa"}';
//$notifyData = json_decode($notifyJsonData, true);
//var_dump($notifyData);
//$datainfo = \WGCYunPay\Service\Des3Service::decode($notifyData['data'], $config->des3_key);
//$result= new \WGCYunPay\Util\RsaUtil($config);
//$verifyResult=$result->verify($notifyData);
//var_dump($datainfo);
//
//var_dump($verifyResult);