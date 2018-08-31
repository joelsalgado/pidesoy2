<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones Comunitarias';
?>
<div class="acciones-comunitarias-index">

    <div class="box">
        <ul class="nav nav-tabs">
            <li><?= Html::a('Ficha',['/ficha-tecnica/update', 'id' => $id])?></li>
            <li><?= Html::a('LIderes',['/lideres', 'id' => $id])?></li>
            <li><?= Html::a('Instituciones',['/instituciones', 'id' => $id])?></li>
            <li><?= Html::a('Necesidades',['/ficha-necesidades/update', 'id' => $id])?></li>
            <li class="active"><a href="#">Acciones Comunitarias</a></li>

        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Acciones Comunitarias</h3>
        </div>
        <div class="box-body">

            <p class="pull-right">
                <?= Html::a('Nueva Acción', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Finalizar', ['finalizar'], ['class' => 'btn btn-danger']) ?>
            </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                    'emptyText' => "No se encontró ningún elemento",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        //'ficha_id',
                        //'loc_id',
                        'nombre_accion',
                        'meta',
                        'acciones',
                        //'acciones_pendientes',
                        'inversion',
                        //'fecha_inicio',
                        //'fecha_entrega',
                        //'fecha_termino',
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
