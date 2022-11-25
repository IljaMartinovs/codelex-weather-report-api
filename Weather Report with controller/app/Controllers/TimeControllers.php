<?php

namespace App\Controllers;

use Carbon\Carbon;
use App\Models\Time;

class TimeControllers
{
    public function getData(string $city): string
    {
        $time = new Time($city);
        return Carbon::now('Europe/' . $time->getCity());
    }

}