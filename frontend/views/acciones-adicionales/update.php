<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AccionesAdicionales */

$this->title = 'Actualizar Acciones Adicionales';
?>
<div class="acciones-adicionales-update">

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
