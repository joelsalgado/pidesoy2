<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DirectorioResponsables */

$this->title = 'Create Directorio Responsables';
$this->params['breadcrumbs'][] = ['label' => 'Directorio Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directorio-responsables-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
