<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AccionesAdicionales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acciones-adicionales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_accion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta')->textInput() ?>

    <?= $form->field($model, 'acciones')->textInput() ?>

    <?= $form->field($model, 'inversion')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_entrega')->textInput() ?>

    <?= $form->field($model, 'fecha_termino')->textInput() ?>

    <?= $form->field($model, 'programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsable')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
