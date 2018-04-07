<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FormatoLocSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formato-loc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'region_id') ?>

    <?= $form->field($model, 'mun_id') ?>

    <?= $form->field($model, 'loc_id') ?>

    <?= $form->field($model, 'num_habitantes') ?>

    <?php // echo $form->field($model, 'ocupantes_por_vivienda') ?>

    <?php // echo $form->field($model, 'indice_marginacion') ?>

    <?php // echo $form->field($model, 'indentificacion_hogares') ?>

    <?php // echo $form->field($model, 'calidad_vivienda') ?>

    <?php // echo $form->field($model, 'serv_basicos') ?>

    <?php // echo $form->field($model, 'acceso_edu') ?>

    <?php // echo $form->field($model, 'salud') ?>

    <?php // echo $form->field($model, 'seguridad_social') ?>

    <?php // echo $form->field($model, 'ingresos') ?>

    <?php // echo $form->field($model, 'alimentacion') ?>

    <?php // echo $form->field($model, 'vinculacion') ?>

    <?php // echo $form->field($model, 'acceso terrestre') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
