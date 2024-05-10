<?php
// +----------------------------------------------------------------------
// | Created by LW放下.
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2021/4/9 8:33 上午
// +----------------------------------------------------------------------

namespace WGCYunPay\Util;

use WGCYunPay\Config;
use WGCYunPay\Exception\YunPayException;
use OpenSSLAsymmetricKey;

class RsaUtil
{
    /**
     * 相关配置
     * @var Config
     */
    protected $config;

    /**
     * 公钥
     * @var
     */
    private $public_key;

    /**
     * 私钥
     * @var
     */
    private $private_key;

    /**
     * RsaUtil constructor.
     * @param Config $config 配置
     * @param bool $isPrivateKeyEncryption 是否私钥加密方式
     * @throws YunPayException
     */
    public function __construct(Config $config, bool $isPrivateKeyEncryption = true)
    {
        $this->config = $config;
        if ($isPrivateKeyEncryption) {
            $this->private_key = $this->getPrivateKey();
            $this->public_key  = $this->getPublicKey();
        }
    }


    /**
     * 配置私钥
     * openssl_pkey_get_private这个函数可用来判断私钥是否是可用的，可用，返回资源
     * 2021/4/9 8:37 上午
     * @return false|resource
     * @throws YunPayException
     */
    private function getPrivateKey()
    {
        $privateKey = openssl_get_privatekey($this->config->private_key);
        if ($privateKey) {
            return $privateKey;
        }
        YunPayException::throwSelf('私钥不可用');
    }


    /**
     * 配置公钥
     * openssl_pkey_get_public这个函数可用来判断私钥是否是可用的，可用，返回资源
     * 2021/4/9 8:37 上午
     * @return false|resource
     * @throws YunPayException
     */
    public function getPublicKey()
    {
        $publicKey = openssl_pkey_get_public($this->config->public_key);
        if ($publicKey) {
            return $publicKey;
        }
        YunPayException::throwSelf('公钥不可用');
    }


    /**
     * 签名算法
     * 2021/4/9 8:35 上午
     * @param array $data
     * @return string
     * @throws YunPayException
     */
    public function sign(array $data): string
    {
        $sign = '';
        $res  = openssl_get_privatekey($this->getPrivateKey());
        if ($res) {
            openssl_sign(urldecode(http_build_query($data)), $sign, $res, 'SHA256');
            $this->freeKey($res);
            return base64_encode($sign);
        }
        YunPayException::throwSelf('私钥格式有误');
    }

    /**
     * @param resource|OpenSSLAsymmetricKey $key
     */
    private function freeKey($key): void
    {
        if ($key instanceof OpenSSLAsymmetricKey) {
            return;
        }

        openssl_free_key($key); // Deprecated and no longer necessary as of PHP >= 8.0
    }

    /**
     * 验签 回调验签
     * 2021/4/9 8:38 上午
     * @param array $response
     * @return bool
     * @throws YunPayException
     */
    public function verify(array $response): bool
    {
        $signData = [
            'data'      => $response['data'],
            'mess'      => $response['mess'],
            'timestamp' => $response['timestamp'],
            'key'       => $this->config->app_key,
        ];
        return (bool)openssl_verify(urldecode(http_build_query($signData)), base64_decode($response['sign']), $this->getPublicKey(), 'SHA256');
    }

    /**
     * 私钥解密 用于个税下载、发票下载文件解压密码的解密
     * 2021/4/9 8:45 上午
     * @param string $data
     * @return mixed
     * @throws YunPayException
     */
    public function privateDecrypt(string $data)
    {
        $decrypted = '';
        openssl_private_decrypt(base64_decode($data), $decrypted, $this->getPrivateKey());
        return $decrypted;
    }
}