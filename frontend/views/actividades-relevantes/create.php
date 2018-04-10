<?php

use yii\helpers\Html;

$this->title = 'Crear Actividad Relevante';
?>
<div class="actividades-relevantes-create">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">NUEVA ACTIVIDAD</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
