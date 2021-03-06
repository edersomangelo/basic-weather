<?php
/* @var $model app\models\WeatherForm */
/* @var $form yii\bootstrap\ActiveForm */


use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;
?>
<div class="box-form">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [
            'data-pjax' => '',
            'class'=>'find-location'
        ],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{input}\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?php
        echo AutoComplete::widget ([
        'model' => $model,
        'attribute' => 'city_id',
        'clientOptions' => [
            'source' => \yii\helpers\Url::to(['site/search-city'])
        ],
    ]);
    ?>

    <? //= $form->field($model, 'city_id')->textInput(["placeholder"=>"Find your location..."]) ?>
    <input type="submit" value="Find">

    <?php ActiveForm ::end(); ?>
</div>