<?php

namespace App\Http\Controllers;


class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temperature = 0;
        $url = "https://api.weather.yandex.ru/v1/forecast?lat=53.2520900&lon=34.3716700&lang=ru_RU&limit=1";
        $headers = [
            'X-Yandex-API-Key' => '5efbc0d4-d5dc-4b3e-9839-e7335134ddbb',
        ];
        $client = new \GuzzleHttp\Client(['headers' => $headers]);
        $res = $client->get($url);
        if ($res->getStatusCode() == 200) {
            $j = $res->getBody();
            $obj = json_decode($j);
            $temperature = $obj->fact->temp;
        }
        return view('weather', [
            "temperature" => $temperature
        ]);
    }
}
