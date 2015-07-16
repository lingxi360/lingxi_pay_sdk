<?php namespace LxPayApi\Client;

use LxPayApi\Helper\Helpers;

abstract class PayClient
{

    /**
     * ·ÃÎÊÔ¶³Ì·þÎñÆ÷²¢·µ»Ø½á¹û
     *
     */
    function unifiedRequest($pay_method, $params, $request_method){
        $para['api_key'] = $this->api_key;
        $para['timestamp'] = time();
        $para['noncestr'] = Helpers::createNonceStr(12);
        $para['signature'] = Helpers::getSign($para);
        $url = env('LINGXI_PAY_URL') . $pay_method . "?" . Helpers::createLinkstring($para);
        $method = 'http_'.strtolower($request_method);
        return Helpers::$method($url, $params);
    }

    public function setApiKey($api_key){
        $this->api_key = $api_key;
    }

    public function setApiSecret($api_secret){
        $this->api_secret = $api_secret;
    }

}