<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Programacion */

$this->title = 'Nueva Programación';
?>
<div class="programacion-create">

    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Programacion</a></li>
            <li><a href="#">Actividades</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Programación</h3>
        </div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
