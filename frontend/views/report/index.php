<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:21 AM
 */

$this->title = 'Reporte';
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Total Nuevas Cedulas</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Region</th>
                <th>Total</th>
                </thead>
                <tbody>
                <?php foreach ($model as $data){ ?>
                <tr>
                    <td><?= $data->desc_region ?></td>
                    <td><?= $data->total ?></td>
                </tr>
        </div>
        <?php } ?>
        </tbody>
        </table>
    </div>
</div>




