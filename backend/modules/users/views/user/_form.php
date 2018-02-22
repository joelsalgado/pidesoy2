<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;?>
<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php if($model->isNewRecord):?>
        <?= $form->field($model, 'password_hash')->passwordInput(['value' => '']) ?>
    <?php endif;?>
    <?= $form->field($model, 'email')->input('email') ?>
    <?php if(!$model->isNewRecord):?>
        <?= $form->field($model, 'status')->radioList(Yii::$app->params['estatus']);?>
    <?php endif;?>
    <?= $form->field($model, 'role')->radioList(Yii::$app->params['roles']);?>
    <h2 class="subtitulo">Permisos</h2>
     <table class="table table-bordered">
    <tr>
        <th>Nombre</th>
        <th>Permisos
            <div style="float: right;" class="checkbox-succes">
                <span> </span>
                <label for="selectall">
                        Todos los permisos
                </label>
                <input type="checkbox" id="selectall" />
            </div>
        </th>
    </tr>
    <?php foreach ($permissions['permissions'] as $controller => $actions):?>
    <tr>
        <td  width="50%">
            <h2 class="blue"><?php echo $controller;?></h2>
        </td>
        <td>
            <?php foreach ($actions['actions'] as $key => $action):?>
            <div class="checkbox checkbox-success">
            <input type="checkbox" id="<?=$controller.$action;?>" value="<?php echo $action;?>" name="permissions[<?php echo $controller?>][<?php echo $action;?>]" <?php echo isset($permissionsByUser[$controller.'_'.$model->id][$action])? 'checked' : '';?>>
            <label for="<?=$controller.$action;?>"><?php echo $action;?></label>
            </div>
            <?php endforeach;?>
        </td>
    </tr>
     <?php endforeach;?>
    <tr>
        <td colspan="2">
        <center>
            <div class="form-group">
                <?php  echo Html::a('Cancelar <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>', 
                    ['index'], ['class' => 'btn btn-danger btn-width']) ?>

                <?= Html::submitButton($model->isNewRecord ? 'Crear usuario' : 'Actualizar usuario <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>', ['class' => 'btn btn-primary']) ?>
            </div>
        </center>
        </td>
    </tr>
    </table>
     <?php ActiveForm::end(); ?>
 </div>