<?php
/**
 * Created by PhpStorm.
 * User: SEDESEM
 * Date: 26/04/2018
 * Time: 05:49 PM
 */

$total_pobreza_extrema = 0;
$total_pobreza_moderada = 0;
$total_vulnerable_por_ingresos = 0;
$total_vulnerable_por_carencias = 0;
$total_no_vulnerable = 0;
?>

<table class="table table-condensed">
    <tr>
        <td>
            <img class="rounded float-left" src="<?= Yii::$app->homeUrl ?>images/logoedo.png" height="75" width="75">
        </td>
        <td align="center">
            <p align="center" style="font-size: small"><b>SECRETARÍA DE DESARROLLO SOCIAL</b></p>
            <p align="center" style="font-size: small">RESULTADOS POR REGION</p>
        </td>
        <td align="right">
            <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="75" width="75">
        </td>
    </tr>
</table>


<table class="table table-bored">
    <thead>
    <tr>
        <th colspan="12" align="center">RESULTADOS POR REGION</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>REGION</b></td>
        <td colspan="1" align="center" ><b>Pobreza Extrema</b></td>
        <td colspan="1" align="center" ><b>Pobreza Moderada</b></td>
        <td colspan="1" align="center" ><b>Vulnerable por Ingresos</b></td>
        <td colspan="1" align="center" ><b>Vulnerable por Carencias</b></td>
        <td colspan="1" align="center" ><b>No Vulnerable, No Pobre</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_region ?></b></td>
            <td align="center"><?= $data->pobreza_extrema ?></td>
            <?php $total_pobreza_extrema = $total_pobreza_extrema +  $data->pobreza_extrema ?>
            <td align="center"><?= $data->pobreza_moderada ?></td>
            <?php $total_pobreza_moderada = $total_pobreza_moderada +  $data->pobreza_moderada ?>
            <td align="center"><?= $data->vulnerable_por_ingresos ?></td>
            <?php $total_vulnerable_por_ingresos = $total_vulnerable_por_ingresos +  $data->vulnerable_por_ingresos ?>
            <td align="center"><?= $data->vulnerable_por_carencias ?></td>
            <?php $total_vulnerable_por_carencias = $total_vulnerable_por_carencias +  $data->vulnerable_por_carencias ?>
            <td align="center"><?= $data->no_vulnerable ?></td>
            <?php $total_no_vulnerable = $total_no_vulnerable +  $data->no_vulnerable ?>
        </tr>
    <?php } ?>
        <tr>
            <td align="center"><b>TOTAL</b></td>
            <td align="center"><b><?= $total_pobreza_extrema ?> </b></td>
            <td align="center"><b><?= $total_pobreza_moderada ?> </b></td>
            <td align="center"><b><?= $total_vulnerable_por_ingresos ?> </b></td>
            <td align="center"><b><?= $total_vulnerable_por_carencias ?> </b></td>
            <td align="center"><b><?= $total_no_vulnerable ?> </b></td>
        </tr>
    </tbody>
</table>