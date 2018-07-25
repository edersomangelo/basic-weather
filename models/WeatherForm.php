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
        if (!empty($this->city_id)) {
            return Yii::$app->weatherApi->weatherByCityId($this->city_id);
        }
        return false;
    }
}
