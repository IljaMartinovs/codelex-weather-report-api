<?php

namespace App\Models;

class City
{
    private string $city;
    private string $temperature;
    private string $weather;
    private string $wind;

    public function __construct(string $city, string $temperature, string $weather, float $wind)
    {
        $this->city = $city;
        $this->temperature = $temperature;
        $this->weather = $weather;
        $this->wind = $wind;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getTemperature(): string
    {
        return $this->temperature;
    }

    public function getWeather(): string
    {
        return $this->weather;
    }

    public function getWind(): float
    {
        return $this->wind;
    }
}
