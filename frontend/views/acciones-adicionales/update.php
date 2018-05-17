<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AccionesAdicionales */

$this->title = 'Update Acciones Adicionales: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Acciones Adicionales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acciones-adicionales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
