<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 28/05/2018
 * Time: 11:39 AM
 */

?>
<table class="table table-condensed">
    <tr>
        <td>
            <img class="rounded float-left" src="<?= Yii::$app->homeUrl ?>images/logoedo.png" height="75" width="75">
        </td>
        <td align="center">
            <p align="center" style="font-size: small; color:#ff3d96;"><b>FAMILIAS FUERTES, COMUNIDADES CON TODO</b></p>
            <p align="center" style="font-size: small; color:#ff3d96;"><b>DIRECTORIO DE RESPONSABLES Y ENLACES</b></p>
        </td>
        <td align="right">
            <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="75" width="75">
        </td>
    </tr>
</table>

<table class="table table-bored">
    <tr>
        <td align="right"><b>FECHA:</b> <?= $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): ''; ?></td>
    </tr>
</table>


<p><b>I.- DATOS PERSONALES</p></b>
<table class="table table-hover" >
    <tr>
        <td colspan="2"></td>
        <td colspan="2"><b>RESPONSABLE INSTITUCIONAL </b><?= $ins = ($model->resp_institucional == 1) ? ' (X) ' : '( )' ?></td>
        <td colspan="2"><b>RESPONSABLE COMUNITARIO </b><?= $comun = ($model->resp_comunitario == 1) ? ' (X) ' : '( )' ?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"><b>OTRO</b> <?= $otro = ($model->otro == 1) ? ' (X) ' : '( )' ?></td>
        <td colspan="2">Especifique: <?=$model->especifique ?></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="4">
            <?php if ($model->imagen):?>
                <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/directorio/<?= $model->imagen ?>" height="120" width="120">
            <?php endif; ?>

        </td>
        <td colspan="4"><b>FUNCIÓN:</b> <?=$model->funcion ?></td>
    </tr>
    <tr>
        <td><b>NOMBRE:</b></td>
        <td align="center"><u><?= $model->apellido_paterno ?></u></td>
        <td align="center"><u><?= $model->apellido_materno ?></u></td>
        <td align="center"><u><?= $model->nombre ?></u></td>
    </tr>
    <tr>
        <td></td>
        <td align="center">Apellido Paterno</td>
        <td align="center">Apellido Materno</td>
        <td align="center">Nombre(s)</td>
    </tr>
    <tr>
        <td><b>EDAD:</b><?= $edad ?></td>
        <td><b>SEXO:</b> <?= $model->sexo ?></td>
        <td colspan="2"><b>FECHA DE NACIMIENTO:</b> <?= $model->fecha_nacimiento = ($model->fecha_nacimiento)? Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd-MM-yyyy'): ''; ?></td>
    </tr>
</table>


