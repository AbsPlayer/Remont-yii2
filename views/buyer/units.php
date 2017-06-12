<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Материалы для ремонта';
?>

<table border='0' width='500'>
    <thead style="font-weight:bold; text-align:center;">
    <td width=100>Единицы измерения</td>
</thead>
<?php foreach ($units as $unit): ?>
    <tr>
        <td><?= Html::encode("{$unit->UnitName}") ?></td>
    </tr>
<?php endforeach; ?>

<tr>
    <td>
        <img src="../images/linemid.gif" vspace="10">
    </td>
</tr>

<tr>
    <td>
        <?php $form = ActiveForm::begin(); ?>
        <?=
        $form->field($model, 'UnitName')->textInput([   'size' => 50,
                                                        'placeholder' => 'Новая единица измерения',
                                                        'onfocus' => "this.placeholder=''",
                                                        'onblur' => "this.placeholder='Новая едиица измерения'",
                                                    ])->label('');
        ?>
<?= Html::submitButton('Добавить ед.изм.') ?>
<?php ActiveForm::end(); ?>
    </td>
</tr>

</table>