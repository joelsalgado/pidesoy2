<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

?>

    <div class="container-fluid">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="alert alert-success-alt">
                <strong>ACCIONES ADICIONALES</strong>
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'nombre_accion')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'meta')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::className(), [
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
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'fecha_entrega')->widget(DatePicker::className(), [
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
                        <?= $form->field($model, 'inversion')->textInput() ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'programa')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'responsable')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?= $form->field($model, 'acciones')->textInput(["onKeyUp"=> "fncRelevantes()"]) ?>
                    </div>
                </div>
            </div>
            <div class="relevantes">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?= $form->field($model, 'fecha_termino')->widget(DatePicker::className(), [
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
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?=$this->registerJsFile(
    '@web/frontend/assets/js/relevantes.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);?>