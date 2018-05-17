<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones Adicionales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acciones-adicionales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Acciones Adicionales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'solicitante_id',
            'periodo',
            'nombre_accion',
            'meta',
            //'acciones',
            //'acciones_pendientes',
            //'inversion',
            //'fecha_inicio',
            //'fecha_entrega',
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
