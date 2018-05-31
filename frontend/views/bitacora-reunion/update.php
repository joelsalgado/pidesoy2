<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BitacoraReunion */

$this->title = 'Actualizar Bitacora';

?>
<div class="bitacora-reunion-update">
    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Bitacora</a></li>
            <li><?= Html::a('Objetivos',['/bitacora-reunion2', 'id' => $model->id])?></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Bitacora</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>