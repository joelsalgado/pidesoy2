<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Programas */

$this->title = 'Actualizar Programa';
?>
<div class="programas-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Programa</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>