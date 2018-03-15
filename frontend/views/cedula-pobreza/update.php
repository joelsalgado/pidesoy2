<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CedulaPobreza */

$this->title = 'Update Cedula Pobreza: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Cedula Pobrezas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cedula-pobreza-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
