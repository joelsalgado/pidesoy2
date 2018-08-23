<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Programacion2 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Programacion2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programacion2-view">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Mostrar Objetivo</h3>
        </div>
        <div class="box-body">
            <p>
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Estas seguro de borrar este registro?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    //'programacion_id',
                    'actividad',
                    //'ubicacion',
                    //'hora',
                    'fecha_inicio',
                    'fecha_termino',
                    //'objetivos',
                    //'asistentes',
                    //'responsable_actividad',
                    //'responsable_vivienda',
                    //'acuerdos',
                    //'status',
                    //'created_by',
                    //'updated_by',
                    //'created_at',
                    //'updated_at',
                ],
            ]) ?>
        </div>
    </div>

</div>
