<?php

use yii\helpers\Html;

$this->title = 'Actualizar Actividad';

?>
<div class="actividades-relevantes-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">ACTUALIZAR ACTIVIDAD</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
