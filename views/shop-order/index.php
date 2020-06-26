<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShopOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop Orders';
$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => ['site/shop']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shop Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
