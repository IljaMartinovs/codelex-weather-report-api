<?php

use Carbon\Carbon;
use App\Api;

require_once "vendor/autoload.php";

$time = $_GET['city'] ?? 'Riga';
$timezone = 'Europe';
var_dump($timezone);
$api = new ApiControllers($time);
$city = $api->getData();

try {
    $localTime = Carbon::now($timezone . '/' . $time);
} catch (\Carbon\Exceptions\InvalidFormatException $e) {
    $localTime = Carbon::now();
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/styles/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather Report</title>
</head>
<body>
<h1>
    <a href="/?city=Riga">Riga &#x1F1F1;&#x1F1FB;</a>
    <a href="/?city=Tallinn">Tallinn &#127466;&#127466;</a>
    <a href="/?city=Vilnius">Vilnius &#127473;&#127481;</a><br>
    <div>
        <?php echo "Time in $time is : " . $localTime ?>;

        <form action="" method="get">
            Enter city : <input type="text" name="city" required>
            <input type="submit"><br>
            <?php echo "City is : {$city->getCity()}" ?><br>
            <?php echo "Temperature is : {$city->getTemperature()} C \u{1F321}" ?><br>
            <?php echo "Weather is : {$city->getWeather()}" ?><br>
            <?php echo "Wind is : {$city->getWind()} m/s \u{1F32C}" ?><br>
        </form>

    </div>
</h1>
</body>
</html>
