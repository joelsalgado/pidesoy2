<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InformesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="informes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'entidad_id') ?>

    <?= $form->field($model, 'region_id') ?>

    <?= $form->field($model, 'mun_id') ?>

    <?= $form->field($model, 'loc_id') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'actividad_id') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'personas_beneficiadas') ?>

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
