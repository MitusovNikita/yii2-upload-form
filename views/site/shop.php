<?php

use yii\helpers\Html;

$this->title = 'Shop';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Список товаров', ['/product/index'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Список заказов', ['/shop-order/index'], ['class'=>'btn btn-primary']) ?>
</div>
