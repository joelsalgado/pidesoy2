<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AccionesComunitarias */

$this->title = 'Acciones Comunitarias';
?>
<div class="acciones-comunitarias-view">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Acciones Comunitarias</h3>
        </div>
        <div class="box-body">
            <p>
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Estas seguro de borrar esta Acción?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'id',
                        //'ficha_id',
                        //'loc_id',
                        'nombre_accion',
                        'meta',
                        'acciones',
                        'acciones_pendientes',
                        'inversion',
                        'fecha_inicio',
                        'fecha_entrega',
                        'fecha_termino',
                        'programa',
                        'responsable',
                        //'status',
                        //'created_by',
                        //'updated_by',
                        //'created_at',
                        //'updated_at',
                    ],
                ]) ?>
        </div>
    </div>
</div>
