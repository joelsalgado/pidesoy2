<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DirectoresMunicipales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="directores-municipales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_director')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domicilio_director')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto_director')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
