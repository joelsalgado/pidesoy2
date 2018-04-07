<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FormatoLoc */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Formato Locs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formato-loc-view">

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
            'region_id',
            'mun_id',
            'loc_id',
            'num_habitantes',
            'ocupantes_por_vivienda',
            'indice_marginacion',
            'indentificacion_hogares',
            'calidad_vivienda',
            'serv_basicos',
            'acceso_edu',
            'salud',
            'seguridad_social',
            'ingresos',
            'alimentacion',
            'vinculacion',
            'acceso_terrestre',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
