<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FichaNecesidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>
    <div class="row">
        <div class="alert alert-success-orange">
            <strong>Vivienda</strong>
        </div>

        <?= $form->field($model, 'piso_firme')->textInput() ?>

        <?= $form->field($model, 'techo_firme')->textInput() ?>

        <?= $form->field($model, 'muro_firme')->textInput() ?>

        <?= $form->field($model, 'cuarto_adicional')->textInput() ?>

        <?= $form->field($model, 'estufa')->textInput() ?>

        <?= $form->field($model, 'agua_potable')->textInput() ?>

        <?= $form->field($model, 'drenaje')->textInput() ?>

        <?= $form->field($model, 'luz')->textInput() ?>

        <?= $form->field($model, 'alumbrado')->textInput() ?>

        <div class="alert alert-success-orange">
            <strong>Educación</strong>
        </div>

        <?= $form->field($model, 'menor_no_edu_basica')->textInput() ?>

        <?= $form->field($model, 'estructuras_escolares')->textInput() ?>

        <?= $form->field($model, 'escuelas_acondicionamiento')->textInput() ?>

        <?= $form->field($model, 'adulto_no_edu_basica')->textInput() ?>

        <div class="alert alert-success-orange">
            <strong>Salud</strong>
        </div>

        <?= $form->field($model, 'centros_medicos')->textInput() ?>

        <?= $form->field($model, 'personal_medico')->textInput() ?>

        <?= $form->field($model, 'medicamento')->inline()->radioList([1 => 'Si', 0 => 'No']) ?>

        <?= $form->field($model, 'jornada_de_salud')->inline()->radioList([1 => 'Si', 0 => 'No']) ?>

        <?= $form->field($model, 'seguro_popular')->textInput() ?>

        <div class="alert alert-success-orange">
            <strong>Seguridad Social</strong>
        </div>

        <?= $form->field($model, 'trabajador_no_ss')->textInput() ?>

        <?= $form->field($model, 'adulto_no_ss')->textInput() ?>

        <div class="alert alert-success-orange">
            <strong>Alimentación</strong>
        </div>

        <?= $form->field($model, 'alimentan1o2')->textInput() ?>

        <?= $form->field($model, 'menor_desayunos')->textInput() ?>

        <?= $form->field($model, 'comedor_comunitario')->textInput() ?>

        <?= $form->field($model, 'liconsa')->textInput() ?>

        <?= $form->field($model, 'diconsa')->textInput() ?>

        <div class="alert alert-success-orange">
            <strong>ATENCIÓN COMPLEMENTARIA DE GESTIÓN</strong>
        </div>

        <?= $form->field($model, 'basura')->textInput() ?>

        <?= $form->field($model, 'tramite')->textInput() ?>

        <?= $form->field($model, 'ambulancia')->textInput() ?>

        <?= $form->field($model, 'creditos')->textInput() ?>

        <?= $form->field($model, 'policia')->textInput() ?>

        <?= $form->field($model, 'parques')->textInput() ?>

        <?= $form->field($model, 'iglesias')->textInput() ?>

        <?= $form->field($model, 'documentos_personales')->textInput() ?>

        <?= $form->field($model, 'aparatos_ortopedicos')->textInput() ?>

        <?= $form->field($model, 'aparatos_auditivos')->textInput() ?>

        <?= $form->field($model, 'lentes')->textInput() ?>




    </div><div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
