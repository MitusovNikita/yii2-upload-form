<?php
namespace app\controllers;

use yii\web\Controller;

class StudyController extends Controller {

    // локальный шаблон для контроллера
    public $layout = 'main';

    public function actionIndex() {
        // локальный шаблон для action
        $this->layout = 'main';
        return $this->render('index');
    }
}
