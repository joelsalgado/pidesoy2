<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BitacoraReunion2 */

$this->title = 'Mostrar';
?>
<div class="bitacora-reunion2-view">

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
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    //'bitacora_reunion_id',
                    'fechas',
                    'objetivo',
                    'autoridades_federales',
                    'autoridades_estatales',
                    'autoridades_municipales',
                    'acuerdos',
                    'observaciones',
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