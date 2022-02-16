<?php

namespace Comtele\Services;

class ReplyService extends ServiceBase
{
    public function get_report($start_date, $end_date, $sender)
    {
        $service_url = $this->base_url . "replyreporting?startDate=".urlencode($start_date)
        ."&endDate=".urlencode($end_date)
        ."&sender=".urlencode($sender);
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
