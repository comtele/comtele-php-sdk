<?php

namespace Comtele\Services;

class ContactMessageService extends ServiceBase
{
    public function send($sender, $content, $group_name)
    {

        $service_url = $this->base_url . "sendcontactmessage";
        $payload = [
            "Sender" => $sender,
            "Content" => $content,
            "GroupName" => $group_name,
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
        $res = json_decode($server_output);

        return $res;
    }

    public function schedule($sender, $content, $group_name, $schedule_date)
    {

        $service_url = $this->base_url . "schedulecontactmessage";
        $payload = [
            "Sender" => $sender,
            "Content" => $content,
            "ScheduleDate" => $schedule_date,
            "GroupName" => $group_name
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
        $res = json_decode($server_output);

        return $res;
    }

    public function get_report($start_date, $end_date, $sender, $context_rule_name)
    {

        $service_url = $this->base_url . "contextreporting?startDate=" . urlencode($start_date)
        . "&endDate=" . urlencode($end_date)
        . "&sender=" . urlencode($sender)
            . "&contextRuleName=" . $context_rule_name;

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
