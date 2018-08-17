<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 16/08/18
 * Time: 01:10 PM
 */
?>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td rowspan="2"  width="15%">
            <img  src="<?= Yii::$app->homeUrl ?>images/colors.png" width="160" height="55">
        </td>
        <td align="right" width="85%">
            <b><p style="color:#CC0066; font-size: xx-small">FAMILIAS FUERTES, COMUNIDADES CON TODO</p></b>
        </td>
    </tr>
    <tr>
        <td align="right" style="background-color: #CC0066; color: white;" width="85%">
            <b><p>PARTICIPANTE</p></b>
        </td>
    </tr>
</table><br>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td width="50%"></td>
        <td width="15%" align="center" style="background-color: #CC0066; color: white;">
            Municipio:
        </td>
        <td width="35%" align="right"><b><?=$model->mun->desc_mun?></b></td>
    </tr>
    <tr>
        <td width="50%"></td>
        <td width="15%" align="center" style="background-color: #CC0066; color: white;">
            Localidad:
        </td>
        <td width="35%" align="right"> <b><?=$model->loc->nombre_loc?></b></td>
    </tr>
</table>

<br>

<div class="alert alert-success-general" role="alert">
    <strong>DATOS PERSONALES</strong>
    <i class="fa fa-user" aria-hidden="true"></i>
</div>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="33%" align="left">
            <font  color="#CC0066;"><b>Nombre: </b></font><?=$model->nombre?>
        </td>
        <td width="33%" align="center">
            <font  color="#CC0066;"><b>Apellido Paterno: </b></font><?=$model->apellido_paterno?>
        </td>
        <td width="33%" align="right">
            <font  color="#CC0066;"><b>Apellido Materno: </b></font><?=$model->apellido_materno?>
        </td>
    </tr>
</table>
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="20%" align="left">
            <font  color="#CC0066;"><b>Estado Civil: </b></font><?=$model->edoCivil->desc_edo_civil?>
        </td>
        <td width="15%" align="center">
            <font  color="#CC0066;"><b>Sexo: </b></font><?=$model->sexo?>
        </td>
        <td width="35%" align="center">
            <font  color="#CC0066;"><b>Fecha de Nacimiento: </b></font><?=$model->fecha_nacimiento?>
        </td>
        <td width="30%" align="right">
            <font  color="#CC0066;"><b>Teléfono: </b></font><?=$model->telefono?>
        </td>
    </tr>
</table><br>

<div class="alert alert-success-general" role="alert">
    <strong>DIRECCIÓN DE LA VIVIENDA</strong>
    <i class="fa fa-user" aria-hidden="true"></i>
</div>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="50%" align="left">
            <font  color="#CC0066;"><b>Calle: </b></font><?=$model->calle?>
        </td>
        <td width="50%" align="right">
            <font  color="#CC0066;"><b>Colonia: </b></font><?=$model->colonia?>
        </td>
    </tr>
</table>
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="50%" align="left">
            <font  color="#CC0066;"><b>Número Exteror: </b></font><?=$model->num_ext?>
        </td>
        <td width="50%" align="right">
            <font  color="#CC0066;"><b>Número Interior: </b></font><?=$model->num_int?>
        </td>
    </tr>
</table>
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="25%" align="left">
            <font  color="#CC0066;"><b>Código Postal: </b></font><?=$model->codigo_postal?>
        </td>
        <td width="75%" align="right">
            <font  color="#CC0066;"><b>Rasgo Físico que ayude a ubicar la vivienda: </b></font><?=$model->otra_referencia ?>
        </td>
    </tr>
</table>
<hr class="style18">
<?php if($seguimiento):?>
    <b><p style="color:#CC0066; font-size: XX-large" align="center" >SEGUIMIENTO</p></b>

    <?php if($seguimiento->meta_piso == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>COLOCACIÓN DE PISO FIRME</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_piso ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $seguimiento->fecha_inicio_piso ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $seguimiento->fecha_entrega_piso ?>
                </td>
            </tr>
        </table>

    <?php endif; ?>

<?php endif; ?>
