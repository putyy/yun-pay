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

use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\MethodTypeTrait;
use WGCYunPay\Data\Router;

/**
 * 数据接⼝ 文件查询
 * Class DataFileService
 * @package WGCYunPay\Service
 */
class DataFileService extends BaseService
{
    /**
     * 查询⽇订单⽂件
     */
    const  ORDER   = 'order';

    /**
     * 查询⽇流⽔⽂件
     */
    const  BILL    = 'bill';

    /**
     * 取消待打款订单
     */
    const  RECHARGE_RECORD = 'recharge-record';

    /**
     * 请求类型
     */
    const  METHOD_ARR = [self::ORDER, self::BILL, self::RECHARGE_RECORD];

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

    use MethodTypeTrait;

    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
         return $this;
    }

    public function setBillDate($billDate)
    {
        $this->billDate = $billDate;
         return $this;
    }

    public function setAt($beginAt='', $endAt='')
    {
        $this->beginAt = $beginAt;
        $this->endAt = $endAt;
        return $this;
    }

    public function getDes3Data()
    {
        // TODO: Implement getDes3Data() method.
        $data = [];
        switch ($this->methodType) {
            case self::ORDER:
                $data = ['order_date' => $this->orderDate];
                break;
            case self::BILL:
                $data = ['bill_date' => $this->billDate];
                break;
            case self::RECHARGE_RECORD:
                $data = ['begin_at' => $this->beginAt, 'end_at' => $this->endAt];
                break;
        }
        return $data;
    }

    public function getRequestInfo()
    {
        // TODO: Implement getRequestInfo() method.
        $route = Router::ORDER_DOWNLOAD;
        switch ($this->methodType) {
            case self::ORDER:
                $route = Router::ORDER_DOWNLOAD;
                break;
            case self::BILL:
                $route = Router::BILL_DOWNLOAD;
                break;
            case self::RECHARGE_RECORD:
                $route = Router::RECHARGE_RECORD;
                break;
        }
        return [$route];
    }
}
