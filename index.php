<?php
$title = "WeatherPHPApp";
require_once './vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if(isset($_GET['city'])) {
    $city = $_GET['city'];
} else {
    $city = 'New York';
}

$key = $_ENV['OPENWEATHERMAP_API_KEY'];

$OWM_API = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&lang=en&units=metric&APPID=" . $key;
$FORECAST_API = "http://api.openweathermap.org/data/2.5/forecast?q=" . $city . "&lang=en&units=metric&APPID=" . $key;

$curl = curl_init();
$ch = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $OWM_API);
curl_setopt($ch, CURLOPT_URL, $FORECAST_API);

$response = curl_exec($curl);
$responseForecast = curl_exec($ch);

curl_close($curl);
curl_close($ch);

$data = json_decode($response);
$dataForecast = json_decode($responseForecast);

?>
<?php include './app/head.php' ;?>
<body>
    <?php include './app/header.php' ;?>
    <?php 
    try {
        if(isset($data->name)) {
            include './app/today.php';
        } else {
            throw new Exception("⚠️Error 404⚠️");
        }
    } catch (Exception $e) {
        echo '<h1>' . $e->getMessage() . '</h1>';
        echo '<h2>Please enter a valid city</h2>';
    } ?>
    <?php include './app/forecast.php' ;?>
</body>
</html>