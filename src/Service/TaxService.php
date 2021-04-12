<?php


namespace WGCYunPay\Service;


use WGCYunPay\AbstractInterfaceTrait\AttributeSetGetTrait;
use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\MethodTypeTrait;
use WGCYunPay\Data\Router;
use WGCYunPay\Exception\YunPayException;

/**
 * 个税接口
 * Class OrderService
 * @package WGCYunPay\Service
 * @method $this setEntId(string $ent_id)
 * @method $this setYearMonth(string $year_month)
 * @method $this setYear(string $year)
 */
class TaxService extends BaseService
{
    /**
     * 商户签约主体
     * @var string
     */
    protected $ent_id     = '';

    /**
     * 所属期
     * @var string
     */
    protected $year_month = '';

    /**
     * ⽤户报税所在年份
     * @var string
     */
    protected $year       = '';

    /**
     * 所查询⽤户的身份证件号码
     * @var string
     */
    protected $id_card    = '';

    /**
     * 下载个税扣缴明细表
     */
    const  TAX_FILE       = 'tax_file';

    /**
     * 查询纳税⼈是否为跨集团⽤户
     */
    const  TAX_CROSS = 'tax_cross';

    /**
     * 请求类型
     */
    const  METHOD_ARR = [self::TAX_FILE, self::TAX_CROSS];

    use MethodTypeTrait;

    use AttributeSetGetTrait;

    /**
     * 2021/4/12 2:36 下午
     * @return array
     * @throws YunPayException
     */
    protected function getDes3Data(): array
    {
        $data = [];
        switch ($this->methodType) {
            case self::TAX_CROSS:
                $data = ['dealer_id' => $this->config->dealer_id, 'year' => $this->year_month, 'id_card' => $this->id_card, 'ent_id' => $this->ent_id];
                break;
            case self::TAX_FILE:
                $data = ['dealer_id' => $this->config->dealer_id, 'year_month' => $this->year_month, 'ent_id' => $this->ent_id];
                break;
            default:
                YunPayException::throwSelf('not des3Data');
        }
        return $data;
    }

    protected function getRequestInfo(): array
    {
        switch ($this->methodType) {
            case self::TAX_CROSS:
                $router = Router::TAX_CROSS;
                break;
            case self::TAX_FILE:
            default:
                $router = Router::TAX_DOWNLOAD;
        }
        return [$router, 'post'];
    }
}
