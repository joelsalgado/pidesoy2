<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

    <div class="container-fluid">

        <?php $form = ActiveForm::begin(); ?>
        <?php if($model->meta_piso == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>COLOCACIÓN DE PISO FIRME</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_piso')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_piso')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_piso')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_piso')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_piso')->textInput(["onKeyUp"=> "fncPiso()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="piso">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_piso')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_techo == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>COLOCACIÓN DE TECHO FIRME</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_techo')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_techo')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_techo')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_techo')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_techo')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa2'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_techo')->textInput(["onKeyUp"=> "fncTecho()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="techo">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_techo')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_muro == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>COLOCACIÓN DE MURO FIRME</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_muro')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_muro')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_muro')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_cuarto')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_muro')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa3'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_muro')->textInput(["onKeyUp"=> "fncMuro()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="muro">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_muro')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_cuarto == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>CONSTRUCCIÓN DE CUARTO ADICIONAL</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_cuarto')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_cuarto')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_cuarto')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_cuarto')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_cuarto')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa4'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_cuarto')->textInput(["onKeyUp"=> "fncCuarto()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="cuarto">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_cuarto')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_agua_potable == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>VIVIENDAS CON ACCESO AL SERVICIO DE AGUA POTABLE (RED PÚBLICA)</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_agua_potable')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_agua_potable')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_agua_potable')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_agua_potable')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_agua_potable')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa5'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_agua_potable')->textInput(["onKeyUp"=> "fncAguaPotable()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="agua_potable">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_agua_potable')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_agua_interior == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>VIVIENDAS CON CONEXIÓN DE TOMA DE AGUA AL INTERIOR DE LA VIVIENDA</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_agua_interior')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_agua_interior')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_agua_interior')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_agua_interior')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_agua_interior')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa6'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_agua_interior')->textInput(["onKeyUp"=> "fncAguaInterior()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="agua_interior">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_agua_interior')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_drenaje == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>VIVIENDAS CON CONEXIÓN AL DRENAJE PÚBLICO O BIOGIGESTORES</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_drenaje')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_drenaje')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_drenaje')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_drenaje')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_drenaje')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa7'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_drenaje')->textInput(["onKeyUp"=> "fncDrenaje()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="drenaje">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_drenaje')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_luz == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>VIVIENDAS CON CONEXIÓN DE ENERGÍA ELÉCTRICA</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_luz')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_luz')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_luz')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_luz')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_luz')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa8'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_luz')->textInput(["onKeyUp"=> "fncLuz()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="luz">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_luz')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_estufa == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>VIVIENDAS CON ESTUFAS ENTREGADAS</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_estufa')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_estufa')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_estufa')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_estufa')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_estufa')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa9'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_estufa')->textInput(["onKeyUp"=> "fncEstufa()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="estufa">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_estufa')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_seguro_popular == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>AFILIADOS AL SEGURO POPULAR</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_seguro_popular')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_seguro_popular')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_seguro_popular')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_seguro_popular')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_seguro_popular')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa10'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_seguro_popular')->textInput(["onKeyUp"=> "fncSeguro()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="seguro_popular">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_seguro_popular')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_3_15_escuela == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>PERSONAS DE 3 A 15 AÑOS QUE ASISTEN A LA ESCUELA</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_3_15_escuela')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_3_15_escuela')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_3_15_escuela')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_3_15_escuela')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_3_15_escuela')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa11'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_3_15_escuela')->textInput(["onKeyUp"=> "fncEsc3a15()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="esc_3_15">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_3_15_escuela')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_antes_1982_primaria == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>NACIDOS ANTES DE 1982 CON CERTIFICADO DE PRIMARIA</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_antes_1982_primaria')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_antes_1982_primaria')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_antes_1982_primaria')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_antes_1982_primaria')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_antes_1982_primaria')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa12'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_antes_1982_primaria')->textInput(["onKeyUp"=> "fncPrim1982()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="antes_1982_primaria">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_antes_1982_primaria')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_despues_1982_secundaria == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>NACIDOS DESPUÉS DE 1982 CON CERTIFICADO DE SECUNDARIA</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_despues_1982_secundaria')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_despues_1982_secundaria')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_despues_1982_secundaria')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_despues_1982_secundaria')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_despues_1982_secundaria')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa13'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_despues_1982_secundaria')->textInput(["onKeyUp"=> "fncSec1982()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="despues_1982_secundaria">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_despues_1982_secundaria')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_despensas == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>DESPENSAS POR ENTREGAR</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_despensas')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_despensas')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_despensas')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_despensas')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_despensas')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa14'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_despensas')->textInput(["onKeyUp"=> "fncDespensas()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="despensas">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_despensas')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_ss == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>TRABAJADOR AFILIADO A LA SEGURIDAD SOCIAL</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_ss')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_ss')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_ss')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_ss')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_ss')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa15'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_ss')->textInput(["onKeyUp"=> "fncSs()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="ss">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_ss')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_trabajadores_ss == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>BENEFICIARIOS DE TRABAJADORES CON ACCESO A LA SEGURIDAD SOCIAL</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_trabajadores_ss')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_trabajadores_ss')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_trabajadores_ss')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_trabajadores_ss')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_trabajadores_ss')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa16'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_trabajadores_ss')->textInput(["onKeyUp"=> "fncTrabajadorSs()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="trabajadores_ss">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_trabajadores_ss')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($model->meta_adultos_ss == 1) : ?>
            <div class="row">
                <div class="alert alert-success-alt">
                    <strong>PERSONAS MAYORES DE 65 AÑOS INSCRITOS AL PROGRAMA DE PENSIONES</strong>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'meta_adultos_ss')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_inicio_adultos_ss')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_entrega_adultos_ss')->widget(DatePicker::className(), [
                                'name' => 'dp_2',
                                'language' => 'es',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => '01-01-2018',
                                    'endDate' => '01-01-2019',
                                    //'value' => '22-10-1999'
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'inversion_adultos_ss')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'programa_adultos_ss')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Programas::getProgramasOk(),
                                    'id', 'desc_programa'),
                                'options' => ['placeholder' => 'Selecciona un Programa', 'id' => 'desc_programa17'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'acciones_adultos_ss')->textInput(["onKeyUp"=> "fncAdultosSs()"]) ?>
                        </div>
                    </div>
                </div>
                <div class="adultos_ss">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'fecha_termino_adultos_ss')->widget(DatePicker::className(), [
                                    'name' => 'dp_2',
                                    'language' => 'es',
                                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-mm-yyyy',
                                        'startDate' => '01-01-2018',
                                        'endDate' => '01-01-2019',
                                        //'value' => '22-10-1999'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?=$this->registerJsFile(
    '@web/frontend/assets/js/seguimiento.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);?>