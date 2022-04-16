<div class="MultipleBlock">
    <?php for ($j = 0, $i = 8; $i < count($dataForecast->list); $i += 8, $j += 8) { ?>
        <div class="MultipleDays">
            <h2><?= ($j / 8) + 1 ?> <?= ($j != 0) ? "Days" : "Day" ?></h2>
            <p>Weather Type : <?= ucwords($dataForecast->list[$i]->weather[0]->description); ?></p>
            <img src="http://openweathermap.org/img/wn/<?= $dataForecast->list[$i]->weather[0]->icon; ?>.png" />
            <p>Temperature: <?= $dataForecast->list[$i]->main->temp; ?>&deg;C</p>
            <p>Humidity: <?= $dataForecast->list[$i]->main->humidity; ?>%</p>
            <p>Min : <?= floor($dataForecast->list[$i]->main->temp_min); ?>&deg;C</p>
            <p>Max :<?= floor($dataForecast->list[$i]->main->temp_max); ?>&deg;C</p>
        </div>
    <?php } ?>
</div>