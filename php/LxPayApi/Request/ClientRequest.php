<?php namespace LxPayApi\Request;

class ClientRequest{

    public function setApiKey($api_key){
        $this->api_key = $api_key;
    }

    public function getApiKey(){
        return $this->api_key;
    }

}