<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model,'name')->dropDownList([
    '0' => 'Активный',
    '1' => 'Отключен',
    '2'=>'Удален'
]); ?>

<?php ActiveForm::end(); ?>
