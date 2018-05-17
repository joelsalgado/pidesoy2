<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AccionesAdicionales */

$this->title = 'Create Acciones Adicionales';
$this->params['breadcrumbs'][] = ['label' => 'Acciones Adicionales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acciones-adicionales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
