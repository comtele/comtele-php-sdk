<?php

namespace Comtele\Services;

class CreditService extends ServiceBase
{
    public function get_my_credits()
    {
        $service_url = $this->base_url . "credits";
        $headers = ["Content-Type: application/json", "auth-key: " . $this->api_key];

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($server_output);
        return $res->Object;
    }

    public function get_credits($username)
    {
        $service_url = $this->base_url . "credits?id=" . $username;
        $headers = ["Content-Type: application/json", "auth-key: " . $this->api_key];

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($server_output);
        return $res->Object;
    }

    public function add_credits($username, $amount)
    {
        $service_url = $this->base_url . "credits?id=" . $username . "&amount=" . $amount;
        $headers = ["Content-Type: application/json", "auth-key: " . $this->api_key, "Content-Length: 0"];

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);

        $server_output = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($server_output);

        return $res;
    }
}
