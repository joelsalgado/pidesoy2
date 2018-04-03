<?php

use yii\helpers\Html;
use frontend\widgets\Apartados\Apartados;
/* @var $this yii\web\View */
/* @var $model common\models\Documentos */

$this->title = 'Documentos';
?>
<div class="documentos-update">

    <div class="box">
        <?=
        Apartados::widget([
            'tipo'=>3,
            'apartado' => $apartado,
            'id' => $model->solicitante_id,
        ])
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">Documentos</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
