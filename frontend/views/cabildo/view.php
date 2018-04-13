<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cabildo */

$this->title = $model->id;
?>
<div class="cabildo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Acrualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de borrar este integrante?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre_cabildo',
            'domicilio_cabildo',
            'contacto_cabildo',
        ],
    ]) ?>

</div>
