<?php namespace LxPayApi\Facade;

use LxPayApi\Request\ClientRequest;

class LxApiFacade {

    private $payment_client = [
        "order" => "LxPayApi\Client\OrderClient",
    ];

    private function getClient($identity){
        return new $this->payment_client[$identity];
    }

    public function __construct($api_key, $api_secret){
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;

        $this->client_request = new ClientRequest();
        $this->client_request->setApiKey($this->api_key);

    }
    /**
     * post 方式
     * 返回灵析支付服务器统一结果
     */
    function generateCallPost($client_name, $method, $data){
        $client = $this->getClient($client_name);
        $client->setApiKey($this->api_key);
        return $client->$method($data, "POST");
    }


    /**
     * GET 方式请求
     *
     */
    function generateCallGet(){
        $Client = $this->getClient($client);
        return $Client->$method($data, 'GET');
    }
}