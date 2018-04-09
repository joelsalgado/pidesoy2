<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FormatoLoc */

$this->title = 'Actualizar Formato';
?>
<div class="formato-loc-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">ACTUALIZAR FORMATO</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
