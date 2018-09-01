<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FichaNecesidades */

$this->title = 'Nueva Necesidad';
?>
<div class="ficha-necesidades-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Necesidad</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
