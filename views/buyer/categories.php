<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Материалы для ремонта';
?>

<table border='0' width='500'>
    <thead style="font-weight:bold; text-align:center;">
    <td width=100 align='left'>Категория</td>
    <td width=300 align='left'>Доп. информация</td>
    <td width=100>Операции</td>
</thead>
<?= Html::beginForm('categories') ?>
<?php foreach ($categories as $category): ?>
    <tr>
        <?php if ($category->CategoryID == $cid): ?>
            <td><?= Html::input('text', 'CategoryName', $category->CategoryName, ['size' => 25]) ?></td>
            <td><?= Html::input('text', 'CategoryInfo', $category->CategoryInfo, ['size' => 30]) ?></td>
            <td><?= Html::submitButton('Сохранить', ['name' => 'update', 'value' => $category->CategoryID]) ?>
                <br />
                <?= Html::submitButton('Отмена', ['name' => 'cancel']) ?></td>
        <?php else: ?>
            <td><?= Html::encode("{$category->CategoryName}") ?></td>
            <td><?= Html::encode("{$category->CategoryInfo}") ?></td>
            <td><?= Html::submitButton('Изменить', ['name' => 'edit', 'value' => $category->CategoryID]) ?></td>
        <?php endif ?>

    </tr>
<?php endforeach; ?>

<tr>
    <td colspan='3'>
        <img src="../images/linemid.gif" vspace="10">
    </td>
</tr>
<tr>
    <td colspan='3'>

        <?=
        Html::activeInput('text', $model, 'CategoryName', ['size' => 50,
            'placeholder' => 'Новая категория',
            'onfocus' => "this.placeholder=''",
            'onblur' => "this.placeholder='Новая категория'",
        ])
        ?>

    </td>
</tr>
<tr>
    <td colspan='3'>

        <?=
        Html::activeTextarea($model, 'CategoryInfo', ['rows' => 3,
            'cols' => 50,
            'placeholder' => 'Дополнительная информация',
            'onfocus' => "this.placeholder=''",
            'onblur' => "this.placeholder='Дополнительная информация'",
        ])
        ?>

    </td>
</tr>
<tr>
    <td colspan='3'>

        <?= Html::submitButton('Добавить категорию', ['name' => 'add']) ?>

    </td>
</tr>
<?= Html::endForm() ?>
</table>