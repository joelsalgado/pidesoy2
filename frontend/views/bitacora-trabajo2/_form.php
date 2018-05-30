<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\BitacoraReunion2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'fechas')->widget(DatePicker::className(), [
                        'name' => 'dp_2',
                        'language' => 'es',
                        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                        //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'dd-mm-yyyy',
                            'startDate' => '01-01-2017',
                            'endDate' => '01-01-2020',
                            //'value' => '22-10-1999'
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'objetivo')->textarea() ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'acciones')->textarea() ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'cumplio')->radioList([1 => 'Si', 0 => 'No']) ?>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'observaciones')->textarea() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
