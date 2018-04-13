<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cabildo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cabildo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_cabildo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domicilio_cabildo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto_cabildo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
