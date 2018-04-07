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
                    <?= $form->field($model, 'indice_marginacion')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'indentificacion_hogares')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calidad_vivienda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serv_basicos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acceso_edu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seguridad_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingresos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alimentacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vinculacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acceso_terrestre')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>