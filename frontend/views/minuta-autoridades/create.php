<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MinutaAutoridades */

$this->title = 'Nueva Minuta Autoridades';
?>
<div class="minuta-autoridades-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nueva Minuta</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>

</div>
