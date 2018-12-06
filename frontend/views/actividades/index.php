<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividades-index">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Actividades</h3>
        </div>
        <div class="box-body">
            <?php Pjax::begin(); ?>
            <p class="pull-right">
                <?= Html::a('Nuevo Actividad', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <div class="table table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                    'emptyText' => "No se encontró ningún elemento",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'desc_actividad',
                        //'status',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
