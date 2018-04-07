<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FormatoLocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formato Locs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formato-loc-index">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Participantes</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Nuevo Formato', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        //'region_id',
                        'mun_id',
                        'loc_id',
                        //'num_habitantes',
                        //'ocupantes_por_vivienda',
                        //'indice_marginacion',
                        //'indentificacion_hogares',
                        //'calidad_vivienda',
                        //'serv_basicos',
                        //'acceso_edu',
                        //'salud',
                        //'seguridad_social',
                        //'ingresos',
                        //'alimentacion',
                        //'vinculacion',
                        //'acceso_terrestre',
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
