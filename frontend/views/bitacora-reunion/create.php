<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BitacoraReunion */

$this->title = 'Nueva Bitacora';
?>
<div class="bitacora-reunion-create">

    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Bitacora</a></li>
            <li><a href="#">Objetivos</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Bitacora</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
