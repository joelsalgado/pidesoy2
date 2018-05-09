<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Seguimiento */

$this->title = 'Seguimiento';
?>
<div class="seguimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
