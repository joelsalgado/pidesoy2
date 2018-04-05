<?php

use yii\helpers\Html;
use frontend\widgets\Apartados\Apartados;

/* @var $this yii\web\View */
/* @var $model common\models\CedulaPobreza */

$this->title = 'Actualizar Cedula Pobreza';
?>
<div class="cedula-pobreza-update">

    <div class="box">
        <?=
        Apartados::widget([
                'tipo'=>2,
                'apartado' => $apartado,
                'id' => $model->solicitante_id,
        ])
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Participante</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
