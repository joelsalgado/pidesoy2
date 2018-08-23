<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Programacion2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'actividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::className(), [
        'name' => 'dp_2',
        'language' => 'es',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy',
            'startDate' => '01-01-2017',
            'endDate' => '01-01-2020',
            //'value' => '22-10-1999'
        ]
    ]) ?>

    <?= $form->field($model, 'fecha_termino')->widget(DatePicker::className(), [
        'name' => 'dp_2',
        'language' => 'es',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy',
            'startDate' => '01-01-2017',
            'endDate' => '01-01-2020',
            //'value' => '22-10-1999'
        ]
    ]) ?>

    <?= $form->field($model, 'objetivos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asistentes')->textInput() ?>

    <?= $form->field($model, 'responsable_actividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsable_vivienda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acuerdos')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
