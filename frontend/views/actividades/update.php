<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Actividades */

$this->title = 'Actualizar Actividad';
?>
<div class="actividades-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Actividad</h3>
        </div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>