<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Solicitantes */

$this->title = 'Create Solicitantes';
$this->params['breadcrumbs'][] = ['label' => 'Solicitantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
