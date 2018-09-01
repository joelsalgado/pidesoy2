<?php

$this->title = 'Actualizar Lider';
?>
<div class="lideres-update">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Lider</h3>
        </div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
