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

<p><b>TIPO DE PERSONAL (marque con una X)</p></b><br>
<table class="table table-hover">
    <tr>
        <td><?= $otro = ($model->tipo_personal_id == 1) ? ' <b>(X)</b> ' : '( )' ?>Responsable Institucional</td>
        <td><?= $otro = ($model->tipo_personal_id == 2) ? ' <b>(X)</b> ' : '( )' ?>Responsable Comunitario</td>
    </tr>
    <tr>
        <td><?= $otro = ($model->tipo_personal_id == 3) ? ' <b>(X)</b> ' : '( )' ?>Suplente del Responsable Institucional</td>
        <td><?= $otro = ($model->tipo_personal_id == 4) ? ' <b>(X)</b> ' : '( )' ?>Suplente del Responsable Comunitario</td>
    </tr>
    <tr>
        <td><?= $otro = ($model->tipo_personal_id == 5) ? ' <b>(X)</b> ' : '( )' ?>Enlace del Responsable Institucional</td>
        <td><?= $otro = ($model->tipo_personal_id == 6) ? ' <b>(X)</b> ' : '( )' ?>Persona para dejar recados al Responsable Comunitario</td>
    </tr>


</table>

<p><b>DATOS PERSONALES</p></b><br>
<table class="table table-hover" >

    <tr>
        <td colspan="2" rowspan="4">
            <?php if ($model->imagen):?>
                <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/directorio/<?= $model->imagen ?>" height="120" width="120">
            <?php endif; ?>

        </td>

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

<br><p><b>DATOS PARA LOCALIZACIÓN.</p></b><br>

<table class="table table-striped">
    <tr>
        <td colspan="6"><b>CALLE:</b> <?= $model->calle ?></td>
        <td colspan="3"><b>NÚMERO EXTERIOR:</b> <?= $model->num_ext ?></td>
        <td colspan="3"><b>NÚMERO INTERIOR:</b> <?= $model->num_int ?></td>
    </tr>
    <tr>
        <td colspan="6"><b>COLONIA: </b><?= $model->colonia ?></td>
        <td colspan="6"><b>CÓDIGO POSTAL: </b><?= $model->codigo_posta ?></td>
    </tr>
    <tr>
        <td colspan="6"><b>TELÉFONO LOCAL: </b><?= $model->tel_local ?></td>
        <td colspan="6"><b>TELÉFONO CELULAR: </b><?= $model->tel_cel ?></td>
    </tr>
    <tr>
        <td colspan="4"><b>MUNICIPIO: </b><?= $model->mun->desc_mun ?></td>
        <td colspan="4"><b>LOCALIDAD: </b><?= $model->loc->nombre_loc ?></td>
        <td colspan="4"><b>REFERENCIA: </b><?= $model->referencia ?></td>
    </tr>
    <tr>
        <td colspan="6"><b>CORREO ELECTRÓNICO: </b><?= $model->correo ?></td>
        <td colspan="6"><b>REDES SOCIALES: </b><?= $model->redes_sociales ?></td>
    </tr>
</table>
<br>

<table class="table table-striped">
    <tr>
        <td align="center">__________________________________________________________</td>
    </tr>
    <tr>
        <td align="center">HAGO CONSTAR QUE LA INFORMACIÓN ES VERDADERA</td>
    </tr>
    <tr>
        <td align="center">Y ACEPTO LAS RESPONSABILIDADES <ASIGNADAS></ASIGNADAS></td>
    </tr>
</table>