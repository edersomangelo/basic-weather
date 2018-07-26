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
            $data = Yii::$app->jsonServerApi->cityByName($term);
            return array_map(function($row){
                return [
                    'label' =>$row->name,
                    'value' => $row->id
                ];
            },$data);
        }
    }

}
