<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Integrantes de Cabildo';
?>
<div class="cabildo-index">

    <div class="box">
        <ul class="nav nav-tabs">
            <li><?= Html::a('Formato Localidades',['/formato-loc/update', 'id' => $id])?></li>
            <li class="active"><a href="#">Integrantes del Cabildo</a></li>
            <li><?= Html::a('Directores Municipales',['/directores-municipales/index', 'id' => $id])?></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Integrantes de Cabildo</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Agregar Inegrante del Cabildo', ['create', 'id'=> $id], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'nombre_cabildo',
                    'domicilio_cabildo',
                    'contacto_cabildo',
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
