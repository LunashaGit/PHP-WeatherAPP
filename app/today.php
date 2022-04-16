
<div class="Regroup__Today">
    <div class="Today">
        <h1><?= $data->name; ?>, <?= $data->sys->country; ?></h1>
        <h2>Today</h2>
        <p>Weather Type : <?= ucwords($data->weather[0]->description); ?></p>
        <img src="http://openweathermap.org/img/wn/<?= $data->weather[0]->icon; ?>.png" />
        <p>Temperature: <?= $data->main->temp; ?>&deg;C</p>
        <p>Humidity: <?= $data->main->humidity; ?>%</p>
        <p>Min : <?= floor($data->main->temp_min); ?>&deg;C Max :<?= floor($data->main->temp_max); ?>&deg;C</p>
    </div>
</div>