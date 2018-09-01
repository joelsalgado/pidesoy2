<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AccionesComunitarias */

$this->title = 'Actualizar Acciones Comunitarias';
?>
<div class="acciones-comunitarias-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Acciones Adicionales</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
