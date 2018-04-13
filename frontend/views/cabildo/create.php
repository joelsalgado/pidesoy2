<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cabildo */

$this->title = 'Crear Integrante del Cabildo';
?>
<div class="cabildo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
