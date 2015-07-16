<?php namespace LxPayApi\Client;

/**
 *  订单处理
 *
 */

use LxPayApi\Client;

class OrderClient extends PayClient
{
    /**
     *  生成订单并返回支付跳转链接
     */
    public function create($data, $request_method){
        return $this->unifiedRequest("/pay/create", $data, $request_method);
    }
}