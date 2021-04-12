<?php

require_once __DIR__ . '/bootstrap.php';

//  发票接口
// 1）查询商户已开具发票⾦额和待开具发票⾦额
//$invoice = new \WGCYunPay\Service\InvoiceService($config);
//$i1 = $invoice
//    // 按年份查询已开和待开发票⾦额，不传代表当前年份
//    ->setYear(2021)
//    ->setMethodType("invoice_stat")
//    ->query();
//var_dump($i1);

// 查询综合服务平台商户⽬前可开票额度和开票信息
//$amount = new \WGCYunPay\Service\InvoiceService($config);
//$i2 = $amount
//    ->setMethodType("invoice_amount")
//    ->query();
//var_dump($i2);


// 开票申请
//$apply = new \WGCYunPay\Service\InvoiceService($config);
//$i3 = $apply
//    // 发票申请编号（必填）
//    ->setInvoiceApplyId("123321")
//    // 申请开票⾦额（必填）
//    ->setAmount("10.00")
//    // 发票类型（必填）1:专票 2:普票
//    ->setInvoiceType("2")
//    //开户⾏及账号（选填，不填使⽤默认值）
//    ->setBankNameAccount("")
//    // 货物或应税劳务、服务名称 (选填，不填使⽤默认值)
//    ->setGoodsServicesName("")
//    // 发票备注 (选填，每张发票备注栏相同)
//    ->setRemark("备注信息")
//    ->setMethodType("apply")
//    ->query();
//var_dump($i3);

//// 查询开票申请状态
//$applystatus = new \WGCYunPay\Service\InvoiceService($config);
//$i4 = $applystatus
//      // 发票申请编号（与发票申请号必须⼆选⼀）
//    ->setInvoiceApplyId("123456")
//    ->setApplicationId("12345678990")
//      //  发票申请号  （与发票申请编号必须⼆选⼀）
//    ->setMethodType("invoice_status")
//    ->query();
//var_dump($i4);


// 下载pdf
//$pdf = new \WGCYunPay\Service\InvoiceService($config);
//$i5 = $pdf
//    //  发票申请编号（与发票申请号必须⼆选⼀）
//    ->setInvoiceApplyId("123456")
//    //  发票申请号  （与发票申请编号必须⼆选⼀）
//    ->setApplicationId("12345678990")
//    ->setMethodType("invoice_pdf")
//    ->query();
//var_dump($i5);
//
//// 私钥解密
////pwd为响应参数中用商户公钥加密后的密文
//$pwd="djmHuqlzGF2FVFuN6bTEGRacIcQPhjwDZghMePbBJqHWA8d/DebSl5hUlQEdkIfjwu6H9Rx29BJWdgH8wWtNfOQaa7Kzcfip/OM3iv/KblvmWyPC72fEpL2RRY80PzELI+BRmF1Jj7oxuRYmmQDgqZSm1x7WsJPNuGhL6Iq23Vw=";
//$rsa = new \WGCYunPay\Util\RsaUtil($config);
//$dd=$rsa->privateDecrypt($pwd);
//echo "明文密码:".$dd;
