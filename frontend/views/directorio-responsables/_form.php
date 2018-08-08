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

            <div class="col-sm-6"></div>
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
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'entidad_id')->textInput(['readonly' => true, 'value' => 15]) ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\common\models\Regiones::getRegionesOk(),
                            'id', 'desc_region'),
                        'options' => ['placeholder' => 'Selecciona una Region', 'id' => 'reg_id'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?=!$model->isNewRecord ? $form->field($model, 'mun_id1')->widget(DepDrop::classname(), [
                        'options' => ['id'=>'mun_id1'],
                        'type'=>DepDrop::TYPE_SELECT2,
                        'data'=>[$model->mun_id1=>$model->mun1->nombre_mun],
                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'pluginOptions'=>[
                            'depends'=>['reg_id'],
                            'placeholder' => 'Selecciona un Municipio',
                            'url' => Url::to(['solicitantes/municipios']),
                        ]
                    ]) :
                        $form->field($model, 'mun_id1')->widget(DepDrop::classname(), [
                            'options' => ['id'=>'mun_id1'],
                            'type'=>DepDrop::TYPE_SELECT2,
                            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                            'pluginOptions'=>[
                                'depends'=>['reg_id'],
                                'placeholder' => 'Selecciona un Municipio',
                                'url' => Url::to(['solicitantes/municipios']),
                            ]
                        ])

                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">

                    <?= !$model->isNewRecord ?  $form->field($model, 'loc_id1')->widget(DepDrop::classname(), [
                        'options' => ['id'=>'loc_id1'],
                        'data'=>[$model->loc_id1=>$model->loc1->desc_loc],
                        'type'=>DepDrop::TYPE_SELECT2,
                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'pluginOptions'=>[
                            'depends'=>['mun_id1'],
                            'placeholder' => 'Selecciona una Localidad',
                            'url' => Url::to(['solicitantes/localidades']),
                        ]
                    ]) :
                        $form->field($model, 'loc_id1')->widget(DepDrop::classname(), [
                            'options' => ['id'=>'loc_id1'],
                            'type'=>DepDrop::TYPE_SELECT2,
                            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                            'pluginOptions'=>[
                                'depends'=>['mun_id1'],
                                'placeholder' => 'Selecciona una Localidad',
                                'url' => Url::to(['solicitantes/localidades']),
                            ]
                        ])
                    ?>
                </div>
            </div>
        </div>
        <br>
        <div class="alert alert-success-gray">
            <strong>TIPO DE PERSONAL</strong>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'tipo_personal_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\common\models\TipoPersonal::find()->orderBy(['id' => 'DESC'])->all(),
                            'id', 'desc_personal'),
                        'options' => ['placeholder' => 'Tipo de Personal'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="alert alert-success-gray">
            <strong>DATOS PERSONALES</strong>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'imageTemp')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'initialPreview'=>[
                                Yii::$app->homeUrl."images/directorio/".$model->imagen,
                            ],
                            'initialPreviewAsData'=>true,
                            'initialPreviewConfig' => [
                                ['type' => $value,'caption' => $model->imagen,
                                    'url' => Yii::$app->homeUrl."images/directorio/", 'key' => 10, 'downloadUrl'=> false],
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
            <div class="col-sm-3">
                <div class="form-group">
                    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

        <div class="col-sm-4">
            <div class="form-group">
                <?= $form->field($model, 'sexo')->radioList(['H' => 'Hombre', 'M' => 'Mujer']) ?>
            </div>
        </div>
        <div class="col-sm-4">
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
        <div class="alert alert-success-gray">
            <strong>DATOS PARA LOCALIZACIÓN</strong>
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
</div>
<div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

