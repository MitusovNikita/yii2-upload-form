<?php
use yii\helpers\Html;
use app\components\MyWidget;

$this->title = 'Widget example';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo MyWidget::widget(['name' => 'Никита']); ?>

</div>
