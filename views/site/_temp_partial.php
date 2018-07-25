<?php
if(!isset($currentWeatherData->id) || !isset($forecastWeatherData)) {
    return;
}
?>
<div class="container">
    <div class="forecast-container">
        <div class="today forecast">
            <div class="forecast-header">
                <div class="day">Monday</div>
                <div class="date">6 Oct</div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="location"><?=$currentWeatherData->name?></div>
                <div class="degree">
                    <div class="num"><?= round($currentWeatherData->main->temp) ?><sup>o</sup>C</div>
                    <div class="forecast-icon">
                        <img src="images/icons/icon-1.svg" alt="" width=90>
                    </div>
                </div>
                <span><img src="images/icon-umberella.png" alt="">20%</span>
                <span><img src="images/icon-wind.png" alt=""><?=$currentWeatherData->wind->speed?>m/s</span>
                <span><img src="images/icon-compass.png" alt="">East</span>
            </div>
        </div>
        <div class="forecast">
            <div class="forecast-header">
                <div class="day">Tuesday</div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="forecast-icon">
                    <img src="images/icons/icon-3.svg" alt="" width=48>
                </div>
                <div class="degree">23<sup>o</sup>C</div>
                <small>18<sup>o</sup></small>
            </div>
        </div>
        <div class="forecast">
            <div class="forecast-header">
                <div class="day">Wednesday</div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="forecast-icon">
                    <img src="images/icons/icon-5.svg" alt="" width=48>
                </div>
                <div class="degree">23<sup>o</sup>C</div>
                <small>18<sup>o</sup></small>
            </div>
        </div>
        <div class="forecast">
            <div class="forecast-header">
                <div class="day">Thursday</div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="forecast-icon">
                    <img src="images/icons/icon-7.svg" alt="" width=48>
                </div>
                <div class="degree">23<sup>o</sup>C</div>
                <small>18<sup>o</sup></small>
            </div>
        </div>
        <div class="forecast">
            <div class="forecast-header">
                <div class="day">Friday</div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="forecast-icon">
                    <img src="images/icons/icon-12.svg" alt="" width=48>
                </div>
                <div class="degree">23<sup>o</sup>C</div>
                <small>18<sup>o</sup></small>
            </div>
        </div>
        <div class="forecast">
            <div class="forecast-header">
                <div class="day">Saturday</div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="forecast-icon">
                    <img src="images/icons/icon-13.svg" alt="" width=48>
                </div>
                <div class="degree">23<sup>o</sup>C</div>
                <small>18<sup>o</sup></small>
            </div>
        </div>
        <div class="forecast">
            <div class="forecast-header">
                <div class="day">Sunday</div>
            </div> <!-- .forecast-header -->
            <div class="forecast-content">
                <div class="forecast-icon">
                    <img src="images/icons/icon-14.svg" alt="" width=48>
                </div>
                <div class="degree">23<sup>o</sup>C</div>
                <small>18<sup>o</sup></small>
            </div>
        </div>
    </div>
</div>