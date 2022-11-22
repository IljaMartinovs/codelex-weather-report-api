<?php

namespace App;

class Api
{
    private string $apiKey;
    private string $name;
    private array $api = [];

    public function __construct(string $apiKey,  string $name)
    {
        $this->apiKey = $apiKey;
        $this->name = $name;
    }

    public function getData(): array
    {
        $apiCityURL = "http://api.openweathermap.org/geo/1.0/direct?q=$this->name&limit=1&appid=$this->apiKey";
        $json_data = file_get_contents($apiCityURL);
        $response_data = json_decode($json_data, true);

        $lat = $response_data[0]["lat"];
        $lon = $response_data[0]["lon"];

        $apiPreciseURL = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$this->apiKey";

        $data = file_get_contents($apiPreciseURL);
        $result = json_decode($data, true);

        $temperature = $result["main"]["temp"] - 273.15;
        $weather = $result ["weather"][0]["main"];
        $wind = $result["wind"]["speed"];
        array_push($this->api,$temperature,$weather,$wind);
        return $this->api;
    }
}