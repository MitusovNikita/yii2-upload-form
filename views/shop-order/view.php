<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\BaseJson;

/* @var $this yii\web\View */
/* @var $model app\models\ShopOrder */

$this->title = $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => ['site/shop']];
$this->params['breadcrumbs'][] = ['label' => 'Shop Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shop-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'number',
            'status',
        ],
    ]) ?>

    <h3>Products</h3>
    <ul>
        <?php foreach ($productsInOrder as $key => $productInOrder): ?>
        <li><?php echo $productInOrder['name']; ?></li>
        <?php endforeach; ?>
    </ul>

</div>
