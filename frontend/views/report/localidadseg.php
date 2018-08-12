<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 19/04/2018
 * Time: 08:21 PM
 */


$this->title = 'Localidades';
$total = 0;

?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Seguimiento</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Localidad</th>
                <th>Numero de Seguimientos</th>
                <th>Detalles</th>
                </thead>
                <tbody>
                <?php $y=1; foreach ($model as $data){ ?>
                    <tr <?php if($y%2==0){ echo 'bgcolor="#9BBB59"'; }?>>
                        <td><b><?=  mb_convert_case($data->desc_loc, MB_CASE_TITLE, "UTF-8")?></b></td>
                        <td><?= $data->total ?></td>
                        <td><?= \yii\helpers\Html::a('Ver',['/report/excelseg', 'id' => $data->loc_id]) ?> <br></td>
                        <?php $total = $total + $data->total ?>
                    </tr>
                    <?php $y++;} ?>
                <tr>
                    <td><b>Total</b></td>
                    <td><b><?= $total ?></b></td>
                    <td></td>
                </tbody>
            </table>
        </div>
    </div>
</div>
