<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Actividades */

$this->title = $model->desc_actividad;
?>
<div class="actividades-view">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $model->desc_actividad ?>  </h3>
        </div>
        <div class="box-body">

            <p>
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Estas seguro de borrar este programa?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'desc_actividad',
                    //'status',
                ],
            ]) ?>
        </div>
    </div>

</div>
