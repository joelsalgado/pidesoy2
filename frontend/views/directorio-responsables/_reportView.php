<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 28/05/2018
 * Time: 11:39 AM
 */

?>
<p style="color:#CC0066; font-size: medium"><b>FAMILIAS FUERTES, COMUNIDADES CON TODO</b></p>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td rowspan="2"  width="15%">
            <img  src="<?= Yii::$app->homeUrl ?>images/colors.png" width="160" height="55">
        </td>
        <td align="right" style="background-color: #CC0066; color: white;" width="85%">
            <b><p>FICHA DE DATOS PERSONALES PARA</p></b>
        </td>
    </tr>
    <tr>
        <td align="right" style="background-color: #CC0066; color: white;" width="85%">
            <b><p>INTEGRAR EL DIRECTORIO DE RESPONSABLES Y OTROS</p></b>
        </td>
    </tr>
</table><br>

<table class="table table-bored">
    <tr>
        <td colspan="12" align="right"><b>FECHA:</b> <?= $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): ''; ?></td>
    </tr>
    <tr>
        <td colspan="6"><b>MUNICIPIO: </b><?= $model->mun->desc_mun ?></td>
        <td colspan="6"><b>LOCALIDAD: </b><?= $model->loc->nombre_loc ?></td>
    </tr>
</table>

<div class="alert alert-success-gray" role="alert">
    <b>TIPO DE PERSONAL (marque con una X)</b>
</div>

<table  border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td><?= $otro = ($model->tipo_personal_id == 1) ? ' <b>(X)</b> ' : '(&nbsp;&nbsp;&nbsp;) ' ?>Responsable Institucional</td>
        <td><?= $otro = ($model->tipo_personal_id == 2) ? ' <b>(X)</b> ' : '(&nbsp;&nbsp;&nbsp;) ' ?>Responsable Comunitario</td>
    </tr>
    <tr>
        <td><?= $otro = ($model->tipo_personal_id == 3) ? ' <b>(X)</b> ' : '(&nbsp;&nbsp;&nbsp;) ' ?>Suplente del Responsable Institucional</td>
        <td><?= $otro = ($model->tipo_personal_id == 4) ? ' <b>(X)</b> ' : '(&nbsp;&nbsp;&nbsp;) ' ?>Suplente del Responsable Comunitario</td>
    </tr>
    <tr>
        <td><?= $otro = ($model->tipo_personal_id == 5) ? ' <b>(X)</b> ' : '(&nbsp;&nbsp;&nbsp;) ' ?>Enlace del Responsable Institucional</td>
        <td><?= $otro = ($model->tipo_personal_id == 6) ? ' <b>(X)</b> ' : '(&nbsp;&nbsp;&nbsp;) ' ?>Persona para dejar recados al Responsable Comunitario</td>
    </tr>
</table><br>

<div class="alert alert-success-gray" role="alert">
    <b>DATOS PERSONALES</b>
</div>

<table class="table table-hover" >

    <tr>
        <td colspan="2" rowspan="4" width="25%">
            <?php if ($model->imagen):?>
                <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/directorio/<?= $model->imagen ?>" height="120" width="120">
            <?php else: ?>
                <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/sinimagen.jpg" height="120" width="120">
            <?php endif; ?>
        </td>

    </tr>
    <tr>
        <td width="25%" align="center" style="border: black; border-left: black"><u><?= $model->apellido_paterno ?></u></td>
        <td width="25%" align="center"><u><?= $model->apellido_materno ?></u></td>
        <td width="25%" align="center"><u><?= $model->nombre ?></u></td>
    </tr>
    <tr>
        <td width="25%" align="center"><b>Apellido Paterno</b></td>
        <td width="25%" align="center"><b>Apellido Materno</b></td>
        <td width="25%" align="center"><b>Nombre(s)</b></td>
    </tr>
    <br>
    <tr>
        <td align="center" width="20%"><b>EDAD:</b><?= $edad ?></td>
        <td width="20%"><b>SEXO:</b> <?= $model->sexo ?></td>
        <td width="35%"><b>FECHA DE NACIMIENTO:</b> <?= $model->fecha_nacimiento = ($model->fecha_nacimiento)? Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd-MM-yyyy'): ''; ?></td>
    </tr>
</table>

<div class="alert alert-success-gray" role="alert">
    <b>DATOS PARA LOCALIZACIÓN</b>
</div>

<table class="table table-striped">
    <tr>
        <td colspan="6"><b>CALLE:</b> <?= $model->calle ?></td>
        <td colspan="3"><b>NÚMERO EXTERIOR:</b> <?= $model->num_ext ?></td>
        <td colspan="3" align="left"><b>NÚMERO INTERIOR:</b> <?= $model->num_int ?></td>
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
        <td colspan="6"><b>MUNICIPIO: </b><?= $model->mun->desc_mun ?></td>
        <td colspan="6"><b>LOCALIDAD: </b><?= $model->loc->nombre_loc ?></td>
    </tr>
    <tr>
        <td colspan="12"><b>REFERENCIA: </b><?= $model->referencia ?></td>
    </tr>
    <tr>
        <td colspan="6"><b>CORREO ELECTRÓNICO: </b><?= $model->correo ?></td>
        <td colspan="6"><b>REDES SOCIALES: </b><?= $model->redes_sociales ?></td>
    </tr>
</table>
<br>

<table class="table table-condensed">
    <tr>
        <td align="center">_________________________________________________</td>
        <td align="center">_________________________________________________</td>
    </tr>
    <tr>
        <td align="center"><p style="font-size: 6pt">Nombre completo y firma del responsable de llenar el formato
            </p> </td>
        <td align="center"><p style="font-size: 6pt">Nombre completo y firma de la persona a la cual corresponden los datos de la ficha</p> </td>
    </tr>
</table>
