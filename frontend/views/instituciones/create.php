<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Instituciones */

$this->title = 'Nueva Institución';
?>
<div class="instituciones-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Institución</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
