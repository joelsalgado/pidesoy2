<?php

use yii\helpers\Html;


$this->title = 'Nueva Bitacora de Trabajo';
?>
<div class="bitacora-trabajo-create">

    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Bitacora</a></li>
            <li><a href="#">Objetivos</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Bitacora de Trabajo</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
