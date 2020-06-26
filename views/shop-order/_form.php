<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use yii\helpers\BaseJson;

/* @var $this yii\web\View */
/* @var $model app\models\ShopOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-order-form">

    <?php $model->product_id = BaseJson::decode($model->product_id); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['В обработке'=>'В обработке','Оплачен'=>'Оплачен','Удален'=>'Удален']) ?>

    <?= $form->field($model, 'product_id')->widget(MultipleInput::className(), [
        'max' => 10,
        'min' => 1,
        'columns' => [
            [
                'name'  => 'product_id',
                'type'  => 'dropDownList',
                'items' => $allProducts
            ],
        ]
     ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
