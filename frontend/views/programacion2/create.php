<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Programacion2 */

$this->title = 'Create Programacion2';
$this->params['breadcrumbs'][] = ['label' => 'Programacion2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programacion2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
