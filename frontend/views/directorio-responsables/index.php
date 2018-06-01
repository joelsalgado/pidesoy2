<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Directorio Responsables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directorio-responsables-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Directorio Responsables', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha',
            'imagen',
            'resp_institucional',
            'resp_comunitario',
            //'otro',
            //'especifique',
            //'funcion',
            //'apellido_paterno',
            //'apellido_materno',
            //'nombre',
            //'sexo',
            //'fecha_nacimiento',
            //'calle',
            //'num_ext',
            //'num_int',
            //'colonia',
            //'codigo_posta',
            //'tel_local',
            //'tel_cel',
            //'mun_id',
            //'loc_id',
            //'referencia',
            //'correo',
            //'redes_sociales',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
