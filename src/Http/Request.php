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
// | Date : 2019/7/25 17:54
// +----------------------------------------------------------------------
namespace WGCYunPay\Http;

use WGCYunPay\Data\Router;

class Request
{
    private $url;

    private $header         = [];

    private $output;

    private $http_info;

    private static $timeout = 30;

    private $curl_ch;

    public function __construct(string $router)
    {
        $this->url = Router::getRouter($router);
    }

    public function setTimeout(int $timeout = 30): self
    {
        static::$timeout = $timeout;
        return $this;
    }

    public function setHeader(array $header = []): self
    {
        $this->header = $header;
        return $this;
    }

    public function addHeader(array $header = []): self
    {
        $this->header = array_merge($this->header, $header);
        return $this;
    }


    public function getBody()
    {
        return $this->output;
    }

    public function getBodyJson(): ?array
    {
        return $this->output ? json_decode($this->output, true) : null;
    }

    public function getHttpInfo()
    {
        return $this->http_info;
    }


    private function curlInit(): void
    {
        $this->curl_ch = curl_init();
        curl_setopt($this->curl_ch, CURLOPT_URL, $this->url);
        if (substr($this->url, 0, 5) == 'https') {
            curl_setopt($this->curl_ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($this->curl_ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        curl_setopt($this->curl_ch, CURLOPT_TIMEOUT, static::$timeout);
        if ($this->header) {
            curl_setopt($this->curl_ch, CURLOPT_HTTPHEADER, $this->header);
        }
    }

    private function curlClose(): void
    {
        curl_close($this->curl_ch);
    }

    public function get(array $data): self
    {
        $this->url .= '?'.http_build_query($data);
        $this->curlInit();
        curl_setopt($this->curl_ch, CURLOPT_HEADER, 0);
        curl_setopt($this->curl_ch, CURLOPT_NOBODY, 0);
        //只取body头
        curl_setopt($this->curl_ch, CURLOPT_RETURNTRANSFER, 1);
        $this->output = curl_exec($this->curl_ch);
        $this->http_info = curl_getinfo($this->curl_ch);
        $this->curlClose();
        return $this;
    }

    public function post(array $data = []): self
    {
        $this->curlInit();
        curl_setopt($this->curl_ch, CURLOPT_POST, true);
        curl_setopt($this->curl_ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($this->curl_ch, CURLOPT_RETURNTRANSFER, 1);
        $this->output = curl_exec($this->curl_ch);
        $this->http_info = curl_getinfo($this->curl_ch);
        $this->curlClose();
        return $this;
    }
}
