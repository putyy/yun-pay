<?php
require_once __DIR__ . '/bootstrap.php';

// 1）H5 预申请签约接口
$service = new \WGCYunPay\Service\H5SignService($config);
$res = $service
    ->setRealName('')
    ->setIdCard('')
    ->setCertificateType(0)
    ->setMethodType(\WGCYunPay\Service\H5SignService::PRE_SIGN)
    ->query();
var_dump($res);

// H5 签约接口
$service = new \WGCYunPay\Service\H5SignService($config);
$res = $service
    ->setToken('')
    ->setColor('')
    ->setUrl('')
    ->setRedirectUrl('')
    ->setMethodType(\WGCYunPay\Service\H5SignService::H5_SIGN)
    ->query();
var_dump($res);


// 获取用户签约状态
$service = new \WGCYunPay\Service\H5SignService($config);
$res = $service
    ->setRealName('')
    ->setIdCard('')
    ->setMethodType(\WGCYunPay\Service\H5SignService::SIGN_STATUS)
    ->query();
var_dump($res);

// H5 对接测试解约接口
$service = new \WGCYunPay\Service\H5SignService($config);
$res = $service
    ->setRealName('')
    ->setIdCard('')
    ->setCertificateType(0)
    ->setMethodType(\WGCYunPay\Service\H5SignService::TEST_RESCIND)
    ->query();
var_dump($res);