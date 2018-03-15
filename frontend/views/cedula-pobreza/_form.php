<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CedulaPobreza */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedula-pobreza-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'num_personas')->textInput() ?>

    <?= $form->field($model, 'per_0_15')->textInput() ?>

    <?= $form->field($model, 'per_16_17')->textInput() ?>

    <?= $form->field($model, 'per_18_64')->textInput() ?>

    <?= $form->field($model, 'per_65_mas')->textInput() ?>

    <?= $form->field($model, 'tiempo_hab_anios')->textInput() ?>

    <?= $form->field($model, 'tiempo_hab_meses')->textInput() ?>

    <?= $form->field($model, 'vivienda_es_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\ViviendaEs::getViviendaOk(),
            'id', 'desc_vivienda_es'),
        'options' => ['placeholder' => 'Selecciona una Opcion', 'id' => 'desc_vivienda_es'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'num_familias')->textInput() ?>


    <?= $form->field($model, 'piso_firme')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'piso_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'techo_firme')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'techo_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'muros_firme')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'muros_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_habitaciones')->textInput() ?>


    <?= $form->field($model, 'agua_publica')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'agua_obtenida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agua_interior_viv')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'drenaje_puclico')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'drenaje_desemboque')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'energia_electrica')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'cocina_gas')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

    <?= $form->field($model, 'cocina_electricidad')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

    <?= $form->field($model, 'cocina_lena')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

    <?= $form->field($model, 'cocina_carbon')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

    <?= $form->field($model, 'cocina_otro')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>

    <?= $form->field($model, 'cocina_otro_esp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chimenea')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'excusado')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'refrigerador')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'lavadora')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'educ_trunca_3_15')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'causa_trunca_3_15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_asiste_esc_3_15')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'causa_no_asiste_3_15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prim_icomp_35_mas')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'sec_icomp_16_35')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'analfabetas_may_15')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'analfabentas_num')->textInput() ?>

    <?= $form->field($model, 'prim_icomp_15_mas')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'num_15_mas')->textInput() ?>

    <?= $form->field($model, 'no_asiste_esc_6_14')->radioList([0 => 'No', 1 => 'Si']) ?>

    <?= $form->field($model, 'num_6_14')->textInput() ?>

    <?= $form->field($model, 'causa_6_14')->textInput(['maxlength' => true]) ?>


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
