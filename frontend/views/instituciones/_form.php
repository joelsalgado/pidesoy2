<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Instituciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instituciones-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'grado_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\CatGradoEstudios::find()->all(),
            'id', 'desc_grado'),
        'options' => ['placeholder' => 'Selecciona un Grado de Estudios', 'id' => 'grado'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nombre_escuela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_alumnos')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
