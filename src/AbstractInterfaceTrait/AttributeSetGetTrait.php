<?php
// +----------------------------------------------------------------------
// | Created by LW放下.
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2021/4/9 9:23 上午
// +----------------------------------------------------------------------


namespace WGCYunPay\AbstractInterfaceTrait;


use WGCYunPay\Exception\YunPayException;
use WGCYunPay\Util\StringUtil;

trait AttributeSetGetTrait
{
    /**
     * 2021/4/9 9:23 上午
     * @param $name
     * @param $arguments
     * @return  object | string | int | $this
     * @throws YunPayException
     */
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        if (preg_match("/^set([a-z][a-z0-9]+)$/i", $name, $array) || preg_match("/^get([a-z][a-z0-9]+)$/i", $name, $array)) {
            if (
                property_exists( $this, $property = StringUtil::unCame($array[1]) )
                ||
                property_exists( $this, $property = lcfirst($array[1]) )
            ) {
                if (substr($name, 0, 3) === 'get') {
                    return $this->$property;
                } else {
                    $this->$property = $arguments[0];
                    return $this;
                }
            }
        }
        YunPayException::throwSelf('参数错误~~');
    }
}