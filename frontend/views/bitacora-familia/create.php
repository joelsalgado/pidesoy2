<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bitacorafamilia */

$this->title = 'Nueva Bitacora de familia';
?>
<div class="bitacora-familia-create">

    <div class="box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Bitacora</a></li>
            <li><a href="#">Objetivos</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Bitacora de familia</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
