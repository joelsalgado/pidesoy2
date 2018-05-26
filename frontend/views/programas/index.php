<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programas';
?>
<div class="programas-index">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Programas</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Nuevo Programa', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'nomb_programa',
                    'desc_programa',
                    'responsable',
                    //'status',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
