<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 09/04/2018
 * Time: 09:54 AM
 */

?>
<table class="table table-condensed">
    <tr>
        <td>
            <img class="rounded float-left" src="<?= Yii::$app->homeUrl ?>images/logoedo.png" height="75" width="75">
        </td>
        <td align="center">
            <p align="center" style="font-size: small"><b>SECRETARÍA DE DESARROLLO SOCIAL</b></p>
            <p align="center" style="font-size: small">FORMATO DE INFORMACIÓN SOCIO-POLÍTICA DE LA LOCALIDAD</p>
        </td>
        <td align="right">
            <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="75" width="75">
        </td>
    </tr>
</table>

<table class="table table-condensed" border="1">
    <thead>
    <tr>
        <th colspan="3" style="background-color:#a4a4a7" align="center">ANÁLISIS DE LA LOCALIDAD</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td align="center" style="background-color:#a4a4a7"><b>REGIÓN</b></td>
        <td align="center" style="background-color:#a4a4a7"><b>MUNICIPIO</b></td>
        <td align="center" style="background-color:#a4a4a7"><b>LOCALIDAD</b></td>
    </tr>
    <tr>
        <td align="center"><?= $model->region->desc_region ?></td>
        <td align="center"><?= $model->mun->desc_mun ?></td>
        <td align="center"><?= $model->loc->desc_loc ?></td>
    </tr>
    <tr>
        <td align="center" style="background-color:#a4a4a7"><b>No. DE HABITANTES</b></td>
        <td align="center" style="background-color:#a4a4a7"><b>OCUPANTES PROMEDIO POR VIVIENDA</b></td>
        <td align="center" style="background-color:#a4a4a7"><b>ÍNDICE DE MARGINACIÓN</b></td>
    </tr>
    <tr>
        <td align="center"><?= $model->num_habitantes ?></td>
        <td align="center"><?= $model->ocupantes_por_vivienda ?></td>
        <td align="center"><?= $model->indice_marginacion ?></td>
    </tr>
    <tr>
        <th colspan="3" style="background-color:#a4a4a7" align="center">ANÁLISIS DE LA LOCALIDAD</th>
    </tr>


</table>
