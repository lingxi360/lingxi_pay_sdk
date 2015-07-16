<?php namespace LxPayApi;

use LxPayApi\Helpers;
use LxPayApi\Facade\LxApiFacade;

class LingxiPay{

    public function __construct($api_key, $api_secret){
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
    }

    /**
     * 获取灵析支付平台的url
     * params array(
     *      "out_trade_no"    => (必填)
     *      "total"           => (必填)
     *      "redirect_url"    => (必填)
     *      "notify_url"      => (必填)
     *      "channel"         => 支付渠道(支付宝、微信、银联等，必填)
     *      "title"           => (必填)
     *      "desc"            => (必填)
     *      "client_ip"       =>（必填）
     *      "client_ip"       =>（必填）
     *      "extra_params"    => (选填)
     * )
     *
     * 以上所有的参数都是字符串
     *
     */

    public function call($client, $method, $params){
        if(!$client || !$method) return false;
        $lxfacade = new LxApiFacade($this->api_key, $this->api_secret);
        return $lxfacade->generateCallPost($client, $method, $params, $this->api_key, $this->api_secret);
    }
}