<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 02/04/2018
 * Time: 09:42 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\select2\Select2;

$this->title = 'Regiones';

?>


<?= Html::beginForm(
    Url::toRoute("report/region"),//action
    "post",//method
    ['class' => 'form-inline']//options
);
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Desgloce por Región</h3>
    </div>
    <div class="box-body">

        <div class="container-fluid">
            <div class="row">
                <?=  Select2::widget([
                    'name' => 'regiones[]',
                    'data' => \yii\helpers\ ArrayHelper::map(\common\models\Regiones::getRegionesOk(),
                            'id', 'desc_region'),
                    'maintainOrder' => true,
                    'options' => ['required' => true, 'placeholder' => 'Selecciona una region', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                        'maximumInputLength' => 10
                    ],
                    'toggleAllSettings' => [
                            'selectLabel' => '<i class="glyphicon glyphicon-unchecked"></i> Seleccionar todo',
                            'unselectLabel' => '<i class="glyphicon glyphicon-check"></i> Deseleccionar todo'
                    ]
                ]); ?>
                <br>
                <?= Html::submitInput("Buscar", ["class" => "btn btn-primary"]) ?>
            </div>




            <?= Html::endForm() ?>
        </div>
    </div>
</div>