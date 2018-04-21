<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CedulaPs */

$this->title = 'Cedula de Pobreza';
?>
<div class="cedula-ps-create">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Beneficiarios de Programas Sociales</h3>
        </div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
