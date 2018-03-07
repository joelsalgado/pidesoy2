<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'value' => '']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php if(!$model->isNewRecord):?>
        <?= $form->field($model, 'status')->radioList(Yii::$app->params['estatus']);?>
    <?php endif;?>
    <?php if(Yii::$app->user->identity->role ==30):?>
        <?= $form->field($model, 'role')->radioList(Yii::$app->params['rolesAdmin']);?>
    <?php endif;?>

    <div class="region">
        <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\common\models\Regiones::getRegionesOk(),
                'id', 'desc_region'),
            'options' => ['placeholder' => 'Selecciona una Región'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?=$this->registerJsFile(
    '@web/frontend/assets/js/users.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);?>
