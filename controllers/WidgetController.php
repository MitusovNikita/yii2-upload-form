<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class WidgetController extends Controller
{
    /**
     * Displays widget example page.
     *
     * @return string
     */
    public function actionIndex()
    {
        // отрисовка страницы
        return $this->render('index');
    }
}
