<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FormatoLoc */

$this->title = 'Update Formato Loc: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Formato Locs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formato-loc-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">ACTUALIZAR FORMATO</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
