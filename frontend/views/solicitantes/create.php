<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Solicitantes */

$this->title = 'Crear Participante';
$this->params['breadcrumbs'][] = ['label' => 'Participante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitantes-create">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Crear Participante</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
