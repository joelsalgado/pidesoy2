<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="alert alert-success-orange">
            <strong>IDENTIFICACIÓN DE LA LOCALIDAD</strong>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'fecha')->widget(DatePicker::className(), [
                        'name' => 'dp_2',
                        'language' => 'es',
                        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                        //'readonly' => ($model->isNewRecord) ? false : true,
                        //'disabled' => ($model->isNewRecord) ? false : true,
                        //'value' => 	date("d/m/Y", strtotime($model->fecha)),
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
                    <?=!$model->isNewRecord ? $form->field($model, 'mun_id')->widget(DepDrop::classname(), [
                        'options' => ['id'=>'mun_id'],
                        'type'=>DepDrop::TYPE_SELECT2,
                        'data'=>[$model->mun_id=>$model->mun->nombre_mun],
                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'pluginOptions'=>[
                            'depends'=>['reg_id'],
                            'placeholder' => 'Selecciona un Municipio',
                            'url' => Url::to(['solicitantes/municipios']),
                        ]
                    ]) :
                        $form->field($model, 'mun_id')->widget(DepDrop::classname(), [
                            'options' => ['id'=>'mun_id'],
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
                                'url' => Url::to(['solicitantes/localidades']),
                            ]
                        ])
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'indicaciones')->textarea() ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'tipo_acceso')->inline()->radioList([
                            'Pavimentado' => 'Pavimentado',
                            'Terracería' => 'Terracería',
                            'Sin Acceso' => 'Sin Acceso'
                    ]) ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'estado')->inline()->radioList([
                        'Bueno' => 'Bueno',
                        'Regular' => 'Regular',
                        'Malo' => 'Malo'
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'acceso_facil')->inline()->radioList([1 => 'Si', 0 => 'No']) ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->field($model, 'tiempo')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <br>
        <div class="alert alert-success-orange">
            <strong>ANÁLISIS GENERAL Y DESCRIPCIÓN SOCIOPOLÍTICA DE LA LOCALIDAD</strong>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'cedulas_aplicadas')->textInput() ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <?= $form->field($model, 'habitantes')->textInput() ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?= $form->field($model, 'ocupantes')->textInput() ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <?= $form->field($model, 'indice_marginacion')->dropDownList(
                        ['Alto' => 'Alto', 'Medio' => 'Medio', 'Bajo' => 'Bajo', 'Muy Bajo' => 'Muy Bajo']
                    ); ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <?= $form->field($model, 'indice_desarrollo_humano')->dropDownList(
                        ['Alto' => 'Alto', 'Medio' => 'Medio', 'Bajo' => 'Bajo', 'Muy Bajo' => 'Muy Bajo']
                    ); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="alert alert-success-gray">
                    <strong>Principales actividades a las que se dedican los habitantes</strong>
                </div>
                <div class="form-group">

                    <?= $form->field($model, 'campesinos', [
                        'template' =>
                            '<div class="input-group"><span class="input-group-addon">Campesinos</span>{input}<span class="input-group-addon">%</span></div>{error}'

                    ]) ?>

                    <?= $form->field($model, 'obreros', [
                        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Obreros</span>{input}<span class="input-group-addon">%</span></div>',
                    ])->label(false) ?>

                    <?= $form->field($model, 'albaniles', [
                        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Albañiles</span>{input}<span class="input-group-addon">%</span></div>',
                    ])->label(false) ?>

                    <?= $form->field($model, 'amas', [
                        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Amas de casa</span>{input}<span class="input-group-addon">%</span></div>',
                    ])->label(false) ?>

                    <?= $form->field($model, 'empleados', [
                        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Empleados</span>{input}<span class="input-group-addon">%</span></div>',
                    ])->label(false) ?>

                    <?= $form->field($model, 'otros', [
                        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Otro</span>{input}<span class="input-group-addon">%</span></div>',
                    ])->textInput(["onKeyUp"=> "fncOtro1()"])->label(false) ?>
                    <div class="cual1">
                        <?= $form->field($model, 'cual1')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="alert alert-success-gray">
                    <strong>Ingreso promedio mensual de los habitantes de la localidad</strong>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'ingreso_promedio')->radioList([
                        'De 1 a 3 salarios mínimos' => 'De 1 a 3 salarios mínimos',
                        'De 3 a 5 salarios mínimos' => 'De 3 a 5 salarios mínimos',
                        '5 o más salarios mínimos' => '5 o más salarios mínimos'
                    ])->label(false) ?>
                </div>
            </div>

        </div>
        <div class="alert alert-success-gray">
            <strong>Religión predominante en la localidad</strong>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
            <?= $form->field($model, 'catolica', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Católica</span>{input}<span class="input-group-addon">%</span></div>',
            ])->label(false) ?>

            <?= $form->field($model, 'testigos', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Testigo de Jehová</span>{input}<span class="input-group-addon">%</span></div>',
            ])->label(false) ?>

            <?= $form->field($model, 'evangelistas', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Evangélica</span>{input}<span class="input-group-addon">%</span></div>',
            ])->label(false) ?>

            <?= $form->field($model, 'cristiana', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Cristiana</span>{input}<span class="input-group-addon">%</span></div>',
            ])->label(false) ?>

            <?= $form->field($model, 'otra', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">Otra</span>{input}<span class="input-group-addon">%</span></div>',
            ])->textInput(["onKeyUp"=> "fncOtro2()"])->label(false) ?>
            <div class="cual2">
                <?= $form->field($model, 'cual2')->textInput(['maxlength' => true]) ?>
            </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
</div>


    <?php ActiveForm::end(); ?>

</div>
<?=$this->registerJsFile(
    '@web/frontend/assets/js/ficha.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);?>