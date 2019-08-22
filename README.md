## composer require putyy/yun-pay:dev-master
# yun-pay
云账户综合服务平台(//www.yunzhanghu.com/)  api调用相关封装
### 本包主要调用方式分为两种
>1.传入参数对象调用服务
```
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

$GoPay = new \WGCYunPay\Service\PayService($config, $AliPayData);
$res   = $GoPay->query();
var_dump($res);

```
>2.链式操作调用
```
require_once __DIR__ . '/bootstrap.php';

//var_dump($config);
// 查询订单
$order = new \WGCYunPay\Service\OrderService($config);
$res   = $order
       ->setOrderId('2019002156137016ss3971231341211')
       ->setChannel('支付宝')
       ->query();
var_dump($res);
```
####
>具体看tests目录的例子

[个人博客](http://www.putyy.com)  欢迎来访
***  
