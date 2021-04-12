<?php

require_once __DIR__ . '/bootstrap.php';

//用户信息验证
// 银行卡四要素鉴权请求（下发短验）
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v1 = $verify
    ->setRealName("WGC")
    ->setCardNo("324321412")
    ->setIdCard("412321212")
    ->setMobile("42314324234")
    ->setMethodType("verify_request")
    ->query();

var_dump($v1);

// 银行卡四要素鉴权确认（上送短验）
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v2 = $verify
    ->setRealName("WGC")
    ->setCardNo("1243214")
    ->setIdCard("12341324321")
    ->setMobile("132412341")
    ->setCaptcha("123456")
    ->setRef("134131243")
    ->setMethodType("verify_confirm")
    ->query();
var_dump($v2);

// 银行卡四要素验证
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v3 = $verify
    ->setRealName("WGC")
    ->setCardNo("2542354235")
    ->setIdCard("2435234523")
    ->setMobile("524352345")
    ->setMethodType("verify_four")
    ->query();
var_dump($v3);

// 银行卡三要素验证
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v4 = $verify
    ->setRealName("WGC")
    ->setCardNo("32543545")
    ->setIdCard("2543542354")
    ->setMethodType("verify_three")
    ->query();
var_dump($v4);

// 身份证实名验证
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v5 = $verify
    // 银⾏开户姓名 （必填）
    ->setRealName("WGC")
    ->setIdCard("234542354235")
    // 身份证       （必填）
    ->setMethodType("verify_id")
    ->query();
var_dump($v5);

// 上传免验证用户信息
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v6 = $verify
    ->setRealName("WGC")
    ->setIdCard("qwe2qewqewq")
    ->setCardType("passport")
    ->setCommentApply("备注")
    ->setUserImages(imageToBase64(__DIR__."/Media/test.png"))
    ->setCountry("CHN")
    ->setBirthday("20190909")
    ->setGender("男")
    ->setNotifyUrl("http://www.xxx.com")
    ->setRef("qweqwwqwqe23")
    ->setMethodType("user_exempted_info")
    ->query();
var_dump($v6);

// 查看用户免验证名单是否存在
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v7 = $verify
    ->setRealName("WGC")
    ->setIdCard("312321324")
    ->setMethodType("user_white_check")
    ->query();
var_dump($v7);

// 银行卡信息查询
$verify = new \WGCYunPay\Service\AuthenticationService($config);
$v8 = $verify
    ->setBankName("招商银行")
    ->setCardNo("32243562365153")
    ->setMethodType("bank_info")
    ->query();
var_dump($v8);