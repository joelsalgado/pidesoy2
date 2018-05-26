<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BitacoraReunion2 */

$this->title = 'Actualizar Objetivo';
?>
<div class="bitacora-reunion2-update">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Objetivo</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
