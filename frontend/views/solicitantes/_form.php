<?php

use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

?>

<div class="container-fluid">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="alert alert-success-alt">
            <strong>IDENTIFICAIÓN GEOFRÁFICA</strong>
            <i class="fa fa-globe" aria-hidden="true"></i>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'entidad_id')->textInput(['readonly' => true, 'value' => 15]) ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\common\models\Regiones::getRegionesOk(),
                            'id', 'desc_region'),
                        'options' => ['placeholder' => 'Selecciona una Region', 'id' => 'reg_id'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?=!$model->isNewRecord ? $form->field($model, 'mun_id')->widget(DepDrop::classname(), [
                        'options' => ['id'=>'mun_id'],
                        'type'=>DepDrop::TYPE_SELECT2,
                        'data'=>[$model->mun_id=>$model->mun->nombre_mun],
                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'pluginOptions'=>[
                            'depends'=>['reg_id'],
                            'placeholder' => 'Selecciona un Municipio',
                            'url' => Url::to(['solicitantes/municipios']),
                        ]
                    ]) :
                        $form->field($model, 'mun_id')->widget(DepDrop::classname(), [
                            'options' => ['id'=>'mun_id'],
                            'type'=>DepDrop::TYPE_SELECT2,
                            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                            'pluginOptions'=>[
                                'depends'=>['reg_id'],
                                'placeholder' => 'Selecciona un Municipio',
                                'url' => Url::to(['solicitantes/municipios']),
                            ]
                        ])

                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">

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
                                'url' => Url::to(['solicitantes/localidades']),
                            ]
                        ])
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="alert alert-success-alt">
            <strong>DATOS PERSONALES</strong>
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <?= $form->field($model, 'edo_civil_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\common\models\EstadoCivil::getEstados(),
                            'id', 'desc_edo_civil'),
                        'options' => ['placeholder' => 'Selecciona un Estado Civil', 'id' => 'desc_edo_civil'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
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
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?= $form->field($model, 'sexo')->radioList(['H' => 'Hombre', 'M' => 'Mujer']) ?>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="alert alert-success-alt">
            <strong>DIRECCIÓN DE LA VIVIENDA</strong>
            <i class="fa fa-home" aria-hidden="true"></i>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">

                    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'num_ext')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'num_int')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'codigo_postal')->textInput() ?>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <?= $form->field($model, 'otra_referencia')->textInput() ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-save" aria-hidden="true"></i> Guardar', ['class' => 'btn btn-success btn-block']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
