<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\FormatoLoc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-sm-4">
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
            <div class="col-sm-4">
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
            <div class="col-sm-4">
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
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'num_habitantes')->textInput() ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'ocupantes_por_vivienda')->textInput() ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'indice_marginacion')->dropDownList(['MUY ALTO' => 'MUY ALTO',
                        'ALTO' => 'ALTO', 'MEDIO' => 'MEDIO' , 'BAJO' => 'BAJO', 'MUY BAJO' => 'MUY BAJO']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?= $form->field($model, 'indentificacion_hogares')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'calidad_vivienda')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'serv_basicos')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'acceso_edu')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'preescolar')->textInput(['class' => 'form-control']) ?>
        <?= $form->field($model, 'primaria')->textInput(['class' => 'form-control']) ?>
        <?= $form->field($model, 'secundaria')->textInput(['class' => 'form-control']) ?>

        <?= $form->field($model, 'salud')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'seguridad_social')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'ingresos')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'alimentacion')->textarea(['class' => 'form-control'])?>

        <?= $form->field($model, 'vinculacion')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'liconsa')->radioList([1 => 'Si', 0 => 'No']) ?>
        <?= $form->field($model, 'diconsa')->radioList([1 => 'Si', 0 => 'No']) ?>

        <?= $form->field($model, 'acceso_terrestre')->textarea(['class' => 'form-control'])?>
    </div>

    <div class="row">
        <label>REPRESENTACIÓN EN LA LOCALIDAD</label><br>
        <div class=row>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'delegacion_municipal')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'copaci')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'comisariado')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
        </div>
        <div class=row>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'vigilancia')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'agua')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'comite_prospera')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?= $form->field($model, 'necesidades')->textarea(['class' => 'form-control'])?>
    </div>
    <div class="row">
        <label> DATOS GENERALES DEL AYUNTAMIENTO</label><br>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'nombre_presidente')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'domicilio_presidente')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'contacto_presidente')->textInput(['class' => 'form-control'])?>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save" aria-hidden="true"></i> Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>