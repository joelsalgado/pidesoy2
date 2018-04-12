<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CedulaPobreza */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="container-fluid">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="alert alert-success-alt">
                <strong>II. IDENTIFICACIÓN DE HOGARES Y RESIDENTES</strong>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">II.1 Número de personas en la vivienda</label>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'num_personas')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'per_0_15')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'per_16_17')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'per_18_64')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'per_65_mas')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">II.2 Tiempo de habitación</label>
                </div>
                <div class="col-sm-12">
                    <label class="control-label">¿Cuánto tiempo lleva habitando en la vivienda?</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'tiempo_hab_anios')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'tiempo_hab_meses')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'vivienda_es_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(\common\models\ViviendaEs::getViviendaOk(),
                                'id', 'desc_vivienda_es'),
                            'options' => ['placeholder' => 'Selecciona una Opcion', 'id' => 'desc_vivienda_es'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">II.3 Número de familias en la vivienda</label>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'num_familias')->textInput() ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="alert alert-success-alt">
                <strong>III. CALIDAD Y ESPACIOS DE LA VIVIENDA (CARACTERÍSTICAS DE LA VIVIENDA)</strong>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">III.1 Piso</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'piso_firme')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="piso">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'piso_material')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">III.2 Techo</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'techo_firme')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="techo">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'techo_material')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">III.3 Muro</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'muros_firme')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="muros">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'muros_material')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">III.4 Hacinamiento</label>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'num_habitaciones')->textInput() ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>IV. ACCESO A LOS SERVICIOS BÁSICOS EN LA VIVIENDA</strong>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">IV.1 Agua de la red pública</label>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'agua_publica')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="aguap">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'agua_obtenida')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'agua_interior_viv')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">IV.2 Drenaje</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'drenaje_puclico')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'drenaje_desemboque')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">IV.3 Electricidad </label>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'energia_electrica')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label style="font-size: medium" class="control-label">IV.4 Combustible utilizado para cocinar</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label">¿Qué combustible utiliza para cocinar o calentar los alimentos?</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <?= $form->field($model, 'cocina_gas')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <?= $form->field($model, 'cocina_electricidad')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <?= $form->field($model, 'cocina_lena')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <?= $form->field($model, 'cocina_carbon')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <?= $form->field($model, 'cocina_otro')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="otro">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'cocina_otro_esp')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="chimenea">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'chimenea')->radioList([1 => 'Si', 0 => 'No']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'excusado')->radioList([1 => 'Si', 0 => 'No'])?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'refrigerador')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'lavadora')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="alert alert-success-alt">
                <strong>V. EDUCACIÓN</strong>
                <i class="fa fa-university" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label" style="font-size: medium">V.1 Acceso a la educación</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'educ_trunca_3_15')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="trunca_3_15">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'causa_trunca_3_15')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'no_asiste_esc_3_15')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="no_asiste_3_15">
                        <div class="form-group">
                            <?= $form->field($model, 'causa_no_asiste_3_15')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'prim_icomp_35_mas')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'sec_icomp_16_35')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'analfabetas_may_15')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="analfabetas_may_15">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'analfabentas_num')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'prim_icomp_15_mas')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="prim_icomp_15_mas">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'num_15_mas')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'no_asiste_esc_6_14')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="no_asiste_esc_6_14">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'num_6_14')->textInput() ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'causa_6_14')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="alert alert-success-alt">
                <strong>VI. SALUD</strong>
                <i class="fa fa-hospital-o" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label" style="font-size: medium">VI.1 Acceso a los servicios de salud</label>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'tiene_serv_med')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="tiene_serv_med">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <?= $form->field($model, 'seguro_popular')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <?= $form->field($model, 'issemyn')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <?= $form->field($model, 'imss')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <?= $form->field($model, 'marina_sedena')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <?= $form->field($model, 'isste')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <?= $form->field($model, 'pemex')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <?= $form->field($model, 'otro_serv_med')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                        </div>
                    </div>
                    <div class="otro_serv_med">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= $form->field($model, 'especifique')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'num_miemb_recibe')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <?= $form->field($model, 'cronico_degenerativa')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="cronico_degenerativa">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <?= $form->field($model, 'cual_cronico_deg')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="alert alert-success-alt">
                <strong>VII. SEGURIDAD SOCIAL</strong>
                <i class="fa fa-group" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label" style="font-size: medium">VII.1 Acceso a la Seguridad Social</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'trabaja_formalmente')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="trabaja_formalmente">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'seguridad_social')->radioList([1 => 'Si', 0 => 'No']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'no_SS_65_mas')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>VIII. EMPLEO E INGRESOS</strong>
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label" style="font-size: medium">VIII.1 Empleo e ingresos</label>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'cuantos_ingresos')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label">Especifique quien es:</label>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'jefe_familia')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'jefa_familia')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'hijo')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'ingreso_total',[
                            'template' =>
                                '{label}<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>{input}</div>{error}'

                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'autoingreso')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="autoingreso">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'monto_autoingreso',[
                                'template' =>
                                    '{label}<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>{input}</div>{error}'

                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'actividad_autoingreso')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'apoyo_gobierno')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="apoyo_gobierno">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'cual_apoyo')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'monto_apoyo',[
                                'template' =>
                                    '{label}<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>{input}</div>{error}'

                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'apoyo_extranjero')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="apoyo_extranjero">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'monto_extranjero',[
                                'template' =>
                                    '{label}<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>{input}</div>{error}'

                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'pension')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="pension">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $form->field($model, 'monto_pension',[
                                'template' =>
                                    '{label}<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>{input}</div>{error}'

                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'madre_soltera_labora')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>IX. ALIMENTACIÓN</strong>
                <i class="fa fa-apple" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label" style="font-size: medium">IX.1 Acceso a la alimentación menores </label>
                </div>
                <div class="col-sm-12">
                    <label class="control-label">En los últimos tres meses, por falta de dinero o recursos:</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'menor_poca_variedad')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'menor_falta_alimentos')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'menor_menor_porcion')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'menor_hambre')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'menor_acosto_hambre')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'menor_sin_comer_dia')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label" style="font-size: medium">IX.2 Acceso a la alimentación adultos</label>
                </div>
                <div class="col-sm-12">
                    <label class="control-label">En los últimos tres meses, por falta de dinero o recursos:</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'adulto_poca_variedad')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'adulto_falta_alimentos')->radioList([1 => 'Si', 0 => 'No'])?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'adulto_menor_porcion')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'quedaron_sin_comida')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'adulto_hambre')->radioList([1 => 'Si', 0 => 'No'])?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'adulto_sin_comer_dia')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success-alt">
                <strong>X. VINCULACIÓN A PROGRAMAS DE DESARROLLO SOCIAL (FEDERALES Y ESTATALES)</strong>
                <i class="fa fa-random" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'tarjeta_liconsa')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'acceso_tienda_diconsa')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'abastece_tienda_diconsa')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'comedor_comunitario')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'asiste_comedor_comunitario')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'programa_desarrollo_social')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="programa_desarrollo_social">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'cual_programa')->widget(Select2::classname(), [
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
                            <?= $form->field($model, 'nombre_recibe_programa')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?= $form->field($model, 'parentesco_recibe_programa')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(\common\models\Parentesco::getParentescoOk(),
                                    'id', 'desc_parentesco'),
                                'options' => ['placeholder' => 'Selecciona un Parentesco', 'id' => 'desc_parentesco'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= $form->field($model, 'prospera')->radioList([1 => 'Si', 0 => 'No']) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-save" aria-hidden="true"></i> Guardar', ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?=$this->registerJsFile(
    '@web/frontend/assets/js/cedula.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);?>