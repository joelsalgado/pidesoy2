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

$this->title = 'Localidades';

?>


<?= Html::beginForm(
    Url::toRoute("report/localidadseg"),//action
    "get",//method
    ['class' => 'form-inline']//options
);
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Localidades</h3>
    </div>
    <div class="box-body">

        <div class="container-fluid">
            <div class="row">
                <?=  Select2::widget([
                    'name' => 'localidades[]',
                    'data' => \yii\helpers\ ArrayHelper::map(\common\models\Localidades::getLocOk(),
                        'desc_loc', 'desc_loc'),
                    'maintainOrder' => true,
                    'options' => ['required' => true, 'placeholder' => 'Selecciona una localidad', 'multiple' => true],
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