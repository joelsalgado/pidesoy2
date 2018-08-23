<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programacion2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programacion2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Programacion2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'programacion_id',
            'actividad',
            'ubicacion',
            'hora',
            //'fecha_inicio',
            //'fecha_termino',
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
