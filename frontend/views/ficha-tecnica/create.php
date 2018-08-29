<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */

$this->title = 'Nueva Ficha Tecnica';
?>
<div class="ficha-tecnica-create">

    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Ficha</a></li>
            <li><a href="#">LIderes</a></li>
            <li><a href="#">Intituciones</a></li>
            <li><a href="#">Necesidades</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Ficha Tecnica</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
