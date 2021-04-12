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
// | Date : 2019/8/1 11:40
// +----------------------------------------------------------------------


namespace WGCYunPay\AbstractInterfaceTrait;


trait MethodTypeTrait
{
    /**
     * 操作类型
     * @var string
     */
    protected $methodType = null;

    public function setMethodType($type): self
    {
        if(!in_array($type, self::METHOD_ARR))
        {
            throw new \Exception('method type error');
        }
        $this->methodType = $type;
        return $this;
    }
}
