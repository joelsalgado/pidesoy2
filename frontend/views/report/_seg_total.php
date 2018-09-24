<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 28/05/2018
 * Time: 11:39 AM
 */


$suma1 = $model->meta_piso + $model->meta_techo + $model->meta_muro + $model->meta_cuarto + $model->meta_agua_potable+$model->meta_agua_interior + $model->meta_drenaje + $model->meta_luz + $model->meta_estufa + $model->meta_seguro_popular + $model->meta_3_15_escuela + $model->meta_antes_1982_primaria + $model->meta_despues_1982_secundaria + $model->meta_despensas + $model->meta_ss + $model->meta_adultos_ss;


$suma2 = $model->acciones_piso + $model->acciones_techo + $model->acciones_muro + $model->acciones_cuarto + $model->acciones_agua_potable + $model->acciones_agua_interior + $model->acciones_drenaje + $model->acciones_luz + $model->acciones_estufa + $model->acciones_seguro_popular + $model->acciones_3_15_escuela + $model->acciones_antes_1982_primaria + $model->acciones_despues_1982_secundaria + $model->acciones_despensas + $model->acciones_ss + $model->acciones_adultos_ss ;

$sumaad1 = 0;
$sumaad2 = 0;
$sumaad3 = 0;

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
                    <b>REPORTE DE SEGUIMIENTO</b>
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
            <b><p>LOCALIDAD: <?= $model->desc_loc ?></p></b>
        </td>
    </tr>
</table><br>



<table border="4" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">

    <tr>
        <td width="30%" align="right"><b>Número de Viviendas Censadas:</b></td>
        <td width="10%" align="center"><?=$model->total ?></td>
    </tr>
    <tr>
        <td width="30%" align="right"><b>Número de Familias:</b></td>
        <td width="10%" align="center"><?=$model->num_familias ?></td>
    </tr>
    <tr>
        <td width="30%" align="right"><b>Número de Habitantes:</b></td>
        <td width="10%" align="center"><?=$model->num_personas ?></td>
    </tr>

</table><br>



<div class="alert alert-success-seg" role="alert">
    <b>AVANCE</b>
</div>

<table border="4" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">

        <tr>
            <td width="35%" align="center"><b>Semaforos</b></td>
            <td width="15%" align="center"><b>Total</b></td>
            <td width="50%" align="center"><b>Semaforo de la Localidad</b></td>
        </tr>
        <tr>
            <td width="35%" align="center"><img src="<?= Yii::$app->homeUrl ?>images/1.png" height="30" width="30"> Excelente</td>
            <td width="15%" align="center"><?=$semaforos ["excelente"]?></td>
            <td width="50%" align="center" rowspan="4"><?=$semaforo ?></td>
        </tr>
        <tr>
            <td width="35%" align="center"><img src="<?= Yii::$app->homeUrl ?>images/2.png" height="30" width="30"> Bueno</td>
            <td width="15%" align="center"><?=$semaforos ["bueno"]?></td>
        </tr>
        <tr>
            <td width="35%" align="center"><img src="<?= Yii::$app->homeUrl ?>images/3.png" height="30" width="30"> Regular</td>
            <td width="15%" align="center"><?=$semaforos ["regular"]?></td>
        </tr>
        <tr>
            <td width="35%" align="center"><img src="<?= Yii::$app->homeUrl ?>images/4.png" height="30" width="30"> Insuficiente</td>
            <td width="15%" align="center"><?=$semaforos ["insuficiente"]?></td>
        </tr>
