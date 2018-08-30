<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */

$this->title = 'Actualizar Ficha Tecnica';
?>
<div class="ficha-tecnica-update">

    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Ficha</a></li>
            <li><?= Html::a('LIderes',['/lideres', 'id' => $model->id])?></li>
            <li><?= Html::a('Intituciones',['/bitacora-familia2', 'id' => $model->id])?></li>
            <li><?= Html::a('Necesidades',['/bitacora-familia2', 'id' => $model->id])?></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Ficha Tecnica</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
