<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
