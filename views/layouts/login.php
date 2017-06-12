<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

     <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "<tr><td>{label}</td><td>{input}</td><td>{error}</td></tr>",
        ],
    ]); ?>

        <?php $form->action = '/login'?>
        <?= $form->field($model_login, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model_login, 'password')->passwordInput() ?>
    <tr><td colspan='2' align='right'>
        <?= Html::submitButton('Вход', ['name' => 'login-button']) ?>
        </td></tr>
    <?php ActiveForm::end(); ?>


