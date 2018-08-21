<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 28/05/2018
 * Time: 11:39 AM
 */

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
            <td align="left" style="background-color: #BFBFBF;"><b>Nombre de la Acción</b></td>
            <td align="center" style="background-color: #BFBFBF;"><b>Acciones Totales</b></td>
            <td align="center" style="background-color: #BFBFBF;"><b>Acciones Concluidas</b></td>
            <td align="center" style="background-color: #BFBFBF;"><b>Acciones Pendientes</b></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left"><b><?= mb_convert_case('COLOCACIÓN DE PISO FIRME', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_piso?></td>
            <td align="center"><?=$model->acciones_piso?></td>
            <td align="center"><?=$model->meta_piso - $model->acciones_piso?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('COLOCACIÓN DE TECHO FIRME', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_techo?></td>
            <td align="center"><?=$model->acciones_techo?></td>
            <td align="center"><?=$model->meta_techo - $model->acciones_techo?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('COLOCACIÓN DE MURO FIRME', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_muro?></td>
            <td align="center"><?=$model->acciones_muro?></td>
            <td align="center"><?=$model->meta_muro - $model->acciones_muro?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('CONSTRUCCIÓN DE CUARTO ADICIONAL', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_cuarto?></td>
            <td align="center"><?=$model->acciones_cuarto?></td>
            <td align="center"><?=$model->meta_cuarto - $model->acciones_cuarto?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('VIVIENDAS CON ACCESO AL SERVICIO DE AGUA POTABLE (RED PÚBLICA)', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_agua_potable?></td>
            <td align="center"><?=$model->acciones_agua_potable?></td>
            <td align="center"><?=$model->meta_agua_potable - $model->acciones_agua_potable?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('VIVIENDAS CON CONEXIÓN DE TOMA DE AGUA AL INTERIOR DE LA VIVIENDA', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_agua_interior?></td>
            <td align="center"><?=$model->acciones_interior ?></td>
            <td align="center"><?=$model->meta_agua_interior - $model->acciones_agua_interior?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('VIVIENDAS CON CONEXIÓN AL DRENAJE PÚBLICO O BIOGIGESTORES', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_drenaje?></td>
            <td align="center"><?=$model->acciones_drenaje?></td>
            <td align="center"><?=$model->meta_drenaje - $model->acciones_drenaje?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('VIVIENDAS CON CONEXIÓN DE ENERGÍA ELÉCTRICA', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_luz?></td>
            <td align="center"><?=$model->acciones_luz?></td>
            <td align="center"><?=$model->meta_luz - $model->acciones_luz?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('VIVIENDAS CON ESTUFAS ENTREGADAS', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_estufa?></td>
            <td align="center"><?=$model->acciones_estufa?></td>
            <td align="center"><?=$model->meta_estufa - $model->acciones_estufa?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('AFILIADOS AL SEGURO POPULAR', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_seguro_popular?></td>
            <td align="center"><?=$model->acciones_seguro_popular?></td>
            <td align="center"><?=$model->meta_seguro_popular - $model->acciones_seguro_popular?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('PERSONAS DE 3 A 15 AÑOS QUE ASISTEN A LA ESCUELA', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_3_15_escuela?></td>
            <td align="center"><?=$model->acciones_3_15_escuela?></td>
            <td align="center"><?=$model->meta_3_15_escuela - $model->acciones_3_15_escuela?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('NACIDOS ANTES DE 1982 CON CERTIFICADO DE PRIMARIA', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_antes_1982_primaria?></td>
            <td align="center"><?=$model->acciones_antes_1982_primaria?></td>
            <td align="center"><?=$model->meta_antes_1982_primaria - $model->acciones_antes_1982_primaria?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('NACIDOS DESPUÉS DE 1982 CON CERTIFICADO DE SECUNDARIA', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_despues_1982_secundaria?></td>
            <td align="center"><?=$model->acciones_despues_1982_secundaria?></td>
            <td align="center"><?=$model->meta_despues_1982_secundaria - $model->acciones_despues_1982_secundaria?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('DESPENSAS POR ENTREGAR', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_despensas?></td>
            <td align="center"><?=$model->acciones_despensas?></td>
            <td align="center"><?=$model->meta_despensas - $model->acciones_despensas?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('TRABAJADOR AFILIADO A LA SEGURIDAD SOCIAL', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_ss?></td>
            <td align="center"><?=$model->acciones_ss?></td>
            <td align="center"><?=$model->meta_ss - $model->acciones_ss?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('BENEFICIARIOS DE TRABAJADORES CON ACCESO A LA SEGURIDAD SOCIAL', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_trabajadores_ss?></td>
            <td align="center"><?=$model->acciones_trabajadores_ss?></td>
            <td align="center"><?=$model->meta_trabajadores_ss - $model->acciones_trabajadores_ss?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('PERSONAS MAYORES DE 65 AÑOS INSCRITOS AL PROGRAMA DE PENSIONES', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><?=$model->meta_adultos_ss?></td>
            <td align="center"><?=$model->acciones_adultos_ss?></td>
            <td align="center"><?=$model->meta_adultos_ss - $model->acciones_adultos_ss?></td>
        </tr>
        <tr>
            <td align="left"><b><?= mb_convert_case('TOTAL', MB_CASE_TITLE, "UTF-8")?></b></td>
            <td align="center"><b><?=$model->meta_vivienda ?></b></td>
            <td align="center"><b><?=$model->acciones_vivienda?></b></td>
            <td align="center"><b><?=$model->meta_vivienda - $model->acciones_vivienda?></b></td>
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


