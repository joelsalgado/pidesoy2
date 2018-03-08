<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SolicitantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitantes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solicitantes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'periodo',
            'entidad_id',
            'region_id',
            'mun_id',
            //'loc_id',
            //'nombre',
            //'apellido_paterno',
            //'apellido_materno',
            //'edo_civil_id',
            //'fecha_nacimiento',
            //'edad',
            //'sexo',
            //'telefono',
            //'calle',
            //'colonia',
            //'num_ext',
            //'num_int',
            //'codigo_postal',
            //'otra_referencia',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
