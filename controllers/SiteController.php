<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\WeatherForm;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new WeatherForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
        }
        return $this->render(
            'index',
            ['model'=>$model]
        );
    }

    public function actionSearchCity($term) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            return Yii::$app->weatherApi->searchCity($term)
        }
    }

}
