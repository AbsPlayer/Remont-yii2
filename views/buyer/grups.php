<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Материалы для ремонта';
?>

<table border='0' width='500'>
    <thead style="font-weight:bold; text-align:center;">
    <td width=80 align='left'>Категория</td>
    <td width=80 align='left'>Группа товаров</td>
    <td width=260 align='left'>Доп. информация</td>
    <td width=80>Операции</td>
</thead>
<?= Html::beginForm('grups') ?>
<?php foreach ($grups as $grup): ?>
    <tr>
        <?php if ($grup['GrupID'] == $gid): ?>
            <td><?= Html::encode("{$grup['CategoryName']}") ?></td>
            <td><?= Html::input('text', 'GrupName', $grup['GrupName'], ['size' => 15]) ?></td>
            <td><?= Html::textarea('GrupInfo', $grup['GrupInfo'], ['rows' => 3, 'cols' => 25]) ?></td>
            <td><?= Html::submitButton('Сохранить', ['name' => 'update', 'value' => $grup['GrupID']]) ?>
                <br />
                <?= Html::submitButton('Отмена', ['name' => 'cancel']) ?></td>
        <?php else: ?>
            <td><?= Html::encode("{$grup['CategoryName']}") ?></td>
            <td><?= Html::encode("{$grup['GrupName']}") ?></td>
            <td><?= Html::encode("{$grup['GrupInfo']}") ?></td>
            <td><?= Html::submitButton('Изменить', ['name' => 'edit', 'value' => $grup['GrupID']]) ?></td>
        <?php endif ?>
    </tr>
<?php endforeach; ?>

<tr>
    <td colspan='4'>
        <img src="../images/linemid.gif" vspace="10">
    </td>
</tr>
<tr>
    <td colspan='2'>
        <?= Html::activeDropDownList($model_category, 'CategoryID', ArrayHelper::map($categories, 'CategoryID', 'CategoryName')) ?>
    </td>
    <td colspan="2">
        <?=
        Html::activeInput('text', $model, 'GrupName', ['size' => 30,
            'placeholder' => 'Новая группа',
            'onfocus' => "this.placeholder=''",
            'onblur' => "this.placeholder='Новая категория'",
        ])
        ?>
    </td>
</tr>
<tr>
    <td colspan="4">
        <?=
        Html::activeTextarea($model, 'GrupInfo', ['rows' => 3,
            'cols' => 50,
            'placeholder' => 'Дополнительная информация',
            'onfocus' => "this.placeholder=''",
            'onblur' => "this.placeholder='Дополнительная информация'",
        ])
        ?>
    </td>
</tr>
<tr>
    <td colspan="4">
        <?= Html::submitButton('Добавить группу', ['name' => 'add']) ?>
    </td>
    <?= Html::endForm() ?>
</tr>
</table>