<?php
if(!isset($currentWeatherData->id) || !isset($forecastWeatherData)) {
    return;
}
?>
<div class="container">
    <div class="forecast-container">
        <div class="today forecast">
            <div class="forecast-header">
                <div class="day"><?=date('l')?></div>
                <div class="date"><?= date('d M')?></div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="location"><?=$currentWeatherData->name?></div>
                <div class="degree">
                    <div class="num"><?= round($currentWeatherData->main->temp) ?><sup>o</sup>C</div>
                    <div class="forecast-icon">
                        <img src="http://openweathermap.org/img/w/<?=$currentWeatherData->weather[0]->icon?>.png" alt="" width=100>
                    </div>
                </div>
                <span>Min: <?=$currentWeatherData->main->temp_min?><sup>o</sup>C</span>
                <span>Max: <?=$currentWeatherData->main->temp_max?><sup>o</sup>C</span>
            </div>
        </div>
        <?php foreach ($forecastWeatherData as $forecast): ?>
        <div class="forecast">
            <div class="forecast-header">
                <div class="day"><?=date('l',$forecast->dt)?></div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="forecast-icon">
                    <img src="http://openweathermap.org/img/w/<?=$forecast->weather[0]->icon?>.png" alt="" width=48>
                </div>
                <div class="degree"><?=$forecast->main->temp_max?><sup>o</sup>C</div>
                <small><?=$forecast->main->temp_min?><sup>o</sup></small>
            </div>
        </div>
        <?php endforeach ;?>
    </div>
</div>