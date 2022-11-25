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
    <div>
        <a href="/Riga">Riga &#x1F1F1;&#x1F1FB;</a>
        <a href="/Tallinn">Tallinn &#127466;&#127466;</a>
        <a href="/Vilnius">Vilnius &#127473;&#127481;</a><br>

        <?php
        echo "Time in $handler is : $time";
        ?>;

        <form action="" method="post">
            Enter city: <input type="text" name="city" required>
            <input type="submit"><br>

            <?php /** @var City $weather */
            use App\Models\City; ?>
            <?php echo "City is : {$weather->getCity()}" ?><br>
            <?php echo "Temperature is : {$weather->getTemperature()} C \u{1F321}" ?><br>
            <?php echo "Weather is : {$weather->getWeather()}" ?><br>
            <?php echo "Wind is : {$weather->getWind()} km/h \u{1F32C}" ?><br>

        </form>
    </div>
</h1>
</body>
</html>