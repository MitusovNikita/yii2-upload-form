<?php
use yii\helpers\Html;
?>

<table class="files-table">
    <tr>
        <td>
            <b>Название</b>
        </td>
        <td>
            <b>Дата</b>
        </td>
    </tr>
    <?php foreach ($categoryList as $category): ?>
    <tr>
        <td>
            <?= Html::encode("{$category->name}") ?>
        </td>
        <td>
            <?= Html::encode("{$category->date}") ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
