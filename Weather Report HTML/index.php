<?php

use Carbon\Carbon;

require_once "vendor/autoload.php";

use App\Api;
use App\City;
use App\CityCollection;

$collection = [];
$title = "Weather Report";

if(isset($_POST['city']))
    $name = $_POST['city'];
else
$_POST['city'] = 'Riga';

if (($_POST) != null) {
    $name = $_POST['city'];
    $apiKey = "";
    $api = new Api($apiKey, $name);
    $city = new City($name, $api->getData()[0], $api->getData()[1], $api->getData()[2]);
    $collection [] = new CityCollection($city);
    $town = $city->getCity();
    $temperature = $city->getTemperature();
    $weather = $city->getWeather();
    $wind = $city->getWind();
}
?>

<!doctype html>
<html lang="en">
<head>
    <style>
    body {
        background: #808080;
        color: white;
    }
    h1 {
        text-align: center;
    }
    form {
        text-align: center;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<h1>
<a href="/?city=Riga">Riga &#x1F1F1;&#x1F1FB;</a>
<a href="/?city=Tallinn">Tallinn &#127466;&#127466;</a>
<a href="/?city=Vilnius">Vilnius &#127473;&#127481;</a><br>

<div style="text-align:center;">

    <form action="" method="get">
        <?php if($_GET != null) { ?>
            <?php echo "\u{1F551}Time in {$_GET['city']} is : " . Carbon::now('Europe/' . $_GET['city']); ?><br>
        <?php } ?>
    </form>

    <form action="" method="post">
    Enter city : <input type="text" name="city">
    <input type="submit"><br>
    <?php if($_POST != null) { ?>
        <?php echo "City is : $town"?><br>
        <?php echo "Temperature is : $temperature C \u{1F321}"?><br>
        <?php echo "Weather is : " . $weather ?><br>
        <?php echo "Wind is : $wind m/s \u{1F32C}"?><br>
    <?php } ?>
</form>
</div>
</h1>
</body>
</html>
