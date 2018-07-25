<?php

use yii\helpers\Html;


$this->title = 'Censo';
?>
<div class="censo-create">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Censo</h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
