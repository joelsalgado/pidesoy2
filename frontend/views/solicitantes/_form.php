<?php

use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Solicitantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'entidad_id')->textInput(['readonly' => true, 'value' => 15]) ?>


    <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\Regiones::getRegionesOk(),
            'id', 'desc_region'),
        'options' => ['placeholder' => 'Selecciona una Region', 'id' => 'reg_id'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <?= $form->field($model, 'mun_id')->widget(DepDrop::classname(), [
        'options' => ['id'=>'mun_id'],
        'type'=>DepDrop::TYPE_SELECT2,
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['reg_id'],
            'placeholder' => 'Selecciona un Municipio',
            'url' => Url::to(['solicitantes/municipios']),
        ]
    ])?>

    <?= $form->field($model, 'loc_id')->widget(DepDrop::classname(), [
        'options' => ['id'=>'loc_id'],
        'type'=>DepDrop::TYPE_SELECT2,
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['mun_id'],
            'placeholder' => 'Selecciona una Localidad',
            'url' => Url::to(['solicitantes/localidades']),
        ]
    ])?>


    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edo_civil_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\EstadoCivil::getEstados(),
            'id', 'desc_edo_civil'),
        'options' => ['placeholder' => 'Selecciona un Estado Civil', 'id' => 'desc_edo_civil'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->widget(\yii\widgets\MaskedInput::className(), [
        'name' => 'input-31',
        'clientOptions' => ['alias' =>  'date']
    ]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'sexo')->radioList(['H' => 'Hombre', 'M' => 'Mujer']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_ext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_int')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_postal')->textInput() ?>

    <?= $form->field($model, 'otra_referencia')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
