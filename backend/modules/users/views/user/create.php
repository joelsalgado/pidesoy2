<?php
use yii\helpers\Html;
$this->title = 'Crear usuario';?>
<div class="user-update" id="user-update">
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
    <div class="panel">
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'permissions' => $permissions
            ]) ?>
        </div>
    </div>
</div>

<?php $this->registerJsFile(
    '@web/../js/checkboxselectall.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
 );