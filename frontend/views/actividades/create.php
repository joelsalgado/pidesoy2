<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Actividades */

$this->title = 'Nueva Actividad';
?>
<div class="actividades-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Actividad</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
