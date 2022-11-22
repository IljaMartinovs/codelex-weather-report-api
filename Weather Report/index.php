<?php

use App\{Api,City,CityCollection};
$collection = [];

while(true) {
    echo "[1] Get data about city :\n";
    echo "[2] Get all saved data about cities :\n";
    $input = readline();
    switch ($input) {

        case 1 :
            $name = (readline("Enter a city : "));
            $apiKey = "Insert your key here";
            $api = new Api($apiKey,$name);
            $city = new City($name, $api->getData()[0], $api->getData()[1], $api->getData()[2]);
            $collection [] = new CityCollection($city);
            echo "City : {$city->getCity()}\n";
            echo "Temperature : {$city->getTemperature()}\n";
            echo "Weather : {$city->getWeather()}\n";
            echo "Wind speed : {$city->getWind()}\n";
            break;
        case 2 :
            foreach ($collection as $city){
                echo $city->getAllData();
            }
            break;
        default:
            exit;
    }
}
