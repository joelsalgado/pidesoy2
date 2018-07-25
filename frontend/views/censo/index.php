<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Censos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="censo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Censo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'solicitante_id',
            'periodo',
            'fecha',
            'agua_potable',
            //'drenaje',
            //'basura',
            //'policias',
            //'parques',
            //'salones',
            //'iglesia',
            //'doctor',
            //'salud',
            //'medicamentos',
            //'lamparas',
            //'diconsa',
            //'liconsa',
            //'comunitario',
            //'ambulacia',
            //'otro1',
            //'cual1',
            //'documentos',
            //'vacunacion',
            //'ortopedicos',
            //'seguro_popular',
            //'becas',
            //'papeles',
            //'terminar_esc',
            //'credito',
            //'luz',
            //'desayuno',
            //'otro2',
            //'cual2',
            //'grupo_comunitario',
            //'cual3',
            //'autoridades_estatales',
            //'acciones',
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
