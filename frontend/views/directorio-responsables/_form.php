<?php

use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\DirectorioResponsables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="directorio-responsables-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::className(), [
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

    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resp_institucional')->textInput() ?>

    <?= $form->field($model, 'resp_comunitario')->textInput() ?>

    <?= $form->field($model, 'otro')->textInput() ?>

    <?= $form->field($model, 'especifique')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'funcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')->radioList(['H' => 'Hombre', 'M' => 'Mujer']) ?>

    <?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(), [
        'name' => 'dp_2',
        'language' => 'es',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-mm-yyyy',
            'startDate' => '01-01-1910',
            'endDate' => '01-01-2003',
            //'value' => '22-10-1999'
        ]
    ]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_ext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_int')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_posta')->textInput() ?>

    <?= $form->field($model, 'tel_local')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_cel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mun_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\Municpios::find()->orderBy(['desc_mun' => 'DESC'])->all(),
            'id', 'desc_mun'),
        'options' => ['placeholder' => 'Selecciona un Municipio', 'id' => 'mun_id'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= !$model->isNewRecord ?  $form->field($model, 'loc_id')->widget(DepDrop::classname(), [
        'options' => ['id'=>'loc_id'],
        'data'=>[$model->loc_id=>$model->loc->desc_loc],
        'type'=>DepDrop::TYPE_SELECT2,
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['mun_id'],
            'placeholder' => 'Selecciona una Localidad',
            'url' => Url::to(['solicitantes/localidades']),
        ]
    ]) :
        $form->field($model, 'loc_id')->widget(DepDrop::classname(), [
            'options' => ['id'=>'loc_id'],
            'type'=>DepDrop::TYPE_SELECT2,
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'depends'=>['mun_id'],
                'placeholder' => 'Selecciona una Localidad',
                'url' => Url::to(['solicitantes/localidades2']),
            ]
        ])
    ?>

    <?= $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'redes_sociales')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
