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
// | Date : 2019/8/1 14:18
// +----------------------------------------------------------------------
require_once __DIR__ . '/bootstrap.php';

/**
 * 不同操作不同 data
 * 自行查阅 WGCYunPay\Data\Authentication 相关data类
 */
$data = new \WGCYunPay\Data\Authentication\VerifyIdData();
$data->id_card   = '36032232112219900rew9115318';
$data->real_name = 'real_name';

$service = new \WGCYunPay\Service\AuthenticationService($config, $data);
$aa = $service->query();
var_dump($aa);
