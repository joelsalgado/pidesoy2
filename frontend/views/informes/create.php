<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Informes */

$this->title = 'Nuevo Informe';
?>
<div class="informes-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Informe</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
