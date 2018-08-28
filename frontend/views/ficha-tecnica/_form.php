<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ficha-tecnica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'entidad_id')->textInput() ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'mun_id')->textInput() ?>

    <?= $form->field($model, 'loc_id')->textInput() ?>

    <?= $form->field($model, 'indicaciones')->textarea() ?>

    <?= $form->field($model, 'tipo_acceso')->radioList([
            'Pavimentado' => 'Pavimentado',
            'Terracería' => 'Terracería',
            'Sin Acceso' => 'Sin Acceso'
    ]) ?>

    <?= $form->field($model, 'estado')->radioList([
        'Bueno' => 'Bueno',
        'Regular' => 'Regular',
        'Malo' => 'Malo'
    ]) ?>

    <?= $form->field($model, 'acceso_facil')->radioList([1 => 'Si', 0 => 'No']) ?>

    <?= $form->field($model, 'tiempo')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'cedulas_aplicadas')->textInput() ?>

    <?= $form->field($model, 'habitantes')->textInput() ?>

    <?= $form->field($model, 'ocupantes')->textInput() ?>

    <?= $form->field($model, 'indice_marginacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indice_desarrollo_humano')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campesinos')->textInput() ?>

    <?= $form->field($model, 'obreros')->textInput() ?>

    <?= $form->field($model, 'albañiles')->textInput() ?>

    <?= $form->field($model, 'amas')->textInput() ?>

    <?= $form->field($model, 'empleados')->textInput() ?>

    <?= $form->field($model, 'otros')->textInput() ?>

    <?= $form->field($model, 'cual1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'de1a3')->textInput() ?>

    <?= $form->field($model, 'de3a5')->textInput() ?>

    <?= $form->field($model, 'de5mas')->textInput() ?>

    <?= $form->field($model, 'catolica')->textInput() ?>

    <?= $form->field($model, 'testigos')->textInput() ?>

    <?= $form->field($model, 'evangelistas')->textInput() ?>

    <?= $form->field($model, 'cristiana')->textInput() ?>

    <?= $form->field($model, 'otra')->textInput() ?>

    <?= $form->field($model, 'cual2')->textInput(['maxlength' => true]) ?>

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
