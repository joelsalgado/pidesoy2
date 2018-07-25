<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Censo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
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
        <div class="alert alert-success-censo">
            <strong>1.-Del siguiente listado, digame las 5 necesidades más importantes que su localidad requiera, empezando por la más urgente.</strong>
        </div>
        <div class="row">

            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'agua_potable')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>a) Que tengamos agua potable</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'salones')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>f) Se requiere salón o sanitarios en escuela</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'lamparas')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>k) Tener lámparas en la calle</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'otro1')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>p) Otro</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'drenaje')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>b) Que tengamos drenaje</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'iglesia')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>g) Reparar la iglesia</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'diconsa')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>l) Que abran una tienda Diconsa</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?= $form->field($model, 'cual1')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'basura')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>c) Que pasen por la basura</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'doctor')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>h) Contar con doctor que nos atienda</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'liconsa')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>m) Que abran una lechería Liconsa</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'policias')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>d) Que tenga más policías y patrullas</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'salud')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>i) Tener un centro de salud</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'comunitario')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>n) Que haya un comedor comunitario</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'parques')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>e) Que construyan o recuperen parques, jardines y canchas</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'medicamentos')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>j) Tener medicamentos suficientes en el centro de salud</label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <?= $form->field($model, 'ambulacia')->textInput()->label(false) ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>o) Contar con ambulancia para traslado de pacientes, cuando así se requiera</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="alert alert-success-censo">
            <strong>2. De la siguiente lista, ¿cuáles son los 5 aspectos que más necesita usted?</strong>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'documentos')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'becas')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'luz')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'vacunacion')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'papeles')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'desayuno')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'ortopedicos')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'terminar_esc')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'otro2')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'seguro_popular')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'credito')->checkbox(['value' => 1, 'uncheckValue'=>0]) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'cual2')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="alert alert-success-censo">
            <strong>3. ¿Es miembro de alguna organización de vecinos u otro grupo comunitario?</strong>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'grupo_comunitario')->radioList([1 => 'Si', 0 => 'No'])->label(false) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'cual3')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="alert alert-success-censo">
            <strong>4. ¿Le gustaría participar con las autoridades municipales y estatales para mejorar las condiciones de su localidad y vivienda?</strong>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?= $form->field($model, 'autoridades_estatales')->radioList([1 => 'Si', 0 => 'No'])->label(false) ?>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div>
        <div class="alert alert-success-censo">
            <strong>5. ¿Cuenta con tiempo disponible para participar en las acciones de mejora para su localidad y vivienda?</strong>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class="form-group">
                    <?= $form->field($model, 'acciones')->radioList([1 => 'Si', 0 => 'No'])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="alert alert-success-censo">
            <strong>Espacio para observaciones</strong>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->field($model, 'observaciones')->textarea()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
