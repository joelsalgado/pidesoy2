<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DirectoresMunicipales */

$this->title = 'Crear Directores Municipales';
?>
<div class="directores-municipales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
