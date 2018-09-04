<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinutaAutoridades */

$this->title = 'Actualizar Minuta';
?>
<div class="minuta-autoridades-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Minuta</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
