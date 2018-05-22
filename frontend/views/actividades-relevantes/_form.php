<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

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


        <?= $form->field($model, 'fecha')->widget(DatePicker::className(), [
            'name' => 'dp_2',
            'language' => 'es',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-mm-yyyy',
                'startDate' => '01-01-1910',
                'endDate' => 'today',
            ]
        ]) ?>

        <?= $form->field($model, 'descripcion')->textarea(['class' => 'form-control']) ?>

        <?= $form->field($model, 'inversion')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'dependencia')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'responsable')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
