<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FichaNecesidades */

$this->title = 'Deteccion de Nececidades';
?>
<div class="ficha-necesidades-update">

    <div class="box">
        <ul class="nav nav-tabs">
            <li><?= Html::a('Ficha',['/ficha-tecnica/update', 'id' => $id])?></li>
            <li><?= Html::a('LIderes',['/lideres', 'id' => $id])?></li>
            <li><?= Html::a('Intituciones',['/instituciones', 'id' => $id])?></li>
            <li class="active"><a href="#">Necesidades</a></li>
            <li><?= Html::a('Acciones Comunitarias',['/acciones-comunitarias', 'id' => $id])?></li>

        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Deteccion de Nececidades</h3>
        </div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
