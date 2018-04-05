<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CedulaPobreza */

$this->title = 'Cedula Pobreza';
$this->params['breadcrumbs'][] = ['label' => 'Cedula Pobreza', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedula-pobreza-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Crear Cedula de Pobreza</h3>
        </div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
