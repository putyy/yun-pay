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
// | Date : 2019/7/26 17:03
// +----------------------------------------------------------------------
require_once __DIR__ . '/bootstrap.php';

/**
 * 下单
 * 不同平台不同 data
 * 自行查阅 WGCYunPay\Data\Pay 相关data类
 */
$AliPayData = new \WGCYunPay\Data\Pay\AliPayData();
$AliPayData->order_id   = '2019002156137016397187466';
$AliPayData->real_name  = 'LW放下';
$AliPayData->id_card    = '500781598308210373';
$AliPayData->pay        = '1.00';
$AliPayData->notes      = '这只是一个测试';
$AliPayData->pay_remark = '这只是一个打款备注';
$AliPayData->card_no    = '18225298987';
//
$GoPay = new \WGCYunPay\Service\PayService($config, $AliPayData);
$res = $GoPay->query();
var_dump($res);

/**
 * 回调解密
 */
$notifyJsonData = '{"data":"ihvzlKLD7KinLb5xpOWc37FooskBpLvYSZW7FS1scjqqF4t9E9TwI9jPRl21xHbbin6iSAUpgXCilhBKHGkEJQx+qNMXrs0Y8NIXITyCp3GxJLw5jx9oF8F1hdmh1A9TWIg5gLP+jNs4iZ\/y3yVtZ+YS41LsC6VBvgkol7b926isPLsTakw47+Vnb5wCr22hs2UD9I2aemhpQrLDZ9mcwFBB6J3atmWm6NoH6tiHTphUekGLvqHKBsPxq+ParaTvJoaEeeSoWfvcpWGyZW+J0k94\/xCEMor3YPsMygIBGpYNwcZWDqFP2g1DO7jrI65s\/0RL72m3n5bmt3qFVb7HwuKp1xBmVhIL8Ziw7f9wbCBWMYkvd2IjqPqJmlsJRgQ9q7OeJUzqEz9TBTaWD7mkiDn6VTJEp9SCOnCwnHUh1diOkslBO+jlfWj6sOz\/l7hn2m7X1Y6C2RKsm6ZsA9BzhgBYRanV5UXsTt66lfxqBp73s3pXLS4ULqoEJITpTt4NTY+F67OhHpkC2yytNUi0Tx5EJoH3uFbpxvB8YU2p6NvWj9dUEOZfooBjWnevB4LNa2JfN4qcSybC4U4wXwYs1w6q2yMrBQqhr7j4rlEQRUjgf9lQOWUA7C2iqYXYu4sW3SpRxN6tGQfCOY4W4hcra1wbG1J8H78iP482zfY6gOEk4epEOeqGn1ov1NPgnHmfR5mJS4+zbULGqxxYb7eCJnrn\/DsMHntFRf\/SHqiU8RSBppkiO\/prC1fpxsE5t1HihRPesB+fKKGsqexKsbZvIfZb+jqKcXTOvXiJE9y+kfFzt2SZJD\/w6DwcPeRI4GTl7Khlk\/HdVW44D+j2zqSoGxP\/2EmuloFz","mess":"1440888219","sign":"de5d331fce1cc514994a5df64fa0f8c9333321b6d35c342debe8a030c3ad633c","sign_type":"sha256","timestamp":"1564640036"}';

$notifyData = json_decode($notifyJsonData, true);
$notifyData['data'] = \WGCYunPay\Service\Des3Service::decode($notifyData['data'], $config->des3_key);
var_dump($notifyData);
