<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CedulaPobreza */

$this->title = 'Cedula Pobreza';
$this->params['breadcrumbs'][] = ['label' => 'Cedula Pobreza', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedula-pobreza-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
