<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Iniciar Sesión';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>SEDE</b>SEM</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <table class="table table-condensed">
            <tr>
                <td align="center">
                    <p style="align-content: center"><img src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="150" width="150"></p>
                </td>
            </tr>
        </table>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Usuario')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordarme') ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Iniciar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
