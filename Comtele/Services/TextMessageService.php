<?php

namespace Comtele\Services;

class TextMessageService extends ServiceBase
{
    public function send($sender, $content, $receivers)
    {
        $service_url = $this->base_url . "send";
        $payload = [
            "Sender" => $sender,
            "Content" => $content,
            "Receivers" => implode(",", $receivers),
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

    public function schedule($sender, $content, $schedule_date, $receivers)
    {

        $service_url = $this->base_url . "schedule";
        $payload = [
            "Sender" => $sender,
            "Content" => $content,
            "ScheduleDate" => $schedule_date,
            "Receivers" => implode(",", $receivers),
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

    public function get_detailed_report($start_date, $end_date, $delivery_status)
    {
        global $API_KEY;

        $service_url = $this->base_url . "detailedreporting?startDate=" . urlencode($start_date) . "&endDate=" . urlencode($end_date) . "&delivered=" . $delivery_status;
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

    public function get_consolidated_report($start_date, $end_date, $group_type)
    {
        global $API_KEY;

        $service_url = $this->base_url . "consolidatedreporting?startDate=" . urlencode($start_date) . "&endDate=" . urlencode($end_date) . "&group=" . $group_type;
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
