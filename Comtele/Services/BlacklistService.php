<?php

namespace Comtele\Services;

class BlacklistService extends ServiceBase
{
    public function get_blacklist()
    {
        $service_url = $this->base_url . "blacklist";
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

    public function get_by_phone_number($phone_number)
    {
        $service_url = $this->base_url . "blacklist?id" . $phone_number;
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

    public function insert($phone_number)
    {
        $service_url = $this->base_url . "blacklist";

        $payload = [
            "PhoneNumber" => $phone_number
        ];

        $headers = [
            "Content-Type: application/json",
            "Content-Length: " . strlen(json_encode($payload)),
            "auth-key:" . $this->api_key,
        ];

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $server_output = curl_exec($curl);
        curl_close($curl);

        return json_decode($server_output);
    }

    public function remove($phone_number)
    {
        $service_url = $this->base_url . "blacklist?id=" . $phone_number;
        $headers = ["Content-Type: application/json", "auth-key: " . $this->api_key, "Content-Length: 0"];

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);

        $server_output = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($server_output);

        return $res;
    }
}
