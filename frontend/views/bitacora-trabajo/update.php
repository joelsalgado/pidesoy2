<?php

use yii\helpers\Html;

$this->title = 'Actualizar Bitacora de Trabajo';

?>
<div class="bitacora-trabajo-update">
    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Bitacora</a></li>
            <li><?= Html::a('Objetivos',['/bitacora-trabajo2', 'id' => $model->id])?></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Bitacora de Trabajo</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>