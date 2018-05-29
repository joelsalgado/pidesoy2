<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos';
?>
<div class="bitacora-reunion2-index">

    <div class="box">
        <ul class="nav nav-tabs">
            <li><?= Html::a('Bitacora',['bitacora-reunion/update', 'id' => $id])?></li>
            <li class="active"><a href="#">Objetivos</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Objetivos</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Finalizar', ['/bitacora-reunion'], ['class' => 'btn btn-danger']) ?>
                <?= Html::a('Nuevo Objetivo', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    //'bitacora_reunion_id',
                    'fechas',
                    'objetivo',
                    //'autoridades_federales',
                    //'autoridades_estatales',
                    //'autoridades_municipales',
                    //'acuerdos',
                    //'observaciones',
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
