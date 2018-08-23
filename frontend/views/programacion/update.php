<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Programacion */

$this->title = 'Actualizar Programación';
?>
<div class="programacion-update">

    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Programación</a></li>
            <li><?= Html::a('Actividades',['/programacion2', 'id' => $model->id])?></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Programaciòn</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
