<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FichaTecnicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ficha Tecnicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ficha-tecnica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ficha Tecnica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'entidad_id',
            'region_id',
            'mun_id',
            'loc_id',
            //'fecha',
            //'indicaciones',
            //'tipo_acceso',
            //'estado',
            //'acceso_facil',
            //'tiempo',
            //'cedulas_aplicadas',
            //'habitantes',
            //'ocupantes',
            //'indice_marginacion',
            //'indice_desarrollo_humano',
            //'campesinos',
            //'obreros',
            //'albañiles',
            //'amas',
            //'empleados',
            //'otros',
            //'cual1',
            //'de1a3',
            //'de3a5',
            //'de5mas',
            //'catolica',
            //'testigos',
            //'evangelistas',
            //'cristiana',
            //'otra',
            //'cual2',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
