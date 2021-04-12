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
// | Date : 2019/7/31 11:50
// +----------------------------------------------------------------------


namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\AttributeSetGetTrait;
use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataHandleTrait;
use WGCYunPay\AbstractInterfaceTrait\MethodTypeTrait;
use WGCYunPay\Data\Router;
use WGCYunPay\Exception\YunPayException;

/**
 * 2.1 打款相关操作（订单、电子回单、商户余额查询、取消待打款订单）
 * Class OrderService
 * @package WGCYunPay\Service
 * @method $this setOrderId($orderId)
 * @method $this setRef($ref)
 * @method $this setChannel($channel)
 * @method $this setDataType($dataType)
 */
class OrderService extends BaseService
{
    /**
     * 查询订单
     */
    const  REALTIME   = 'realtime';

    /**
     * 电子回单
     */
    const  RECEIPT    = 'receipt';

    /**
     * 取消待打款订单
     */
    const  ORDER_FAIL = 'order_fail';

    /**
     * 查询商户余额
     */
    const  ACCOUNTS   = 'query_accounts';


    /**
     * 查询商户VA账户信息
     */
    const  VA_ACCOUNT = 'va_account';

    /**
     * 请求类型
     */
    const  METHOD_ARR = [self::REALTIME, self::RECEIPT, self::ORDER_FAIL, self::ACCOUNTS, self::VA_ACCOUNT];

    /**
     * 商户订单号
     * @var string
     */
    protected $orderId = '';

    /**
     * 银⾏卡，⽀付宝，微信(不填时为银⾏卡订 单查询)(选填)
     * @var
     */
    protected $channel;

    /**
     * 平台订单号
     * @var string
     */
    protected $ref = '';

    /**
     * 如果为encryption，则对返回的data进⾏ 加密(选填)
     * @var string
     */
    protected $dataType   = '';

    use MethodTypeTrait;

    use AttributeSetGetTrait;

    use DataHandleTrait;

    /**
     * 根据类型返回数据
     * Date : 2019/7/31 15:58
     * @return array|mixed
     * @throws \Exception
     */
    protected function getDes3Data(): array
    {
        // TODO: Implement getDes3Data() method.
        $data = [];
        switch ($this->methodType ?? self::REALTIME) {
            case self::REALTIME:
                $data = ['order_id' => $this->orderId, 'channel' => $this->channel, 'data_type' => $this->dataType];
                break;
            case self::RECEIPT:
                $data = ['order_id' => $this->orderId, 'ref' => $this->ref];
                break;
            case self::ORDER_FAIL:
                $data = ['dealer_id' => $this->config->dealer_id, 'order_id' => $this->orderId, 'ref' => $this->ref, 'channel' => $this->channel];
                break;
            case self::ACCOUNTS:
                $data = ['dealer_id' => $this->config->dealer_id];
                break;
            case self::VA_ACCOUNT:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id];
                break;
            default:
                YunPayException::throwSelf('not des3Data');
        }
        return $data;
    }

    protected function getRequestInfo(): array
    {
        $methodType = $this->methodType ?? self::REALTIME;
        $method     = 'get';
        if (in_array($methodType, [self::ORDER_FAIL])) {
            $method = 'post';
        }
        switch ($methodType) {
            case self::ACCOUNTS:
                $route = Router::QUERY_ACCOUNTS;
                break;
            case self::RECEIPT:
                $route = Router::RECEIPT_FILE;
                break;
            case self::ORDER_FAIL:
                $route = Router::ORDER_FAIL;
                break;
            case self::VA_ACCOUNT:
                $route = Router::ORDER_AV_ACCOUNT;
                break;
            case self::REALTIME:
            default:
                $route = Router::QUERY_REALTIME_ORDER;
        }
        return [$route, $method];
    }
}
