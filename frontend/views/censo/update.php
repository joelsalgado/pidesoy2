<?php

use yii\helpers\Html;
use frontend\widgets\Apartados\Apartados;

/* @var $this yii\web\View */
/* @var $model common\models\Censo */

$this->title = 'Censo';
?>
<div class="censo-update">

    <div class="box">
        <?=
        Apartados::widget([
            'tipo'=>7,
            'apartado' => $apartado,
            'id' => $model->solicitante_id,
        ])
        ?>
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
