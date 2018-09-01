<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lideres */

$this->title = 'Nuevo Lider';
?>
<div class="lideres-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Lider</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>