<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Documentos */
/* @var $form yii\widgets\ActiveForm */
$info = new SplFileInfo($model->documento);
$ext = $info->getExtension();
$value = ($ext == 'jpg') ? 'image' : 'pdf';
$info2 = new SplFileInfo($model->foto);
$ext2 = $info2->getExtension();
$value2 = ($ext2 == 'jpg') ? 'image' : 'pdf';
?>

<div class="documentos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imageTemp')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'initialPreview'=>[
                Yii::$app->homeUrl."images/docs/".$model->solicitante_id."/".$model->documento,
            ],
            'initialPreviewAsData'=>true,
            'initialPreviewConfig' => [
                    ['type' => $value,'caption' => $model->documento,
                    'url' => Yii::$app->homeUrl."images/docs/".$model->solicitante_id."/", 'key' => 10, 'downloadUrl'=> false],
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

    <?= $form->field($model, 'imageTemp2')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'initialPreview'=>[
                Yii::$app->homeUrl."images/docs/".$model->solicitante_id."/".$model->foto,
            ],
            'initialPreviewConfig' => [
                ['type' => $value2, 'caption' => $model->foto,
                    'url' => Yii::$app->homeUrl."images/docs/".$model->solicitante_id."/", 'key' => 10, 'downloadUrl'=> false],
            ],
            'initialPreviewAsData'=>true,
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

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
