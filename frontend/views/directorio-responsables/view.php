<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorioResponsables */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Directorio Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directorio-responsables-view">

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
            'fecha',
            'imagen',
            'resp_institucional',
            'resp_comunitario',
            'otro',
            'especifique',
            'funcion',
            'apellido_paterno',
            'apellido_materno',
            'nombre',
            'sexo',
            'fecha_nacimiento',
            'calle',
            'num_ext',
            'num_int',
            'colonia',
            'codigo_posta',
            'tel_local',
            'tel_cel',
            'mun_id',
            'loc_id',
            'referencia',
            'correo',
            'redes_sociales',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
