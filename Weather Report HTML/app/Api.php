<?php

namespace App;

class Api
{
    private const API_URL = 'https://api.openweathermap.org/';
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getData(): City
    {
        $apiKey = "";
        $apiCityURL = self::API_URL . "geo/1.0/direct?q=$this->name&limit=1&appid=$apiKey";
        $json_data = file_get_contents($apiCityURL);
        $response_data = json_decode($json_data, true);

        $lat = $response_data[0]["lat"];
        $lon = $response_data[0]["lon"];

        $apiPreciseURL = self::API_URL . "data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey";

        $data = file_get_contents($apiPreciseURL);
        $result = json_decode($data, true);

        $temperature = $result["main"]["temp"] - 273.15;
        $weather = $result ["weather"][0]["main"];
        $wind = $result["wind"]["speed"];

        return new City($this->name,$temperature, $weather, $wind);
    }
}
