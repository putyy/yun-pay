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
// | Date : 2019/8/1 14:27
// +----------------------------------------------------------------------


namespace WGCYunPay\AbstractInterfaceTrait;


use WGCYunPay\Data\Base;
use WGCYunPay\Config;

Trait DataTrait
{
    public $data;

    public function __construct(Config $config, Base $data)
    {
        parent::__construct($config);
        $this->data = $data;
    }

    protected function getDes3Data(): array
    {
        // TODO: Implement getDes3Data() method.
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[$k] = $v;
        }
        if(!property_exists($this,'dealer_broker') || $this->dealer_broker === true){
            // 默认加上以下字段
            $data['dealer_id'] = $this->config->dealer_id;
            $data['broker_id'] = $this->config->broker_id;
        }
        return $data;
    }

    /**
     * Date : 2019/8/1 14:29
     * @return mixed
     */
    protected function getRequestInfo(): array
    {
        return $this->data->getRoute();
    }
}
