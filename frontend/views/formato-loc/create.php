<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FormatoLoc */

$this->title = 'DESCRIPCIÓN SOCIOPOLÍTICA DE LA LOCALIDAD';
?>
<div class="formato-loc-create">
    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="">Formato de Localidades</a></li>
            <li><a href="">Integrantes del Cabildo</a></li>
            <li><a href="">Directores Municipales</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">NUEVO FORMATO</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
