<?php

use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\file\FileInput;


$info = new SplFileInfo($model->imagen);
$ext = $info->getExtension();
$value = ($ext == 'jpg') ? 'image' : 'pdf';

?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'imageTemp')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'initialPreview'=>[
                                Yii::$app->homeUrl."images/docs/".$model->id."/".$model->imagen,
                            ],
                            'initialPreviewAsData'=>true,
                            'initialPreviewConfig' => [
                                ['type' => $value,'caption' => $model->imagen,
                                    'url' => Yii::$app->homeUrl."images/docs/".$model->id."/", 'key' => 10, 'downloadUrl'=> false],
                            ],
                            'initialPreviewShowDelete' => false,
                            'showCaption' => true,
                            'showRemove' => false,
                            'showUpload' => false,
                            'browseClass' => 'btn btn-primary btn-block',
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'maxFileSize'=>Yii::$app->params['sizeImg'],
                            'browseLabel' =>  ''
                        ],
                        'options' => ['multiple' => false],
                    ])  ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'fecha')->widget(DatePicker::className(), [
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
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'resp_institucional')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'resp_comunitario')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'otro')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'especifique')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'funcion')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row"></div>
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'sexo')->radioList(['H' => 'Hombre', 'M' => 'Mujer']) ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(), [
                    'name' => 'dp_2',
                    'language' => 'es',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    //'value' => 	date("d/m/Y", strtotime($model->fecha_nacimiento)),
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd-mm-yyyy',
                        'startDate' => '01-01-1910',
                        'endDate' => '01-01-2003',
                        //'value' => '22-10-1999'
                    ]
                ]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?= $form->field($model, 'num_ext')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?= $form->field($model, 'num_int')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'codigo_posta')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'tel_local')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'tel_cel')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?= $form->field($model, 'mun_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Municpios::find()->orderBy(['desc_mun' => 'DESC'])->all(),
                        'id', 'desc_mun'),
                    'options' => ['placeholder' => 'Selecciona un Municipio', 'id' => 'mun_id'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]) ?>
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
                            'url' => Url::to(['solicitantes/localidades2']),
                        ]
                    ])
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?= $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?= $form->field($model, 'redes_sociales')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
