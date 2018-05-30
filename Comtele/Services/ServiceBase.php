<?php

namespace Comtele\Services;

abstract class ServiceBase
{
    protected $api_key;
    protected $base_url;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
        $this->base_url = "https://sms.comtele.com.br/api/v2/";
    }
}
