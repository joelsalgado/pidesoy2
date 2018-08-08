<?php
/**
 * Created by PhpStorm.
 * User: SEDESEM
 * Date: 07/08/2018
 * Time: 10:52 PM
 */
?>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td rowspan="2"  width="15%">
            <img  src="<?= Yii::$app->homeUrl ?>images/colors.png" width="160" height="55">
        </td>
        <td align="left" width="85%">
            <b><p style="color:#9BBB59; font-size: xx-small">FAMILIAS FUERTES, COMUNIDADES CON TODO</p></b>
        </td>
    </tr>
    <tr>
        <td align="right" style="background-color: #9BBB59; color: white;" width="85%">
            <b><p>REPORTE CENSO DE LA LOCALIDAD: <?= $model->desc_loc?></p></b>
        </td>
    </tr>
</table><br>

<div class="alert alert-success-censo" role="alert">
    <b>5 Necesidades más importantes de la localidad</b>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Necesidad</p></b></td>
    </tr>
    </thead>
    <tbody>
    <?php if($model) : $i=1; foreach($necesidades as $value){?>
        <tr>
            <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value ?></p></td>
    <?php }endif;?>
    </tbody>
</table>

<div class="alert alert-success-censo" role="alert">
    <b>5 aspectos que más necesita la localidad</b>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Lo que necesita:</p></b></td>
    </tr>
    </thead>
    <tbody>
    <?php if($model) : $i=1; foreach($necesita as $value){?>
        <tr>
            <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value ?></p></td>
    <?php }endif;?>
    </tbody>
</table>

<div class="alert alert-success-censo" role="alert">
    <b>Es miembro de alguna organización de vecinos u otro grupo comunitario</b>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Si</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No</p></b></td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $model->grupo_comunitario_si?></td>
        <td><?= $model->grupo_comunitario_no?></td>
    </tr>
    </tbody>
</table>
<div class="alert alert-success-censo" role="alert">
    <b>Le gustaría participar con las autoridades municipales y estatales para mejorar las condiciones de su localidad y vivienda</b>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Si</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No</p></b></td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $model->autoridades_estatales_si?></td>
        <td><?= $model->autoridades_estatales_no?></td>
    </tr>
    </tbody>
</table>
<div class="alert alert-success-censo" role="alert">
    <b>Cuenta con tiempo disponible para participar en las acciones de mejora para su localidad y vivienda</b>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Si</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No</p></b></td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $model->acciones_si?></td>
        <td><?= $model->acciones_no?></td>
    </tr>
    </tbody>
</table>
