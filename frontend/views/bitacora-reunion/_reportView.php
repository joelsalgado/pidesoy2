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
        <td style="background-color: #df3b7a; color: white;">Clave del Estado</td>
        <td style="background-color: #df3b7a; color: white;">Municipio</td>
        <td style="background-color: #df3b7a; color: white;">Localidad</td>
    </tr>
    <tr>
        <td><b><?= $model->entidad_id ?></b></td>
        <td><b><?=$model->mun->desc_mun?></b></td>
        <td> <b><?=$model->loc->nombre_loc?></b></td>
    </tr>
    <tr>
        <td style="background-color: #df3b7a; color: white;">Nombre del Responsable Institucional</td>
        <td style="background-color: #df3b7a; color: white;">Nombre del Responsable Comunitario</td>
        <td style="background-color: #df3b7a; color: white;">Fecha</td>
    </tr>
    <tr>
        <td><b><?= $model->resp_institucional ?></b></td>
        <td><b><?= $model->resp_comunitario ?></b></td>
        <td><b><?= $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): '';         ?></b></td>
    </tr>
</table>
<br>

<table class="table table-bored">
    <thead>
        <tr>
            <td align="center" rowspan="2">No</td>
            <td align="center" rowspan="2">FECHA DE REUNIÓN</td>
            <td align="center" rowspan="2">OBJETIVO DE LA REUNIÓN</td>
            <td align="center" colspan="3">AUTORIDADES PRESENTES</td>
            <td align="center" rowspan="2">ACUERDOS TOMADOS</td>
            <td align="center" rowspan="2">OBSERVACIONES</td>
        </tr>
        <tr>
            <td align="center">F</td>
            <td align="center">E</td>
            <td align="center">M</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center">1</td>
            <td align="center">22/05/17</td>
            <td align="center">OBJETIVO</td>
            <td align="center">55</td>
            <td align="center">85</td>
            <td align="center">95</td>
            <td align="center">Acuerdos</td>
            <td align="center">Observaciones</td>
        </tr>
    </tbody>

</table>
