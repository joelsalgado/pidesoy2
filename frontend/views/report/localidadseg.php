<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 19/04/2018
 * Time: 08:21 PM
 */


$this->title = 'Localidades';
$total = 0;
$seguimiento = new \common\models\Seguimiento();

?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Seguimiento</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <th>Localidad</th>
                <th>Numero de Seguimientos</th>
                <th>Semaforo por Localidad</th>
                <th>Detalles</th>
                </thead>
                <tbody>
                <?php $y=1; foreach ($model as $data){ ?>
                    <tr <?php if($y%2==0){ echo 'bgcolor="#9BBB59"'; }?>>
                        <td><b><?=  mb_convert_case($data->desc_loc, MB_CASE_TITLE, "UTF-8")?></b></td>
                        <td><?= $data->total ?></td>
                        <td><?= $seguimiento->getSemaforoLocalidad($data->loc_id) ?></td>
                        <td><?= \yii\helpers\Html::a('Excel',['/report/excelseg', 'id' => $data->loc_id]) ?> <br></td>
                        <?php $total = $total + $data->total ?>
                    </tr>
                    <?php $y++;} ?>
                <tr>
                    <td><b>Total</b></td>
                    <td><b><?= $total ?></b></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>
        </div>
        <table class="table table-bored">
            <thead>
            <tr>
                <th>Semaforo</th>
                <th>Descripción</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <img src="<?=Yii::$app->homeUrl?>images/1.png" height="30" width="30">
                </td>
                <td>
                    <p>Excelente (100%), cuando se cumple de manera amplia y en tiempo la acción a realizar.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="<?=Yii::$app->homeUrl?>images/2.png" height="30" width="30">
                </td>
                <td>
                    <p>Buena (91-99%), cuando se tiene un avance significativo de la acción/gestión.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="<?=Yii::$app->homeUrl?>images/3.png" height="30" width="30">
                </td>
                <td>
                    <p>Regular (61-90%), cuando esta cumple mínimamente con el avance de la acción/gestión</p>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="<?=Yii::$app->homeUrl?>images/4.png" height="30" width="30">
                </td>
                <td>
                    <p>Insuficiente (0-60%), cuando la acción/gestión solo se ha desarrollado de forma o no se ha iniciado</p>
                </td>
            </tr>
            </tbody>

        </table>
    </div>
</div>


