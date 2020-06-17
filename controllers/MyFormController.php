<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\MyForm;

class MyFormController extends Controller
{
    public function actionIndex()
    {
        $model = new MyForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
