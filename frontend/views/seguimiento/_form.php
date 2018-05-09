<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

    <div class="container-fluid">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>PISO</strong>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'meta_piso')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'acciones_piso')->textInput(["onKeyUp"=> "fncSumar()"]) ?>
                    </div>
                </div>

            </div>

            <div class="piso">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_piso')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_piso')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd',
                                    'startDate' => '2018-01-01',
                                    'endDate' => '2019-01-01',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_piso')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd',
                                    'startDate' => '2018-01-01',
                                    'endDate' => '2019-01-01',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">

                            <?= $form->field($model, 'programa_piso')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>TECHO</strong>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'meta_techo')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'acciones_techo')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">

                        <?= $form->field($model, 'inversion_techo')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_inicio_techo')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_entrega_techo')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'programa_techo')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>MURO</strong>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'meta_muro')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'acciones_muro')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'inversion_muro')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_inicio_muro')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_entrega_muro')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'programa_muro')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>CUARTO ADICIONAL</strong>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'meta_cuarto')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'acciones_cuarto')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'inversion_cuarto')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_inicio_cuarto')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_entrega_cuarto')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'programa_cuarto')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>


        <?= $form->field($model, 'meta_calidad_espacios_vivienda')->textInput() ?>

        <?= $form->field($model, 'acciones_calidad_espacios_vivienda')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientez_calidad_espacios_vivienda')->textInput() ?>

        <?= $form->field($model, 'meta_agua_potable')->textInput() ?>

        <?= $form->field($model, 'acciones_agua_potable')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_agua_potable')->textInput() ?>

        <?= $form->field($model, 'inversion_agua_potable')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_agua_potable')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_agua_potable')->textInput() ?>

        <?= $form->field($model, 'programa_agua_potable')->textInput() ?>

        <?= $form->field($model, 'responsable_agua_potable')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_agua_interior')->textInput() ?>

        <?= $form->field($model, 'acciones_agua_interior')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_agua_interior')->textInput() ?>

        <?= $form->field($model, 'inversion_agua_interior')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_agua_interior')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_agua_interior')->textInput() ?>

        <?= $form->field($model, 'programa_agua_interior')->textInput() ?>

        <?= $form->field($model, 'responsable_agua_interior')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_drenaje')->textInput() ?>

        <?= $form->field($model, 'acciones_drenaje')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_drenaje')->textInput() ?>

        <?= $form->field($model, 'inversion_drenaje')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_drenaje')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_drenaje')->textInput() ?>

        <?= $form->field($model, 'programa_drenaje')->textInput() ?>

        <?= $form->field($model, 'responsable_drenaje')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_luz')->textInput() ?>

        <?= $form->field($model, 'acciones_luz')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_luz')->textInput() ?>

        <?= $form->field($model, 'inversion_luz')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_luz')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_luz')->textInput() ?>

        <?= $form->field($model, 'programa_luz')->textInput() ?>

        <?= $form->field($model, 'responsable_luz')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_estufa')->textInput() ?>

        <?= $form->field($model, 'acciones_estufa')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_estufa')->textInput() ?>

        <?= $form->field($model, 'inversion_estufa')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_estufa')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_estufa')->textInput() ?>

        <?= $form->field($model, 'programa_estufa')->textInput() ?>

        <?= $form->field($model, 'responsable_estufa')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_servicios_basicos')->textInput() ?>

        <?= $form->field($model, 'acciones_servicios_basicos')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientez_servicios_basicos')->textInput() ?>

        <?= $form->field($model, 'meta_seguro_popular')->textInput() ?>

        <?= $form->field($model, 'acciones_seguro_popular')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_seguro_popular')->textInput() ?>

        <?= $form->field($model, 'inversion_seguro_popular')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_seguro_popular')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_seguro_popular')->textInput() ?>

        <?= $form->field($model, 'programa_seguro_popular')->textInput() ?>

        <?= $form->field($model, 'responsable_seguro_popular')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_3_15_escuela')->textInput() ?>

        <?= $form->field($model, 'acciones_3_15_escuela')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_3_15_escuela')->textInput() ?>

        <?= $form->field($model, 'inversion_3_15_escuela')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_3_15_escuela')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_3_15_escuela')->textInput() ?>

        <?= $form->field($model, 'programa_3_15_escuela')->textInput() ?>

        <?= $form->field($model, 'responsable_3_15_escuela')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_antes_1982_primaria')->textInput() ?>

        <?= $form->field($model, 'acciones_antes_1982_primaria')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_antes_1982_primaria')->textInput() ?>

        <?= $form->field($model, 'inversion_antes_1982_primaria')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_antes_1982_primaria')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_antes_1982_primaria')->textInput() ?>

        <?= $form->field($model, 'programa_antes_1982_primaria')->textInput() ?>

        <?= $form->field($model, 'responsable_antes_1982_primaria')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_despues_1982_secundaria')->textInput() ?>

        <?= $form->field($model, 'acciones_despues_1982_secundaria')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_despues_1982_secundaria')->textInput() ?>

        <?= $form->field($model, 'inversion_despues_1982_secundaria')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_despues_1982_secundaria')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_despues_1982_secundaria')->textInput() ?>

        <?= $form->field($model, 'programa_despues_1982_secundaria')->textInput() ?>

        <?= $form->field($model, 'responsable_despues_1982_secundaria')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_educacion')->textInput() ?>

        <?= $form->field($model, 'acciones_educacion')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientez_educacion')->textInput() ?>

        <?= $form->field($model, 'meta_despensas')->textInput() ?>

        <?= $form->field($model, 'acciones_despensas')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_despensas')->textInput() ?>

        <?= $form->field($model, 'inversion_despensas')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_despensas')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_despensas')->textInput() ?>

        <?= $form->field($model, 'programa_despensas')->textInput() ?>

        <?= $form->field($model, 'responsable_despensas')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_ss')->textInput() ?>

        <?= $form->field($model, 'acciones_ss')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_ss')->textInput() ?>

        <?= $form->field($model, 'inversion_ss')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_ss')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_ss')->textInput() ?>

        <?= $form->field($model, 'programa_ss')->textInput() ?>

        <?= $form->field($model, 'responsable_ss')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_trabajadores_ss')->textInput() ?>

        <?= $form->field($model, 'acciones_trabajadores_ss')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_trabajadores_ss')->textInput() ?>

        <?= $form->field($model, 'inversion_trabajadores_ss')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_trabajadores_ss')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_trabajadores_ss')->textInput() ?>

        <?= $form->field($model, 'programa_trabajadores_ss')->textInput() ?>

        <?= $form->field($model, 'responsable_trabajadores_ss')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_adultos_ss')->textInput() ?>

        <?= $form->field($model, 'acciones_adultos_ss')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientes_adultos_ss')->textInput() ?>

        <?= $form->field($model, 'inversion_adultos_ss')->textInput() ?>

        <?= $form->field($model, 'fecha_inicio_adultos_ss')->textInput() ?>

        <?= $form->field($model, 'fecha_entrega_adultos_ss')->textInput() ?>

        <?= $form->field($model, 'programa_adultos_ss')->textInput() ?>

        <?= $form->field($model, 'responsable_adultos_ss')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_s_s')->textInput() ?>

        <?= $form->field($model, 'acciones_s_s')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientez_s_s')->textInput() ?>

        <?= $form->field($model, 'meta_vivienda')->textInput() ?>

        <?= $form->field($model, 'acciones_vivienda')->textInput() ?>

        <?= $form->field($model, 'acciones_pendientez_vivienda')->textInput() ?>

        <?= $form->field($model, 'inversion_vivienda')->textInput() ?>



        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?=$this->registerJsFile(
    '@web/frontend/assets/js/seguimiento.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);?>