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
        $data = Yii::$app->weatherApi->forecastByCityId($this->city_id);
        if(empty($data)) {
            return null;
        }

        return array_filter($data->list,function($value){
            if(date('H:i:s',$value->dt) == '12:00:00'
                && date('Y-m-d',$value->dt) != date('Y-m-d')){
                return $value;
            }
        },ARRAY_FILTER_USE_BOTH);
    }

    private function setDefaultCity()
    {
        if (empty($this->city_id)) {
            $this->city_id = Yii::$app->params['default-weather-city'];
        }
    }
}
