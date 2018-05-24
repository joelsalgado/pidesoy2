<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones Adicionales';
?>
<div class="acciones-adicionales-index">

    <div class="box">
        <?=
        \frontend\widgets\Apartados\Apartados::widget([
            'tipo'=>6,
            'apartado' => $apartado,
            'id' => $id,
        ])
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">Acciones Adicionales</h3>
        </div>
        <div class="box-body">

            <p class="pull-right">
                <?= Html::a('Finalizar', ['finalizar'], ['class' => 'btn btn-danger']) ?>
                <?= Html::a('Nueva Accion', ['create', 'id'=> $id], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    //'solicitante_id',
                    //'periodo',
                    'nombre_accion',
                    'meta',
                    'acciones',
                    //'acciones_pendientes',
                    'inversion',
                    //'fecha_inicio',
                    //'fecha_entrega',
                    //'programa',
                    //'responsable',
                    //'status',
                    //'created_by',
                    //'updated_by',
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
