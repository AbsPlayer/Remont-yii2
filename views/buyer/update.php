<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Units */

$this->title = 'Update Units: ' . $model->UnitID;
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UnitID, 'url' => ['view', 'id' => $model->UnitID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="units-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
