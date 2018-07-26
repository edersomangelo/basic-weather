<?php

namespace app\models;

use Yii;
use yii\base\Model;

class WeatherForm extends Model
{
    public $city_name;
    public $city_id;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['city_id'], 'required'],
            [['city_name, city_id'], 'safe'],
        ];
    }
    public function getCurrentWeather()
    {
        $this->setDefaultCity();
        return Yii::$app->weatherApi->weatherByCityId($this->city_id);
    }

    public function getForecastWeather()
    {
        $this->setDefaultCity();
        return Yii::$app->weatherApi->forecastByCityId($this->city_id);
    }

    private function setDefaultCity()
    {
        if (empty($this->city_id)) {
            $this->city_id = Yii::$app->params['default-weather-city'];
        }
    }
}
