<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\WeatherForm */

use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1 class="title">Teste</h1>
    <p class="txt">Preencha o campo abaixo para listar uma cidade</p>
    <?php Pjax::begin(); ?>
    <div class="box-form">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => [
                'data-pjax' => '',
            ],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]);
        ?>
        <div class="form-group">
            <?= $form->field($model, 'city_id') ?>
        </div>
    </div>
    <?php ActiveForm ::end(); ?>
    <div>
        <?php print_r($model->getCurrentWeather());?>
        <?php Pjax::end(); ?>
    </div>
</div>
