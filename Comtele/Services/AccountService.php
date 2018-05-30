<?php

namespace Comtele\Services;

class AccountService extends ServiceBase
{
    public function get_all_accounts()
    {
        $service_url = $this->base_url . "accounts";
        $headers = ["Content-Type: application/json", "auth-key: " . $this->api_key];

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($server_output);

        return $res;
    }

    public function get_account_by_username($username)
    {
        $service_url = $this->base_url . "accounts?id=" . $username;
        $headers = ["Content-Type: application/json", "auth-key: " . $this->api_key];

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($server_output);

        return $res;
    }
}
