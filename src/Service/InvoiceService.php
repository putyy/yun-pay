<?php

namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\AttributeSetGetTrait;
use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataHandleTrait;
use WGCYunPay\AbstractInterfaceTrait\DataTrait;
use WGCYunPay\AbstractInterfaceTrait\MethodTypeTrait;
use WGCYunPay\Data\Router;
use WGCYunPay\Exception\YunPayException;

/**
 * 2.4 发票接口操作
 * Class OrderService
 * @package WGCYunPay\Service
 * @method $this setYear(int $year)
 * @method $this setInvoiceApplyId(string $invoice_apply_id)
 * @method $this setAmount(string $amount)
 * @method $this setInvoiceType(string $invoice_type)
 * @method $this setBankNameAccount(string $bank_name_account)
 * @method $this setGoodsServicesName(string $goods_services_name)
 * @method $this setRemark(string $remark)
 * @method $this setApplicationId(string $application_id)
 */
class InvoiceService extends BaseService
{
    /**
     * 查询商户已开具和待开具发票金额
     */
    const  INVOICE_STAT         = 'invoice_stat';

    /**
     * 查询可开票额度
     */
    const  INVOICE_AMOUNT       = 'invoice_amount';

    /**
     * 开票申请
     */
    const  INVOICE_APPLY        = 'apply';

    /**
     * 查询开票申请状态
     */
    const  INVOICE_APPLY_STATUS = 'invoice_status';

    /**
     * 下载发票PDF
     */
    const  INVOICE_PDF          = 'invoice_pdf';

    /**
     * 发送发票扫描件压缩包下载链接邮件
     */
    const  INVOICE_REMINDER     = 'reminder_email';

    /**
     * 请求类型
     */
    const  METHOD_ARR           = [self::INVOICE_STAT, self::INVOICE_AMOUNT, self::INVOICE_APPLY, self::INVOICE_APPLY_STATUS, self::INVOICE_PDF, self::INVOICE_REMINDER];

    /**
     * 发票申请编号
     * @var string
     */
    protected $invoice_apply_id;

    /**
     * 申请开票金额
     * @var string
     */
    protected $amount;

    /**
     * 发票类型
     * @var string
     */
    protected $invoice_type;

    /**
     * 开户行及账号
     * @var string
     */
    protected $bank_name_account;
    /**
     * 货物或应税劳务、服务名称
     * @var string
     */
    protected $goods_services_name;
    /**
     * 发票备注
     * @var string
     */
    protected $remark;

    /**
     * 发票申请编号
     * @var string
     */
    protected $application_id;

    /**
     * 查询年份
     * @var
     */
    protected $year = 2019;

    use MethodTypeTrait;

    use AttributeSetGetTrait;

    use DataHandleTrait;

    /**
     * 根据类型返回数据
     * Date : 2019/7/31 15:58
     * @return array|mixed
     * @throws YunPayException
     */
    protected function getDes3Data(): array
    {
        // TODO: Implement getDes3Data() method.
        $data = [];
        switch ($this->methodType ?? self::INVOICE_STAT) {
            case self::INVOICE_STAT:
                $data = ['year' => $this->year, 'dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id];
                break;
            case self::INVOICE_AMOUNT:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id];
                break;
            case self::INVOICE_APPLY:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id, 'invoice_apply_id' => $this->invoice_apply_id, 'amount' => $this->amount,
                    'invoice_type' => $this->invoice_type, 'bank_name_account' => $this->bank_name_account, 'goods_services_name' => $this->goods_services_name, 'remark' => $this->remark];
                break;
            case self::INVOICE_REMINDER:
            case self::INVOICE_APPLY_STATUS:
            case self::INVOICE_PDF:
                $data = ['invoice_apply_id' => $this->invoice_apply_id, 'application_id' => $this->application_id];
                break;
            default:
                YunPayException::throwSelf('not des3Data');
        }
        return $data;
    }

    protected function getRequestInfo(): array
    {
        $methodType = $this->methodType ?? self::INVOICE_STAT;
        $method = 'get';
        if (in_array($methodType, [self::INVOICE_AMOUNT, self::INVOICE_APPLY, self::INVOICE_APPLY_STATUS, self::INVOICE_PDF, self::INVOICE_REMINDER])) {
            $method = 'post';
        }
        switch ($methodType) {
            case self::INVOICE_AMOUNT:
                $route = Router::INVOICE_AMOUNT;
                break;
            case self::INVOICE_APPLY:
                $route = Router::INVOICE_APPLY;
                break;
            case self::INVOICE_APPLY_STATUS:
                $route = Router::INVOICE_APPLY_STATUS;
                break;
            case self::INVOICE_PDF:
                $route = Router::INVOICE_PDF;
                break;
            case self::INVOICE_REMINDER:
                $route = Router::INVOICE_REMINDER_EMAIL;
                break;
            case self::INVOICE_STAT:
            default:
                $route = Router::INVOICE_STAT;
        }
        return [$route, $method];
    }
}
