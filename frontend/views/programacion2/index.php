<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividades';
?>
<div class="programacion2-index">

    <div class="box">
        <ul class="nav nav-tabs">
            <li><?= Html::a('Bitacora',['programacion/update', 'id' => $id])?></li>
            <li class="active"><a href="#">Objetivos</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Objetivos</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Finalizar', ['/programacion'], ['class' => 'btn btn-danger']) ?>
                <?= Html::a('Nueva Actividad', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
            </p>
            <div class="table table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                    'emptyText' => "No se encontró ningún elemento",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        //'programacion_id',
                        'actividad',
                        //'ubicacion',
                        //'hora',
                        'fecha_inicio',
                        'fecha_termino',
                        //'objetivos',
                        //'asistentes',
                        //'responsable_actividad',
                        //'responsable_vivienda',
                        //'acuerdos',
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
</div>
