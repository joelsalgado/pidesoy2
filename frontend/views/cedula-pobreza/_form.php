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
            <div class="alert alert-info">
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
            <div class="alert alert-info">
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
            <div class="alert alert-info">
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
            <div class="alert alert-info">
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

        <?= $form->field($model, 'tiene_serv_med')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'seguro_popular')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'issemyn')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'imss')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'marina_sedena')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'isste')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'pemex')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'otro_serv_med')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'especifique')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'num_miemb_recibe')->textInput() ?>

        <?= $form->field($model, 'cronico_degenerativa')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'cual_cronico_deg')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'trabaja_formalmente')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'seguridad_social')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'no_SS_65_mas')->radioList([0 => 'No', 1 => 'Si']) ?>


        <?= $form->field($model, 'cuantos_ingresos')->textInput() ?>

        <?= $form->field($model, 'jefe_familia')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'jefa_familia')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'hijo')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

        <?= $form->field($model, 'ingreso_total')->textInput() ?>

        <?= $form->field($model, 'autoingreso')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'monto_autoingreso')->textInput() ?>

        <?= $form->field($model, 'actividad_autoingreso')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'apoyo_gobierno')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'cual_apoyo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'monto_apoyo')->textInput() ?>

        <?= $form->field($model, 'apoyo_extranjero')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'monto_extranjero')->textInput() ?>

        <?= $form->field($model, 'pension')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'monto_pension')->textInput() ?>

        <?= $form->field($model, 'madre_soltera_labora')->radioList([0 => 'No', 1 => 'Si']) ?>


        <?= $form->field($model, 'menor_poca_variedad')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'menor_falta_alimentos')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'menor_menor_porcion')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'menor_hambre')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'menor_acosto_hambre')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'menor_sin_comer_dia')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'adulto_poca_variedad')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'adulto_falta_alimentos')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'adulto_menor_porcion')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'quedaron_sin_comida')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'adulto_hambre')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'adulto_sin_comer_dia')->radioList([0 => 'No', 1 => 'Si']) ?>


        <?= $form->field($model, 'tarjeta_liconsa')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'acceso_tienda_diconsa')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'abastece_tienda_diconsa')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'comedor_comunitario')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'programa_desarrollo_social')->radioList([0 => 'No', 1 => 'Si']) ?>

        <?= $form->field($model, 'cual_programa')->textInput()->label('pendiente programas combo') ?>

        <?= $form->field($model, 'nombre_recibe_programa')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'parentesco_recibe_programa')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\common\models\Parentesco::getParentescoOk(),
                'id', 'desc_parentesco'),
            'options' => ['placeholder' => 'Selecciona un Parentesco', 'id' => 'desc_parentesco'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <?= $form->field($model, 'prospera')->radioList([0 => 'No', 1 => 'Si']) ?>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?=$this->registerJsFile(
    '@web/frontend/assets/js/cedula.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);?>