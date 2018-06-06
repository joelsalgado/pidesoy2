<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DirectorioResponsables */

$this->title = 'Nuevo Registro';
?>
<div class="directorio-responsables-create">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Registro</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
