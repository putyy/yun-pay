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
// | Date : 2019/8/1 11:34
// +----------------------------------------------------------------------


namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\AttributeSetGetTrait;
use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataHandleTrait;
use WGCYunPay\AbstractInterfaceTrait\MethodTypeTrait;
use WGCYunPay\Data\Router;

/**
 * 2.2  数据接⼝相关操作
 * 日订单文件、日流水文件、商户充值记录、日订单数据查询、查询⽇订单⽂件 (打款和退款订单)
 * Class DataFileService
 * @package WGCYunPay\Service
 * @method $this setOrderDate($orderDate)
 * @method $this setBillDate($billDate)
 * @method $this setOffset($offset=0)
 * @method $this setLength($length=200)
 * @method $this setChannel($channel)
 * @method $this setDataType($data_type)
 */
class DataFileService extends BaseService
{
    /**
     * 查询⽇订单⽂件
     */
    const  ORDER           = 'order';

    /**
     * 查询⽇流⽔⽂件
     */
    const  BILL_FILE       = 'bill_file';

    /**
     * 查询充值记录
     */
    const  RECHARGE_RECORD = 'recharge_record';

    /**
     * 查询日订单数据
     */
    const  ORDER_RECORD    = 'order_record';

    /**
     * 查询⽇订单⽂件 (打款和退款订单)
     */
    const  ORDER_DAY       = 'order_day';

    /**
     *  查询⽇流⽔数据
     */
    const  BILLS           = 'bills';

    /**
     * 请求类型
     */
    const  METHOD_ARR      = [self::ORDER, self::BILL_FILE, self::RECHARGE_RECORD, self::ORDER_RECORD, self::ORDER_DAY, self::BILLS];

    /**
     * 流⽔时间
     * @var
     */
    private $orderDate;

    /**
     *  流⽔时间
     * @var
     */
    private $billDate;

    /**
     * 查询商户充值记录
     * 最⼤查询时间间隔不能超过30天
     * @var
     */
    private $beginAt;

    private $endAt;

    /**
     * 查询日订单数据
     * @var
     */
    private $offset    =0;

    private $length    =0;

    private $channel   ='';

    private $data_type ='';

    use MethodTypeTrait;

    use AttributeSetGetTrait;

    use DataHandleTrait;

    public function setAt(string $beginAt = '', string $endAt = ''): self
    {
        $this->beginAt = $beginAt;
        $this->endAt = $endAt;
        return $this;
    }

    protected function getDes3Data(): array
    {
        // TODO: Implement getDes3Data() method.
        $data = [];
        switch ($this->methodType) {
            case self::ORDER:
            case self::ORDER_DAY:
                $data = ['order_date' => $this->orderDate];
                break;
            case self::BILL_FILE:
                $data = ['bill_date' => $this->billDate];
                break;
            case self::BILLS:
                $data = ['bill_date' => $this->billDate, 'offset' => $this->offset, 'length' => $this->length, 'data_type' => $this->data_type];
                break;
            case self::RECHARGE_RECORD:
                $data = ['begin_at' => $this->beginAt, 'end_at' => $this->endAt];
                break;
            case self::ORDER_RECORD:
                $data = ['order_date' => $this->orderDate, 'offset' => $this->offset, 'length' => $this->length, 'channel' => $this->channel, 'data_type' => $this->data_type];
                break;
        }
        return $data;
    }

    protected function getRequestInfo(): array
    {
        // TODO: Implement getRequestInfo() method.
        switch ($this->methodType) {
            case self::BILLS:
                $route = Router::ORDER_BILLS;
                break;
            case self::BILL_FILE:
                $route = Router::BILL_DOWNLOAD;
                break;
            case self::RECHARGE_RECORD:
                $route = Router::RECHARGE_RECORD;
                break;
            case self::ORDER_RECORD:
                $route = Router::ORDER_RECORD;
                break;
            case self::ORDER_DAY:
                $route = Router::ORDER_DAY;
                break;
            case self::ORDER:
            default:
                $route = Router::ORDER_DOWNLOAD;
        }
        return [$route];
    }
}
