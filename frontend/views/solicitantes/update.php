<?php

use yii\helpers\Html;
use frontend\widgets\Apartados\Apartados;

/* @var $this yii\web\View */
/* @var $model common\models\Solicitantes */

$this->title = 'Actualizar Participante';
$this->params['breadcrumbs'][] = ['label' => 'Solicitantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitantes-update">

    <div class="box">
        <?=
        Apartados::widget([
            'tipo'=>1,
            'apartado' => $apartado,
            'id' => $model->id,
        ])
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Participante</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
