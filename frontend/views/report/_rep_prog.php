<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 7/11/18
 * Time: 05:59 PM
 */
$sumaad1 = 0;
$sumaad2 = 0;
?>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td width="50%">
            <p style="color:#CC0066; font-size: medium" xmlns="http://www.w3.org/1999/html">
                <b>FAMILIAS FUERTES, COMUNIDADES CON TODO</b>
            </p>
        </td>
        <td align="right" width="50%">
            <p style="color:#CC0066; font-size: medium" xmlns="http://www.w3.org/1999/html">
                <b>REPORTE DE PROGRAMAS</b>
            </p>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td rowspan="2"  width="15%">
            <img  src="<?= Yii::$app->homeUrl ?>images/colors.png" width="160" height="55">
        </td>
        <td align="right" style="background-color: #CC0066; color: white;" width="85%">
            <b>
                <p>
                    MUNICIPIO: <?=$municipio?>
                </p>
            </b>
        </td>
    </tr>
    <tr>
        <td align="right" style="background-color: #CC0066; color: white;" width="85%">
            <b><p>LOCALIDAD: <?= $localidad ?></p></b>
        </td>
    </tr>
</table><br>

<?php if ($model) :?>
    <div class="alert alert-success-seg" role="alert">
        <b>SEGUIMIENTO</b>
    </div>


    <table class="table table-bored">
        <thead>
        <tr>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No.</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Nombre del Programa</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Entregas Totales</p></b></td>
        </tr>
        </thead>
        <tbody>
        <?php if($model) : $i=1; foreach($model as $value){?>
            <tr>
                <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->programa_piso ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->total ?></p></td>
                <?php
                $sumaad1 = $sumaad1 + $value->total;
                ?>
            </tr>
        <?php }endif;?>

        <tr>
            <td align="center"><p style="font-size: 7pt"></p></td>
            <td align="center"><p style="font-size: 7pt"><b>Total</b></p></td>
            <td align="center"><p style="font-size: 7pt"><b><?= $sumaad1 ?></b></p></td>
        </tr>
        </tbody>
    </table>
<?php endif;?>

<?php if ($query) :?>
    <div class="alert alert-success-seg" role="alert">
        <b>ADICIONALES</b>
    </div>


    <table class="table table-bored">
        <thead>
        <tr>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No.</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Nombre del Programa</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Entregas Totales</p></b></td>
        </tr>
        </thead>
        <tbody>
        <?php if($query) : $i=1; foreach($query as $value){?>
            <tr>
                <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->programa ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->total ?></p></td>
                <?php
                $sumaad2 = $sumaad2 + $value->total;
                ?>
            </tr>
        <?php }endif;?>

        <tr>
            <td align="center"><p style="font-size: 7pt"></p></td>
            <td align="center"><p style="font-size: 7pt"><b>Total</b></p></td>
            <td align="center"><p style="font-size: 7pt"><b><?= $sumaad2 ?></b></p></td>
        </tr>
        </tbody>
    </table>
<?php endif;?>
