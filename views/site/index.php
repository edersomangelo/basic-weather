<?php

/* @var $this yii\web\View */
/* @var $model app\models\WeatherForm */

use yii\widgets\Pjax;
use yii\web\View;
$this->title = 'Test - Weather';
?>
<div class="site-index">
    <?php Pjax::begin(); ?>
    <div class="hero" data-bg-image="images/banner.png">
        <div class="container">
            <?= $this->render('_form_weather',['model'=>$model]);?>
        </div>
    </div>
    <div class="forecast-table">
        <?= $this->render('_temp_partial',[
            'currentWeatherData' => $model->getCurrentWeather(),
            'forecastWeatherData' => $model->getForecastWeather(5),
        ]);?>
    </div>
    <?php Pjax::end(); ?>
</div>

<?php
$js = <<<JS
$(document).on('pjax:send', function() {
    $('#loading').show();
});
$(document).on('pjax:complete', function() {
    $('#loading').hide();
});
JS;
$this->registerJs($js,View::POS_READY,'pjax-loading');
?>