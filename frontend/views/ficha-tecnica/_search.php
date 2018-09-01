<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ficha-tecnica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'entidad_id') ?>

    <?= $form->field($model, 'region_id') ?>

    <?= $form->field($model, 'mun_id') ?>

    <?= $form->field($model, 'loc_id') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'indicaciones') ?>

    <?php // echo $form->field($model, 'tipo_acceso') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'acceso_facil') ?>

    <?php // echo $form->field($model, 'tiempo') ?>

    <?php // echo $form->field($model, 'cedulas_aplicadas') ?>

    <?php // echo $form->field($model, 'habitantes') ?>

    <?php // echo $form->field($model, 'ocupantes') ?>

    <?php // echo $form->field($model, 'indice_marginacion') ?>

    <?php // echo $form->field($model, 'indice_desarrollo_humano') ?>

    <?php // echo $form->field($model, 'campesinos') ?>

    <?php // echo $form->field($model, 'obreros') ?>

    <?php // echo $form->field($model, 'albañiles') ?>

    <?php // echo $form->field($model, 'amas') ?>

    <?php // echo $form->field($model, 'empleados') ?>

    <?php // echo $form->field($model, 'otros') ?>

    <?php // echo $form->field($model, 'cual1') ?>

    <?php // echo $form->field($model, 'de1a3') ?>

    <?php // echo $form->field($model, 'de3a5') ?>

    <?php // echo $form->field($model, 'de5mas') ?>

    <?php // echo $form->field($model, 'catolica') ?>

    <?php // echo $form->field($model, 'testigos') ?>

    <?php // echo $form->field($model, 'evangelistas') ?>

    <?php // echo $form->field($model, 'cristiana') ?>

    <?php // echo $form->field($model, 'otra') ?>

    <?php // echo $form->field($model, 'cual2') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
