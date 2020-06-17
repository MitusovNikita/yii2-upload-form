<?php
use yii\helpers\Html;
?>
<p>Спасибо за отправку сообщения!</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
    <li><label>Body</label>: <?= Html::encode($model->message) ?></li>
</ul>
