<?php
/**
 * Created by PhpStorm.
 * User: SEDESEM
 * Date: 24/04/2018
 * Time: 06:56 PM
 */
$this->title = 'Regiones';
$total_pobreza_extrema = 0;
$total_pobreza_moderada = 0;
$total_vulnerable_por_ingresos = 0;
$total_vulnerable_por_carencias = 0;
$total_no_vulnerable = 0;
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Resultados por Region</h3>
    </div>
    <div class="box-body">
        <?= \yii\helpers\Html::a('Excel', ['regiontotalexcel', 'excel' => $excel], ['class' => 'btn btn-success']) ?>
        <?= \yii\helpers\Html::a('Pdf', ['regiontotalpdf', 'excel' => $excel], ['class' => 'btn btn-danger']) ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Region</th>
                <th>Pobreza Extrema</th>
                <th>Pobreza Moderada</th>
                <th>Vulnerable por Ingresos</th>
                <th>Vulnerable por Carencias</th>
                <th>No Vulnerable, No Pobre</th>
                </thead>
                <tbody>
                <?php $y=1; foreach ($model as $data){ ?>
                    <tr <?php if($y%2==0){ echo 'bgcolor="#A8AC90"'; }?>>
                        <td><b><?= $data->desc_region ?></b></td>
                        <td><?= $data->pobreza_extrema ?></td>
                        <?php $total_pobreza_extrema = $total_pobreza_extrema +  $data->pobreza_extrema ?>
                        <td><?= $data->pobreza_moderada ?></td>
                        <?php $total_pobreza_moderada = $total_pobreza_moderada +  $data->pobreza_moderada ?>
                        <td><?= $data->vulnerable_por_ingresos ?></td>
                        <?php $total_vulnerable_por_ingresos = $total_vulnerable_por_ingresos +  $data->vulnerable_por_ingresos ?>
                        <td><?= $data->vulnerable_por_carencias ?></td>
                        <?php $total_vulnerable_por_carencias = $total_vulnerable_por_carencias +  $data->vulnerable_por_carencias ?>
                        <td><?= $data->no_vulnerable ?></td>
                        <?php $total_no_vulnerable = $total_no_vulnerable +  $data->no_vulnerable ?>
                    </tr>
                <?php $y++;} ?>
                <tr>
                    <td><b>TOTAL</b></td>
                    <td><b><?= $total_pobreza_extrema ?> </b></td>
                    <td><b><?= $total_pobreza_moderada ?> </b></td>
                    <td><b><?= $total_vulnerable_por_ingresos ?> </b></td>
                    <td><b><?= $total_vulnerable_por_carencias ?> </b></td>
                    <td><b><?= $total_no_vulnerable ?> </b></td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>
