<?php
namespace WGCYunPay\Service;

use WGCYunPay\AbstractInterfaceTrait\AttributeSetGetTrait;
use WGCYunPay\AbstractInterfaceTrait\BaseService;
use WGCYunPay\AbstractInterfaceTrait\DataHandleTrait;
use WGCYunPay\AbstractInterfaceTrait\MethodTypeTrait;
use WGCYunPay\Data\Router;
use WGCYunPay\Exception\YunPayException;

/**
 * h5签约相关接口封装.
 * Class H5SignService.
 * @package WGCYunPay\Service
 * @method $this setRealName($real_name)
 * @method $this setIdCard($id_card)
 * @method $this setCertificateType($certificate_type)
 * @method $this setToken($token)
 * @method $this setColor($color)
 * @method $this setUrl($url)
 * @method $this setRedirectUrl($redirect_url)
 */
class H5SignService extends BaseService
{
    /**
     * 预申请签约
     */
    const PRE_SIGN = 'pre_sign';

    /**
     * 签约接口
     */
    const H5_SIGN = 'sign_h5';

    /**
     *  获取用户签约状态
     */
    const SIGN_STATUS = 'sign_status';

    /**
     * 对接测试解约接口
     */
    const TEST_RESCIND = 'sign_release';

    /**
     * 请求类型
     */
    const  METHOD_ARR = [self::PRE_SIGN, self::H5_SIGN, self::SIGN_STATUS, self::TEST_RESCIND];

    /**
     * 身份证姓名
     */
    protected $real_name;

    /**
     * 身份证号码
     */
    protected $id_card;

    /**
     * 证件类型
     * 0：身份证 2：港澳居民来往内地通行证 3：护照 5：台湾居民来往大陆通行证
     */
    protected $certificate_type;

    /**
     * H5 预申请签约接口返回的 token
     */
    protected $token;

    /**
     * H5 页面主题颜色
     */
    protected $color;

    /**
     * 回调url地址 用户签约完成之后，回调商户通知签约完成
     */
    protected $url;

    /**
     * 跳转url 签约完成之后通过此url跳回商户指定的页面
     */
    protected $redirect_url;

    use MethodTypeTrait;

    use AttributeSetGetTrait;

    use DataHandleTrait;

    /**
     * @throws YunPayException
     */
    protected function getDes3Data(): array
    {
        // TODO: Implement getDes3Data() method.
        $data = [];
        switch ($this->methodType ?? self::PRE_SIGN) {
            case self::H5_SIGN:
                $data = ['token' => $this->token, 'color' => $this->color, 'url'=>$this->url, 'redirect_url'=>$this->redirect_url];
                break;
            case self::SIGN_STATUS:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id, 'real_name' => $this->real_name, 'id_card' => $this->id_card];
                break;
            case self::PRE_SIGN:
            case self::TEST_RESCIND:
                $data = ['dealer_id' => $this->config->dealer_id, 'broker_id' => $this->config->broker_id,
                    'real_name' => $this->real_name, 'id_card' => $this->id_card, 'certificate_type' => $this->certificate_type];
                break;
            default:
                YunPayException::throwSelf('not des3Data');
        }
        return $data;
    }

    protected function getRequestInfo(): array
    {
        // TODO: Implement getRequestInfo() method.
        $methodType = $this->methodType ?? self::PRE_SIGN;
        $method     = 'get';
        if (in_array($methodType, [self::PRE_SIGN, self::TEST_RESCIND])) {
            $method = 'post';
        }
        switch ($methodType) {
            case self::PRE_SIGN:
                $route = Router::PRE_SIGN;
                break;
            case self::H5_SIGN:
                $route = Router::H5_SIGN;
                break;
            case self::SIGN_STATUS:
                $route = Router::SIGN_STATUS;
                break;
            case self::TEST_RESCIND:
                $route = Router::TEST_RESCIND;
                break;
            default:
                $route = Router::PRE_SIGN;
        }
        return [$route, $method];
    }
}