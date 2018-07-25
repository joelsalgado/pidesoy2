<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Censo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Censos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="censo-view">

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
            'solicitante_id',
            'periodo',
            'fecha',
            'agua_potable',
            'drenaje',
            'basura',
            'policias',
            'parques',
            'salones',
            'iglesia',
            'doctor',
            'salud',
            'medicamentos',
            'lamparas',
            'diconsa',
            'liconsa',
            'comunitario',
            'ambulacia',
            'otro1',
            'cual1',
            'documentos',
            'vacunacion',
            'ortopedicos',
            'seguro_popular',
            'becas',
            'papeles',
            'terminar_esc',
            'credito',
            'luz',
            'desayuno',
            'otro2',
            'cual2',
            'grupo_comunitario',
            'cual3',
            'autoridades_estatales',
            'acciones',
            'observaciones',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
