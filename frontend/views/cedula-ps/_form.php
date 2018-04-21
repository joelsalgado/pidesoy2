<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CedulaPs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedula-ps-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cual_programa')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
            'id', 'desc_programa'),
        'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nombre_recibe_programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parentesco_recibe_programa')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\Parentesco::getParentescoOk(),
            'id', 'desc_parentesco'),
        'options' => ['placeholder' => 'Selecciona un Parentesco', 'id' => 'desc_parentesco'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
