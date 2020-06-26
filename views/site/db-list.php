<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Db list: days';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
    <?php foreach ($days as $day): ?>
        <li>
            <?= Html::encode("{$day->name}") ?>
        </li>
    <?php endforeach; ?>
    </ul>
</div>
