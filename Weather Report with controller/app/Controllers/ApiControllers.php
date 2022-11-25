<?php

namespace App\Controllers;

use App\Models\Api;
use App\Models\City;

class ApiControllers
{
    private const API_URL = 'https://api.openweathermap.org/';

    public function getData(string $name): City
    {
        $name = new Api($name);
        $apiKey = "";
        $apiCityURL = self::API_URL . "geo/1.0/direct?q={$name->getName()}&limit=1&appid=$apiKey";
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
        return new City($name->getName(), $temperature, $weather, $wind);
    }
}
