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
            <p align="center" style="font-size: small; color:#ff3d96;"><b>BITÁCORA DE REUNIONES POR COMUNIDAD</b></p>
        </td>
        <td align="right">
            <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="75" width="75">
        </td>
    </tr>
</table>

<table class="table table-bored">
    <tr>
        <td align="center" style="background-color: #df3b7a; color: white;">Clave del Estado</td>
        <td align="center" style="background-color: #df3b7a; color: white;">Municipio</td>
        <td align="center" style="background-color: #df3b7a; color: white;">Localidad</td>
    </tr>
    <tr>
        <td align="center"><b><?= $model->entidad_id ?></b></td>
        <td align="center"><b><?=$model->mun->desc_mun?></b></td>
        <td align="center"> <b><?=$model->loc->nombre_loc?></b></td>
    </tr>
    <tr>
        <td align="center" style="background-color: #df3b7a; color: white;">Nombre del Responsable Institucional</td>
        <td align="center" style="background-color: #df3b7a; color: white;">Nombre del Responsable Comunitario</td>
        <td align="center" style="background-color: #df3b7a; color: white;">Fecha</td>
    </tr>
    <tr>
        <td align="center"><b><?= $model->resp_institucional ?></b></td>
        <td align="center"><b><?= $model->resp_comunitario ?></b></td>
        <td align="center"><b><?= $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): '';         ?></b></td>
    </tr>
</table>
<br>

<table class="table table-bored">
    <thead>
        <tr>
            <td align="center" rowspan="2" style="background-color: #e2cae3;"><b>No</b></td>
            <td align="center" rowspan="2" style="background-color: #e2cae3;"><b>FECHA DE REUNIÓN</b></td>
            <td align="center" rowspan="2" style="background-color: #e2cae3;"><b>OBJETIVO DE LA REUNIÓN</b></td>
            <td align="center" colspan="3" style="background-color: #e2cae3;"><b>AUTORIDADES PRESENTES</b></td>
            <td align="center" rowspan="2" style="background-color: #e2cae3;"><b>ACUERDOS TOMADOS</b></td>
            <td align="center" rowspan="2" style="background-color: #e2cae3;"><b>OBSERVACIONES</b></td>
        </tr>
        <tr>
            <td align="center" style="background-color: #e2cae3;"><b>F</b></td>
            <td align="center" style="background-color: #e2cae3;"><b>E</b></td>
            <td align="center" style="background-color: #e2cae3;"><b>M</b></td>
        </tr>
    </thead>
    <tbody>
        <?php if($model2) : $i=1; foreach($model2 as $value){?>
            <tr>
                <td align="center"><?= $i++; ?></td>
                <td align="center"><?= $value->fechas ?></td>
                <td align="center"><?= $value->objetivo ?></td>
                <td align="center"><?= $value->autoridades_federales ?></td>
                <td align="center"><?= $value->autoridades_estatales ?></td>
                <td align="center"><?= $value->autoridades_municipales ?></td>
                <td align="center"><?= $value->acuerdos ?></td>
                <td align="center"><?= $value->observaciones ?></td>
            </tr>
        <?php }endif;?>
    </tbody>
</table>
<br>
<hr>
<br>
<table class="table table-condensed">

    <tr>
        <td></td>
        <td align="left" colspan="2">Claves:</td>
    </tr>
    <tr>
        <td></td>
        <td align="left">F</td>
        <td align="left">Federales</td>
    </tr>
    <tr>
        <td align="center">_________________________________________________</td>
        <td align="left">E</td>
        <td align="left">Estatales</td>
    </tr>
    <tr>
        <td align="center">Nombre y firma del responsable de la Bitácora </td>
        <td align="left">M</td>
        <td align="left">Municipales</td>
    </tr>
</table>