</table>
<br>
<div class="alert alert-success-seg" role="alert">
    <b>RESUMEN SEGUIMIENTO</b>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <td align="left" style="background-color: #BFBFBF;"><b>N.P.</b></td>
            <td align="left" style="background-color: #BFBFBF;"><b>Nombre de la Acción</b></td>
            <td align="center" style="background-color: #BFBFBF;"><b>Acciones Totales</b></td>
            <td align="center" style="background-color: #BFBFBF;"><b>Acciones Concluidas</b></td>
            <td align="center" style="background-color: #BFBFBF;"><b>Acciones Pendientes</b></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left">1</td>
            <td align="left"><b><?= mb_convert_case('Colocación de Piso Firme', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_piso?></td>
            <td align="center"><?=$model->acciones_piso?></td>
            <td align="center"><?=$model->meta_piso - $model->acciones_piso?></td>
        </tr>
        <tr>
            <td align="left">2</td>
            <td align="left"><b><?= mb_convert_case('Colocación de Techo Firme', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_techo?></td>
            <td align="center"><?=$model->acciones_techo?></td>
            <td align="center"><?=$model->meta_techo - $model->acciones_techo?></td>
        </tr>
        <tr>
            <td align="left">3</td>
            <td align="left"><b><?= mb_convert_case('Colocación de Muro Firme', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_muro?></td>
            <td align="center"><?=$model->acciones_muro?></td>
            <td align="center"><?=$model->meta_muro - $model->acciones_muro?></td>
        </tr>
        <tr>
            <td align="left">4</td>
            <td align="left"><b><?= mb_convert_case('Construcción de Cuarto Adicional', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_cuarto?></td>
            <td align="center"><?=$model->acciones_cuarto?></td>
            <td align="center"><?=$model->meta_cuarto - $model->acciones_cuarto?></td>
        </tr>
        <tr>
            <td align="left">5</td>
            <td align="left"><b><?= mb_convert_case('Viviendas sin acceso al Servicio de agua potable (Red Pública)', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_agua_potable?></td>
            <td align="center"><?=$model->acciones_agua_potable?></td>
            <td align="center"><?=$model->meta_agua_potable - $model->acciones_agua_potable?></td>
        </tr>
        <tr>
            <td align="left">6</td>
            <td align="left"><b><?= mb_convert_case('Viviendas sin toma de agua al interior de la vivienda', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_agua_interior?></td>
            <td align="center"><?=$model->acciones_agua_interior ?></td>
            <td align="center"><?=$model->meta_agua_interior - $model->acciones_agua_interior?></td>
        </tr>
        <tr>
            <td align="left">7</td>
            <td align="left"><b><?= mb_convert_case('Viviendas sin conexión al drenaje público ó biodigestores', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_drenaje?></td>
            <td align="center"><?=$model->acciones_drenaje?></td>
            <td align="center"><?=$model->meta_drenaje - $model->acciones_drenaje?></td>
        </tr>
        <tr>
            <td align="left">8</td>
            <td align="left"><b><?= mb_convert_case('Viviendas sin servicio de energía eléctrica', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_luz?></td>
            <td align="center"><?=$model->acciones_luz?></td>
            <td align="center"><?=$model->meta_luz - $model->acciones_luz?></td>
        </tr>
        <tr>
            <td align="left">9</td>
            <td align="left"><b><?= mb_convert_case('Viviendas con necesidad de estufa ecológica', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_estufa?></td>
            <td align="center"><?=$model->acciones_estufa?></td>
            <td align="center"><?=$model->meta_estufa - $model->acciones_estufa?></td>
        </tr>
        <tr>
            <td align="left">10</td>
            <td align="left"><b><?= mb_convert_case('Personas sin acceso al servicio de salud (Seguro Popular)', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_seguro_popular?></td>
            <td align="center"><?=$model->acciones_seguro_popular?></td>
            <td align="center"><?=$model->meta_seguro_popular - $model->acciones_seguro_popular?></td>
        </tr>
        <tr>
            <td align="left">11</td>
            <td align="left"><b><?= mb_convert_case('Personas de 3 A 15 años que no asisten a la escuela', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_3_15_escuela?></td>
            <td align="center"><?=$model->acciones_3_15_escuela?></td>
            <td align="center"><?=$model->meta_3_15_escuela - $model->acciones_3_15_escuela?></td>
        </tr>
        <tr>
            <td align="left">12</td>
            <td align="left"><b><?= mb_convert_case('Personas mayores de 35 años sin Certificado de Primaria', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_antes_1982_primaria?></td>
            <td align="center"><?=$model->acciones_antes_1982_primaria?></td>
            <td align="center"><?=$model->meta_antes_1982_primaria - $model->acciones_antes_1982_primaria?></td>
        </tr>
        <tr>
            <td align="left">13</td>
            <td align="left"><b><?= mb_convert_case('Personas menores de 35 años  sin Certificado de Secundaria', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_despues_1982_secundaria?></td>
            <td align="center"><?=$model->acciones_despues_1982_secundaria?></td>
            <td align="center"><?=$model->meta_despues_1982_secundaria - $model->acciones_despues_1982_secundaria?></td>
        </tr>
        <tr>
            <td align="left">14</td>
            <td align="left"><b><?= mb_convert_case('Necesidad Alimentaria (Despensa)', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_despensas?></td>
            <td align="center"><?=$model->acciones_despensas?></td>
            <td align="center"><?=$model->meta_despensas - $model->acciones_despensas?></td>
        </tr>
        <tr>
            <td align="left">15</td>
            <td align="left"><b><?= mb_convert_case('Personas que trabajan sin acceso a seguridad social', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_ss?></td>
            <td align="center"><?=$model->acciones_ss?></td>
            <td align="center"><?=$model->meta_ss - $model->acciones_ss?></td>
        </tr>
        <tr>
            <td align="left">16</td>
            <td align="left"><b><?= mb_convert_case('Personas mayores de 65 años que no reciben pensión', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_adultos_ss?></td>
            <td align="center"><?=$model->acciones_adultos_ss?></td>
            <td align="center"><?=$model->meta_adultos_ss - $model->acciones_adultos_ss?></td>
        </tr>
        <tr>
            <td></td>
            <td align="left"><b><?= mb_convert_case('TOTAL', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><b><?=$suma1 ?></b></td>
            <td align="center"><b><?=$suma2?></b></td>
            <td align="center"><b><?=$suma1 - $suma2?></b></td>
        </tr>
    </tbody>

</table>
<br>
<br>
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

<br>

<?php if ($adicionales) :?>
    <pagebreak></pagebreak>
<div class="alert alert-success-seg" role="alert">
    <b>ACCIONES ADICIONALES</b>
</div>


    <table class="table table-bored">
        <thead>
        <tr>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No.</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Nombre de la Acción</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Acciones Totales</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Acciones Concluidas</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Acciones Pendientes</p></b></td>
        </tr>
        </thead>
        <tbody>
        <?php if($adicionales) : $i=1; foreach($adicionales as $value){?>
            <tr>
                <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->nombre_accion ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->total ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->acciones ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $valor1 = $value->total - $value->acciones?></p></td>
                <?php
                    $sumaad1 = $sumaad1 + $value->total;
                    $sumaad2 = $sumaad2 + $value->acciones;
                    $sumaad3 = $sumaad3 + $valor1;
                ?>
            </tr>
        <?php }endif;?>

        <tr>
            <td align="center"><p style="font-size: 7pt"></p></td>
            <td align="center"><p style="font-size: 7pt"><b>Total</b></p></td>
            <td align="center"><p style="font-size: 7pt"><b><?= $sumaad1 ?></b></p></td>
            <td align="center"><p style="font-size: 7pt"><b><?= $sumaad2 ?></b></p></td>
            <td align="center"><p style="font-size: 7pt"><b><?= $sumaad3?></b></p></td>
        </tr>
        </tbody>
    </table>
<?php endif;?>


