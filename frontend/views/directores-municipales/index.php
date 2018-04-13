<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Directores Municipales';
?>
<div class="directores-municipales-index">

    <div class="box">
        <ul class="nav nav-tabs">
            <li><?= Html::a('Formato Localidades',['/formato-loc/update', 'id' => $id])?></li>
            <li><?= Html::a('Integrantes del Cabildo',['/cabildo/index', 'id' => $id])?></li>
            <li class="active"><a href="#">Directores Municipales</a></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Directores Municipales</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Crear Director Municipal', ['create', 'id' =>$id], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Finalizar', ['/formato-loc'], ['class' => 'btn btn-danger']) ?>
            </p>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    //'formato_id',
                    'nombre_director',
                    'domicilio_director',
                    'contacto_director',
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
