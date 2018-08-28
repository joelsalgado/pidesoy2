<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ficha Tecnicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ficha-tecnica-view">

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
            'entidad_id',
            'region_id',
            'mun_id',
            'loc_id',
            'fecha',
            'indicaciones',
            'tipo_acceso',
            'estado',
            'acceso_facil',
            'tiempo',
            'cedulas_aplicadas',
            'habitantes',
            'ocupantes',
            'indice_marginacion',
            'indice_desarrollo_humano',
            'campesinos',
            'obreros',
            'albañiles',
            'amas',
            'empleados',
            'otros',
            'cual1',
            'de1a3',
            'de3a5',
            'de5mas',
            'catolica',
            'testigos',
            'evangelistas',
            'cristiana',
            'otra',
            'cual2',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
