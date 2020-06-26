<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>

<?= $form->field($model, 'file[]')->fileInput(['multiple' => true])->label('Загрузка файлов'); ?>

    <button class="btn">Отправить</button>

<?php ActiveForm::end(); ?>
<br>
<?= Html::a('Список загруженных файлов', ['/file-field/view'], ['class'=>'btn btn-primary']) ?>
