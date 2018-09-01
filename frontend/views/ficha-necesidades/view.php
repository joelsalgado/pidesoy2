<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FichaNecesidades */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ficha Necesidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ficha-necesidades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ficha_id',
            'piso_firme',
            'techo_firme',
            'muro_firme',
            'cuarto_adicional',
            'estufa',
            'agua_potable',
            'drenaje',
            'luz',
            'alumbrado',
            'menor_no_edu_basica',
            'estructuras_escolares',
            'escuelas_acondicionamiento',
            'adulto_no_edu_basica',
            'centros_medicos',
            'personal_medico',
            'medicamento',
            'jornada_de_salud',
            'seguro_popular',
            'trabajador_no_ss',
            'adulto_no_ss',
            'alimentan1o2',
            'menor_desayunos',
            'comedor_comunitario',
            'liconsa',
            'diconsa',
            'basura',
            'tramite',
            'ambulancia',
            'creditos',
            'policia',
            'parques',
            'iglesias',
            'documentos_personales',
            'aparatos_ortopedicos',
            'aparatos_auditivos',
            'lentes',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
