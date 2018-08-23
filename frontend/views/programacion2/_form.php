<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programacion2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programacion2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'programacion_id')->textInput() ?>

    <?= $form->field($model, 'actividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_termino')->textInput() ?>

    <?= $form->field($model, 'objetivos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asistentes')->textInput() ?>

    <?= $form->field($model, 'responsable_actividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsable_vivienda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acuerdos')->textInput(['maxlength' => true]) ?>

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
