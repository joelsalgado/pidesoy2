<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Informes */

$this->title = 'Actualizar Informe';
?>
<div class="informes-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Informe</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
