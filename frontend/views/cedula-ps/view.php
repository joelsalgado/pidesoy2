<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CedulaPs */

$this->title = $model->id;
?>
<div class="cedula-ps-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de borrar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'cedula_id',
            'cual_programa',
            'nombre_recibe_programa',
            'titular',
            'parentesco_recibe_programa',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
