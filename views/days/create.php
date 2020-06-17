<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Days */

$this->title = 'Create Days';
$this->params['breadcrumbs'][] = ['label' => 'Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="days-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
