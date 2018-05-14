<?php

use yii\helpers\Html;
use frontend\widgets\Apartados\Apartados;

/* @var $this yii\web\View */
/* @var $model common\models\Seguimiento */

$this->title = 'Seguimiento';
?>
<div class="seguimiento-update">

    <div class="box">
        <?=
        Apartados::widget([
            'tipo'=>5,
            'apartado' => $apartado,
            'id' => $model->solicitante_id,
        ])
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">Seguimiento</h3>
        </div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
