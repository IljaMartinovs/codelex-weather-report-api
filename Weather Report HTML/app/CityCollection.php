<?php

namespace App;

class CityCollection
{
    private City $cities ;

    public function __construct(City $cities)
    {
        $this->cities = $cities;
    }

    public function getAllData(): string
    {
       return $this->cities->getCity() . " | " . $this->cities->getTemperature() . " | " . $this->cities->getWeather()  . " | " . $this->cities->getWind() .  "\n";
    }

}