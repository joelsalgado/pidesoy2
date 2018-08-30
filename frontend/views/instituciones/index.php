<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituciones';
?>
<div class="instituciones-index">

    <div class="box">
        <ul class="nav nav-tabs">

            <li><?= Html::a('Ficha',['/ficha-tecnica/update', 'id' => $id])?></li>
            <li class="active"><a href="#">LIderes</a></li>
            <li><?= Html::a('Intituciones',['/bitacora-familia2', 'id' => $id])?></li>
            <li><?= Html::a('Necesidades',['/bitacora-familia2', 'id' => $id])?></li>
        </ul>
        <div class="box-header with-border">
            <h3 class="box-title">Lideres</h3>
        </div>
        <div class="box-body">

            <p class="pull-right">
                <?= Html::a('Nuevo Lider', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    //'ficha_id',
                    //'grado_id',
                    'nombre_escuela',
                    'total_alumnos',
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
