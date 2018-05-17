<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AccionesAdicionales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acciones-adicionales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'solicitante_id')->textInput() ?>

    <?= $form->field($model, 'periodo')->textInput() ?>

    <?= $form->field($model, 'nombre_accion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta')->textInput() ?>

    <?= $form->field($model, 'acciones')->textInput() ?>

    <?= $form->field($model, 'acciones_pendientes')->textInput() ?>

    <?= $form->field($model, 'inversion')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_entrega')->textInput() ?>

    <?= $form->field($model, 'programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
