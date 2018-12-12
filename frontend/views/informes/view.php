<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Informes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Informes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informes-view">

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
            'cantidad',
            'actividad_id',
            'descripcion',
            'personas_beneficiadas',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
