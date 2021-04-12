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
// | Date : 2019/7/26 17:04
// +----------------------------------------------------------------------


namespace WGCYunPay\AbstractInterfaceTrait;

use WGCYunPay\AbstractInterfaceTrait\ServiceInterface;
use WGCYunPay\Http\Request;
use WGCYunPay\Config;
use WGCYunPay\Service\Des3Service;
use WGCYunPay\Util\RsaUtil;

abstract class BaseService implements ServiceInterface
{
    /**
     * 相关配置
     * @var Config
     */
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * 待加密数据
     * Date : 2019/7/31 15:29
     * @return mixed
     */
    abstract protected function getDes3Data(): array;
    abstract protected function getRequestInfo(): array;

    protected function getHeader(): array
    {
        return [
            'Content-Type: application/x-www-form-urlencoded',
            "dealer-id: {$this->config->dealer_id}",
            "request-id: {$this->config->request_id}",
        ];
    }

    /**
     * 2021/4/9 8:36 上午
     * @return array
     * @throws \WGCYunPay\Exception\YunPayException
     */
    protected function getRequestData(): array
    {
        $desData  = Des3Service::encode($this->getDes3Data(), $this->config->des3_key);
        $signData              = [];
        $signData['data']      = $desData;
        $signData['mess']      = $this->config->mess;
        $signData['timestamp'] = $this->config->timestamp;
        $signData['key']       = $this->config->app_key;
        $rsa = new RsaUtil($this->config);
        $sign = $rsa->sign($signData);

        $postData              = [];
        $postData['data']      = $desData;
        $postData['mess']      = $this->config->mess;
        $postData['timestamp'] = $this->config->timestamp;
        $postData['sign']      = $sign;
        $postData['sign_type'] = 'rsa';
        return $postData;
    }

    /**
     * 2021/4/9 10:04 上午
     * @param null $callback
     * @return mixed
     * @throws \WGCYunPay\Exception\YunPayException
     */
    public function query(?Callable $callback = null)
    {
        $requestData = $this->getRequestData();
        $header      = $this->getHeader();
        $requestInfo = $this->getRequestInfo();
        $method      = $requestInfo[1] ?? 'get';
        $request  = new Request($requestInfo[0]);
        $data     = $request
                  ->setHeader($header)
                  ->$method($requestData)
                  ->getBodyJson();
        if($callback!==null && is_callable($callback)){
            return call_user_func($callback, $data);
        }

        if($data && method_exists($this, 'callback')){
            return call_user_func([$this, 'callback'], $data);
        }

        return $data;
    }
}
