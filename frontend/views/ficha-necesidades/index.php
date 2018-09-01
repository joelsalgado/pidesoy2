<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ficha Necesidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ficha-necesidades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ficha Necesidades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ficha_id',
            'piso_firme',
            'techo_firme',
            'muro_firme',
            //'cuarto_adicional',
            //'estufa',
            //'agua_potable',
            //'drenaje',
            //'luz',
            //'alumbrado',
            //'menor_no_edu_basica',
            //'estructuras_escolares',
            //'escuelas_acondicionamiento',
            //'adulto_no_edu_basica',
            //'centros_medicos',
            //'personal_medico',
            //'medicamento',
            //'jornada_de_salud',
            //'seguro_popular',
            //'trabajador_no_ss',
            //'adulto_no_ss',
            //'alimentan1o2',
            //'menor_desayunos',
            //'comedor_comunitario',
            //'liconsa',
            //'diconsa',
            //'basura',
            //'tramite',
            //'ambulancia',
            //'creditos',
            //'policia',
            //'parques',
            //'iglesias',
            //'documentos_personales',
            //'aparatos_ortopedicos',
            //'aparatos_auditivos',
            //'lentes',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
