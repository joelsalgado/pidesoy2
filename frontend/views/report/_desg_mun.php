<?php
/**
 * Created by PhpStorm.
 * User: SEDESEM
 * Date: 25/04/2018
 * Time: 08:50 PM
 */

$this->title = 'Municipios';
$total_num_personas = 0;
$total_per_0_15 = 0;
$total_per_16_17 = 0;
$total_per_18_64 = 0;
$total_per_65_mas = 0;
$total_vivienda_propia = 0;
$total_vivienda_compartida = 0;
$total_vivienda_prestada = 0;
$total_vivienda_rentada = 0;
$total_num_familias = 0;
$total_sin_piso = 0;
$total_sin_techo = 0;
$total_sin_muro = 0;
$total_hacentamiento = 0;
$total_agua_interior = 0;
$total_servicio_agua = 0;
$total_falta_drenaje = 0;
$total_falta_conectar = 0;
$total_falta_luz = 0;
$total_cocina_gas = 0;
$total_cocina_luz = 0;
$total_cocina_lena = 0;
$total_cocina_carbon = 0;
$total_cocina_otro = 0;
$total_falta_chimenea = 0;
$total_falta_excusado = 0;
$total_falta_refrigerador = 0;
$total_falta_lavadora = 0;
$total_educ_trunca_3_15 = 0;
$total_educ_no_asiste_3_15 = 0;
$total_educ_no_prim_35 = 0;
$total_educ_sec_inc_16_35 = 0;
$total_educ_analfabeta_may_15 = 0;
$total_educ_prim_inc_may_15 = 0;
$total_educ_no_asiste_6_14 = 0;
$total_salud_recibe = 0;
$total_seguro_popular = 0;
$total_issemyn = 0;
$total_imss = 0;
$total_marina_sedena = 0;
$total_isste = 0;
$total_pemex = 0;
$total_otro_serv_med = 0;
$total_ss_trabajo_formal = 0;
$total_ss_trabajo_sin = 0;
$total_ss_adultos_may_sin = 0;
$total_cuantos_ingresos = 0;
$total_jefe_familia = 0;
$total_jefa_familia = 0;
$total_hijo = 0;
$total_autoingreso = 0;
$total_apoyo_gobierno = 0;
$total_apoyo_extranjero = 0;
$total_pension = 0;
$total_madre_soltera_labora = 0;
$total_menor_poca_variedad = 0;
$total_menor_falta_alimentos = 0;
$total_menor_menor_porcion = 0;
$total_menor_hambre = 0;
$total_menor_acosto_hambre = 0;
$total_menor_sin_comer_dia = 0;
$total_adulto_poca_variedad = 0;
$total_adulto_falta_alimentos = 0;
$total_adulto_menor_porcion = 0;
$total_quedaron_sin_comida = 0;
$total_adulto_hambre = 0;
$total_adulto_sin_comer_dia = 0;
$total_vinc_prog_liconsa = 0;
$total_vinc_prog_diconsa = 0;
$total_vinc_prog_abastece_diconsa = 0;
$total_vinc_prog_comedor = 0;
$total_vinc_prog_asiste_comedor = 0;
$total_vinc_prog_acceso = 0;
$total_vinc_prog_prospera = 0;

?>




<table>
    <thead>
    <tr>
        <th colspan="12" align="center">IDENTIFICACIÓN DE HOGARES Y RESIDENTES</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>Habitantes</b></td>
        <td colspan="1" align="center" ><b>Personas de 0 a 15</b></td>
        <td colspan="1" align="center" ><b>Personas de 16 a 17</b></td>
        <td colspan="1" align="center" ><b>Personas de 18 a 64</b></td>
        <td colspan="1" align="center" ><b>Personas de 65 o más</b></td>
        <td colspan="1" align="center" ><b>Vivienda Propia</b></td>
        <td colspan="1" align="center" ><b>Vivienda Compartida</b></td>
        <td colspan="1" align="center" ><b>Vivienda Prestada</b></td>
        <td colspan="1" align="center" ><b>Vivienda Rentada</b></td>
        <td colspan="1" align="center" ><b>Número de Familias</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->num_personas ?></td>
            <?php $total_num_personas = $total_num_personas + $data->num_personas ?>
            <td align="center"><?= $data->per_0_15 ?></td>
            <?php $total_per_0_15 = $total_per_0_15 + $data->per_0_15 ?>
            <td align="center"><?= $data->per_16_17 ?></td>
            <?php $total_per_16_17 = $total_per_16_17 + $data->per_16_17 ?>
            <td align="center"><?= $data->per_18_64 ?></td>
            <?php $total_per_18_64 = $total_per_18_64 + $data->per_18_64 ?>
            <td align="center"><?= $data->per_65_mas ?></td>
            <?php $total_per_65_mas = $total_per_65_mas + $data->per_65_mas ?>
            <td align="center"><?= $data->vivienda_propia ?></td>
            <?php $total_vivienda_propia = $total_vivienda_propia + $data->vivienda_propia ?>
            <td align="center"><?= $data->vivienda_compartida ?></td>
            <?php $total_vivienda_compartida = $total_vivienda_compartida + $data->vivienda_compartida ?>
            <td align="center"><?= $data->vivienda_prestada ?></td>
            <?php $total_vivienda_prestada = $total_vivienda_prestada + $data->vivienda_prestada ?>
            <td align="center"><?= $data->vivienda_rentada ?></td>
            <?php $total_vivienda_rentada = $total_vivienda_rentada + $data->vivienda_rentada ?>
            <td align="center"><?= $data->num_familias ?></td>
            <?php $total_num_familias = $total_num_familias + $data->num_familias ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_num_personas ?></b></td>
        <td align="center"><b><?= $total_per_0_15 ?></b></td>
        <td align="center"><b><?= $total_per_16_17 ?></b></td>
        <td align="center"><b><?= $total_per_18_64 ?></b></td>
        <td align="center"><b><?= $total_per_65_mas ?></b></td>
        <td align="center"><b><?= $total_vivienda_propia ?></b></td>
        <td align="center"><b><?= $total_vivienda_compartida ?></b></td>
        <td align="center"><b><?= $total_vivienda_prestada ?></b></td>
        <td align="center"><b><?= $total_vivienda_rentada ?></b></td>
        <td align="center"><b><?= $total_num_familias ?></b></td>
    </tr>
    </tbody>
</table>

<pagebreak />



<table>
    <thead>
    <tr>
        <th colspan="12" align="center">CALIDAD Y ESPACIOS DE LA VIVIENDA (CARACTERÍSTICAS DE LA VIVIENDA)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>Sin Piso Firme</b></td>
        <td colspan="1" align="center" ><b>Sin Techo Firme</b></td>
        <td colspan="1" align="center" ><b>Sin Muros Firmes</b></td>
        <td colspan="1" align="center" ><b>Hacinamiento</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->sin_piso ?></td>
            <?php $total_sin_piso = $total_sin_piso + $data->sin_piso ?>
            <td align="center"><?= $data->sin_techo ?></td>
            <?php $total_sin_techo = $total_sin_techo + $data->sin_techo ?>
            <td align="center"><?= $data->sin_muro ?></td>
            <?php $total_sin_muro = $total_sin_muro + $data->sin_muro ?>
            <td align="center"><?= $data->hacentamiento ?></td>
            <?php $total_hacentamiento = $total_hacentamiento + $data->hacentamiento ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_sin_piso ?></b></td>
        <td align="center"><b><?= $total_sin_techo ?></b></td>
        <td align="center"><b><?= $total_sin_muro ?></b></td>
        <td align="center"><b><?= $total_hacentamiento ?></b></td>
    </tr>
    </tbody>
</table>

<pagebreak />


<table>
    <thead>
    <tr>
        <th colspan="15" align="center">ACCESO A LOS SERVICIOS BÁSICOS EN LA VIVIENDA</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>Falta llevar toma de agua al interior</b></td>
        <td colspan="1" align="center" ><b>Falta Servicio de Agua Potable</b></td>
        <td colspan="1" align="center" ><b>Falta Drenaje</b></td>
        <td colspan="1" align="center" ><b>Falta conectar drenaje a red pública</b></td>
        <td colspan="1" align="center" ><b>Falta Electricidad</b></td>
        <td colspan="1" align="center" ><b>Cocina con gas</b></td>
        <td colspan="1" align="center" ><b>Cocina con electricidad</b></td>
        <td colspan="1" align="center" ><b>Cocina con leña</b></td>
        <td colspan="1" align="center" ><b>Cocina con carbon</b></td>
        <td colspan="1" align="center" ><b>Cocina con otro</b></td>
        <td colspan="1" align="center" ><b>Falta Chimenea</b></td>
        <td colspan="1" align="center" ><b>Falta Excusado</b></td>
        <td colspan="1" align="center" ><b>Falta Refrigerador</b></td>
        <td colspan="1" align="center" ><b>Falta Lavadora</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->agua_interior ?></td>
            <?php $total_agua_interior = $total_agua_interior + $data->agua_interior ?>
            <td align="center"><?= $data->servicio_agua ?></td>
            <?php $total_servicio_agua = $total_servicio_agua + $data->servicio_agua ?>
            <td align="center"><?= $data->falta_drenaje ?></td>
            <?php $total_falta_drenaje = $total_falta_drenaje + $data->falta_drenaje ?>
            <td align="center"><?= $data->falta_conectar ?></td>
            <?php $total_falta_conectar = $total_falta_conectar + $data->falta_conectar ?>
            <td align="center"><?= $data->falta_luz ?></td>
            <?php $total_falta_luz = $total_falta_luz + $data->falta_luz ?>
            <td align="center"><?= $data->cocina_gas ?></td>
            <?php $total_cocina_gas = $total_cocina_gas + $data->cocina_gas ?>
            <td align="center"><?= $data->cocina_luz ?></td>
            <?php $total_cocina_luz = $total_cocina_luz + $data->cocina_luz ?>
            <td align="center"><?= $data->cocina_lena ?></td>
            <?php $total_cocina_lena = $total_cocina_lena + $data->cocina_lena ?>
            <td align="center"><?= $data->cocina_carbon ?></td>
            <?php $total_cocina_carbon = $total_cocina_carbon + $data->cocina_carbon ?>
            <td align="center"><?= $data->cocina_otro ?></td>
            <?php $total_cocina_otro = $total_cocina_otro + $data->cocina_otro ?>
            <td align="center"><?= $data->falta_chimenea ?></td>
            <?php $total_falta_chimenea = $total_falta_chimenea + $data->falta_chimenea ?>
            <td align="center"><?= $data->falta_excusado ?></td>
            <?php $total_falta_excusado = $total_falta_excusado + $data->falta_excusado ?>
            <td align="center"><?= $data->falta_refrigerador ?></td>
            <?php $total_falta_refrigerador = $total_falta_refrigerador + $data->falta_refrigerador ?>
            <td align="center"><?= $data->falta_lavadora ?></td>
            <?php $total_falta_lavadora = $total_falta_lavadora + $data->falta_lavadora ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_agua_interior ?></b></td>
        <td align="center"><b><?= $total_servicio_agua ?></b></td>
        <td align="center"><b><?= $total_falta_drenaje ?></b></td>
        <td align="center"><b><?= $total_falta_conectar ?></b></td>
        <td align="center"><b><?= $total_falta_luz ?></b></td>
        <td align="center"><b><?= $total_cocina_gas ?></b></td>
        <td align="center"><b><?= $total_cocina_luz ?></b></td>
        <td align="center"><b><?= $total_cocina_lena ?></b></td>
        <td align="center"><b><?= $total_cocina_carbon ?></b></td>
        <td align="center"><b><?= $total_cocina_otro ?></b></td>
        <td align="center"><b><?= $total_falta_chimenea ?></b></td>
        <td align="center"><b><?= $total_falta_excusado ?></b></td>
        <td align="center"><b><?= $total_falta_refrigerador ?></b></td>
        <td align="center"><b><?= $total_falta_lavadora ?></b></td>
    </tr>
    </tbody>
</table>


<pagebreak />


<table>
    <thead>
    <tr>
        <th colspan="12" align="center">EDUCACIÓN</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>Menor con estudios truncados</b></td>
        <td colspan="1" align="center" ><b>Menor que no asiste a estudiar</b></td>
        <td colspan="1" align="center" ><b>Mayor a 35 sin educación básica</b></td>
        <td colspan="1" align="center" ><b>Habitante entre 16 y 35 sin educación básica</b></td>
        <td colspan="1" align="center" ><b>Mayor a 15 con analfabetismo</b></td>
        <td colspan="1" align="center" ><b>Mayor a 15 con primaria incompleta</b></td>
        <td colspan="1" align="center" ><b>Habitante entre 6 y 14 que no asiste a estudiar</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->educ_trunca_3_15 ?></td>
            <?php $total_educ_trunca_3_15 = $total_educ_trunca_3_15 + $data->educ_trunca_3_15 ?>
            <td align="center"><?= $data->educ_no_asiste_3_15 ?></td>
            <?php $total_educ_no_asiste_3_15 = $total_educ_no_asiste_3_15 + $data->educ_no_asiste_3_15 ?>
            <td align="center"><?= $data->educ_no_prim_35 ?></td>
            <?php $total_educ_no_prim_35 = $total_educ_no_prim_35 + $data->educ_no_prim_35 ?>
            <td align="center"><?= $data->educ_sec_inc_16_35 ?></td>
            <?php $total_educ_sec_inc_16_35 = $total_educ_sec_inc_16_35 + $data->educ_sec_inc_16_35 ?>
            <td align="center"><?= $data->educ_analfabeta_may_15 ?></td>
            <?php $total_educ_analfabeta_may_15 = $total_educ_analfabeta_may_15 + $data->educ_analfabeta_may_15 ?>
            <td align="center"><?= $data->educ_prim_inc_may_15 ?></td>
            <?php $total_educ_prim_inc_may_15 = $total_educ_prim_inc_may_15 + $data->educ_prim_inc_may_15 ?>
            <td align="center"><?= $data->educ_no_asiste_6_14 ?></td>
            <?php $total_educ_no_asiste_6_14 = $total_educ_no_asiste_6_14 + $data->educ_no_asiste_6_14 ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_educ_trunca_3_15 ?></b></td>
        <td align="center"><b><?= $total_educ_no_asiste_3_15 ?></b></td>
        <td align="center"><b><?= $total_educ_no_prim_35 ?></b></td>
        <td align="center"><b><?= $total_educ_sec_inc_16_35 ?></b></td>
        <td align="center"><b><?= $total_educ_analfabeta_may_15 ?></b></td>
        <td align="center"><b><?= $total_educ_prim_inc_may_15 ?></b></td>
        <td align="center"><b><?= $total_educ_no_asiste_6_14 ?></b></td>
    </tr>
    </tbody>
</table>

<pagebreak />


<table>
    <thead>
    <tr>
        <th colspan="12" align="center">SALUD</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>Sin Servicio de Salud</b></td>
        <td colspan="1" align="center" ><b>Tiene Seguro Popular</b></td>
        <td colspan="1" align="center" ><b>Tiene ISSEMYN</b></td>
        <td colspan="1" align="center" ><b>Tiene IMSS</b></td>
        <td colspan="1" align="center" ><b>Tiene Marina Sedena</b></td>
        <td colspan="1" align="center" ><b>Tiene ISSTE</b></td>
        <td colspan="1" align="center" ><b>Tiene PEMEX</b></td>
        <td colspan="1" align="center" ><b>Tiene Otro Servicio</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->salud_recibe ?></td>
            <?php $total_salud_recibe = $total_salud_recibe + $data->salud_recibe ?>
            <td align="center"><?= $data->seguro_popular ?></td>
            <?php $total_seguro_popular = $total_seguro_popular + $data->seguro_popular ?>
            <td align="center"><?= $data->issemyn ?></td>
            <?php $total_issemyn = $total_issemyn + $data->issemyn ?>
            <td align="center"><?= $data->imss ?></td>
            <?php $total_imss = $total_imss + $data->imss ?>
            <td align="center"><?= $data->marina_sedena ?></td>
            <?php $total_marina_sedena = $total_marina_sedena + $data->marina_sedena ?>
            <td align="center"><?= $data->isste ?></td>
            <?php $total_isste = $total_isste + $data->isste ?>
            <td align="center"><?= $data->pemex ?></td>
            <?php $total_pemex = $total_pemex + $data->pemex ?>
            <td align="center"><?= $data->otro_serv_med ?></td>
            <?php $total_otro_serv_med = $total_otro_serv_med + $data->otro_serv_med ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_salud_recibe ?></b></td>
        <td align="center"><b><?= $total_seguro_popular ?></b></td>
        <td align="center"><b><?= $total_issemyn ?></b></td>
        <td align="center"><b><?= $total_imss ?></b></td>
        <td align="center"><b><?= $total_marina_sedena ?></b></td>
        <td align="center"><b><?= $total_isste ?></b></td>
        <td align="center"><b><?= $total_pemex ?></b></td>
        <td align="center"><b><?= $total_otro_serv_med ?></b></td>
    </tr>
    </tbody>
</table>

<pagebreak />
<table class="table table-condensed">
    <tr>
        <td>
            <img class="rounded float-left" src="<?= Yii::$app->homeUrl ?>images/logoedo.png" height="75" width="75">
        </td>
        <td align="center">
            <p align="center" style="font-size: small"><b>SECRETARÍA DE DESARROLLO SOCIAL</b></p>
                <p align="center" style="font-size: small">DESGLOCE POR MUNICIPIO</p>
        </td>
        <td align="right">
            <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="75" width="75">
        </td>
    </tr>
</table>

<table>
    <thead>
    <tr>
        <th colspan="12" align="center">SEGURIDAD SOCIAL</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>No hay Trabajo Formal</b></td>
        <td colspan="1" align="center" ><b>Hay trabajo sin seguridad social</b></td>
        <td colspan="1" align="center" ><b>Adultos Mayores sin Seguridad Social</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->ss_trabajo_formal ?></td>
            <?php $total_ss_trabajo_formal = $total_ss_trabajo_formal + $data->ss_trabajo_formal ?>
            <td align="center"><?= $data->ss_trabajo_sin ?></td>
            <?php $total_ss_trabajo_sin = $total_ss_trabajo_sin + $data->ss_trabajo_sin ?>
            <td align="center"><?= $data->ss_adultos_may_sin ?></td>
            <?php $total_ss_adultos_may_sin = $total_ss_adultos_may_sin + $data->ss_adultos_may_sin ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_ss_trabajo_formal ?></b></td>
        <td align="center"><b><?= $total_ss_trabajo_sin ?></b></td>
        <td align="center"><b><?= $total_ss_adultos_may_sin ?></b></td>
    </tr>
    </tbody>
</table>


<pagebreak />


<table>
    <thead>
    <tr>
        <th colspan="12" align="center">EMPLEO E INGRESOS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>Integrantes que reciben ingresos por su trabajo</b></td>
        <td colspan="1" align="center" ><b>Jefe de familia recibe ingresos por su trabajo</b></td>
        <td colspan="1" align="center" ><b>Jefa de familia recibe ingresos por su trabajo</b></td>
        <td colspan="1" align="center" ><b>Hijos recibe ingresos por su trabajo</b></td>
        <td colspan="1" align="center" ><b>Tiene AutoIngreso</b></td>
        <td colspan="1" align="center" ><b>Tiene Apoyo gobierno</b></td>
        <td colspan="1" align="center" ><b>Tiene Apoyo extranjero</b></td>
        <td colspan="1" align="center" ><b>Tiene pension</b></td>
        <td colspan="1" align="center" ><b>Son Madres solteras trabajadoras</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->cuantos_ingresos ?></td>
            <?php $total_cuantos_ingresos = $total_cuantos_ingresos + $data->cuantos_ingresos ?>
            <td align="center"><?= $data->jefe_familia ?></td>
            <?php $total_jefe_familia = $total_jefe_familia + $data->jefe_familia ?>
            <td align="center"><?= $data->jefa_familia ?></td>
            <?php $total_jefa_familia = $total_jefa_familia + $data->jefa_familia ?>
            <td align="center"><?= $data->hijo ?></td>
            <?php $total_hijo = $total_hijo + $data->hijo ?>
            <td align="center"><?= $data->autoingreso ?></td>
            <?php $total_autoingreso = $total_autoingreso + $data->autoingreso ?>
            <td align="center"><?= $data->apoyo_gobierno ?></td>
            <?php $total_apoyo_gobierno = $total_apoyo_gobierno + $data->apoyo_gobierno ?>
            <td align="center"><?= $data->apoyo_extranjero ?></td>
            <?php $total_apoyo_extranjero = $total_apoyo_extranjero + $data->apoyo_extranjero ?>
            <td align="center"><?= $data->pension ?></td>
            <?php $total_pension = $total_pension + $data->pension ?>
            <td align="center"><?= $data->madre_soltera_labora ?></td>
            <?php $total_madre_soltera_labora = $total_madre_soltera_labora + $data->madre_soltera_labora ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_cuantos_ingresos ?></b></td>
        <td align="center"><b><?= $total_jefe_familia ?></b></td>
        <td align="center"><b><?= $total_jefa_familia ?></b></td>
        <td align="center"><b><?= $total_hijo ?></b></td>
        <td align="center"><b><?= $total_autoingreso ?></b></td>
        <td align="center"><b><?= $total_apoyo_gobierno ?></b></td>
        <td align="center"><b><?= $total_apoyo_extranjero ?></b></td>
        <td align="center"><b><?= $total_pension ?></b></td>
        <td align="center"><b><?= $total_madre_soltera_labora ?></b></td>
    </tr>
    </tbody>
</table>


<pagebreak />


<table>
    <thead>
    <tr>
        <th colspan="13" align="center">ALIMENTACIÓN</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>Menor con Poca Variedad de Alimentos</b></td>
        <td colspan="1" align="center" ><b>Menor dejo de comer por falta de Alimentos</b></td>
        <td colspan="1" align="center" ><b>Menor se disminuyo los alimentos</b></td>
        <td colspan="1" align="center" ><b>Menor sintio hambre y no comio</b></td>
        <td colspan="1" align="center" ><b>Menor se acosto con hambre</b></td>
        <td colspan="1" align="center" ><b>Menor sin comer todo el día</b></td>
        <td colspan="1" align="center" ><b>Adulto con Poca Variedad de Alimentos</b></td>
        <td colspan="1" align="center" ><b>Adulto dejo de comer por falta de Alimentos</b></td>
        <td colspan="1" align="center" ><b>Adulto se disminuyo los alimentos</b></td>
        <td colspan="1" align="center" ><b>Se quedaron sin alimentos</b></td>
        <td colspan="1" align="center" ><b>Adulto sintio hambre y no comio</b></td>
        <td colspan="1" align="center" ><b>Adulto sin comer todo el día</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->menor_poca_variedad ?></td>
            <?php $total_menor_poca_variedad = $total_menor_poca_variedad + $data->menor_poca_variedad ?>
            <td align="center"><?= $data->menor_falta_alimentos ?></td>
            <?php $total_menor_falta_alimentos = $total_menor_falta_alimentos + $data->menor_falta_alimentos ?>
            <td align="center"><?= $data->menor_menor_porcion ?></td>
            <?php $total_menor_menor_porcion = $total_menor_menor_porcion + $data->menor_menor_porcion ?>
            <td align="center"><?= $data->menor_hambre ?></td>
            <?php $total_menor_hambre = $total_menor_hambre + $data->menor_hambre ?>
            <td align="center"><?= $data->menor_acosto_hambre ?></td>
            <?php $total_menor_acosto_hambre = $total_menor_acosto_hambre + $data->menor_acosto_hambre ?>
            <td align="center"><?= $data->menor_sin_comer_dia ?></td>
            <?php $total_menor_sin_comer_dia = $total_menor_sin_comer_dia + $data->menor_sin_comer_dia ?>
            <td align="center"><?= $data->adulto_poca_variedad ?></td>
            <?php $total_adulto_poca_variedad = $total_adulto_poca_variedad + $data->adulto_poca_variedad ?>
            <td align="center"><?= $data->adulto_falta_alimentos ?></td>
            <?php $total_adulto_falta_alimentos = $total_adulto_falta_alimentos + $data->adulto_falta_alimentos ?>
            <td align="center"><?= $data->adulto_menor_porcion ?></td>
            <?php $total_adulto_menor_porcion = $total_adulto_menor_porcion + $data->adulto_menor_porcion ?>
            <td align="center"><?= $data->quedaron_sin_comida ?></td>
            <?php $total_quedaron_sin_comida = $total_quedaron_sin_comida + $data->quedaron_sin_comida ?>
            <td align="center"><?= $data->adulto_hambre ?></td>
            <?php $total_adulto_hambre = $total_adulto_hambre + $data->adulto_hambre ?>
            <td align="center"><?= $data->adulto_sin_comer_dia ?></td>
            <?php $total_adulto_sin_comer_dia = $total_adulto_sin_comer_dia + $data->adulto_sin_comer_dia ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_menor_poca_variedad ?></b></td>
        <td align="center"><b><?= $total_menor_falta_alimentos ?></b></td>
        <td align="center"><b><?= $total_menor_menor_porcion ?></b></td>
        <td align="center"><b><?= $total_menor_hambre ?></b></td>
        <td align="center"><b><?= $total_menor_acosto_hambre ?></b></td>
        <td align="center"><b><?= $total_menor_sin_comer_dia ?></b></td>
        <td align="center"><b><?= $total_adulto_poca_variedad ?></b></td>
        <td align="center"><b><?= $total_adulto_falta_alimentos ?></b></td>
        <td align="center"><b><?= $total_adulto_menor_porcion ?></b></td>
        <td align="center"><b><?= $total_quedaron_sin_comida ?></b></td>
        <td align="center"><b><?= $total_adulto_hambre ?></b></td>
        <td align="center"><b><?= $total_adulto_sin_comer_dia ?></b></td>
    </tr>
    </tbody>
</table>


<pagebreak />


<table>
    <thead>
    <tr>
        <th colspan="12" align="center">VINCULACIÓN A PROGRAMAS DE DESARROLLO SOCIAL (FEDERALES Y ESTATALES)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="1" align="center" ><b>MUNICIPIO</b></td>
        <td colspan="1" align="center" ><b>No cuentan con LICONSA</b></td>
        <td colspan="1" align="center" ><b>No cuentan con DICONSA</b></td>
        <td colspan="1" align="center" ><b>No abastece en tiendas DICONSA</b></td>
        <td colspan="1" align="center" ><b>No Existe Comedor Comunitario</b></td>
        <td colspan="1" align="center" ><b>No Asiste al Comedor Comunitario</b></td>
        <td colspan="1" align="center" ><b>No cuenta con programas sociales</b></td>
        <td colspan="1" align="center" ><b>No es beneficiario PROSPERA</b></td>
    </tr>
    <?php foreach ($model as $data){ ?>
        <tr>
            <td align="center"><b><?= $data->desc_mun ?></b></td>
            <td align="center"><?= $data->vinc_prog_liconsa ?></td>
            <?php $total_vinc_prog_liconsa = $total_vinc_prog_liconsa + $data->vinc_prog_liconsa ?>
            <td align="center"><?= $data->vinc_prog_diconsa ?></td>
            <?php $total_vinc_prog_diconsa = $total_vinc_prog_diconsa + $data->vinc_prog_diconsa ?>
            <td align="center"><?= $data->vinc_prog_abastece_diconsa ?></td>
            <?php $total_vinc_prog_abastece_diconsa = $total_vinc_prog_abastece_diconsa + $data->vinc_prog_abastece_diconsa ?>
            <td align="center"><?= $data->vinc_prog_comedor ?></td>
            <?php $total_vinc_prog_comedor = $total_vinc_prog_comedor + $data->vinc_prog_comedor ?>
            <td align="center"><?= $data->vinc_prog_asiste_comedor ?></td>
            <?php $total_vinc_prog_asiste_comedor = $total_vinc_prog_asiste_comedor + $data->vinc_prog_asiste_comedor ?>
            <td align="center"><?= $data->vinc_prog_acceso ?></td>
            <?php $total_vinc_prog_acceso = $total_vinc_prog_acceso + $data->vinc_prog_acceso ?>
            <td align="center"><?= $data->vinc_prog_prospera ?></td>
            <?php $total_vinc_prog_prospera = $total_vinc_prog_prospera + $data->vinc_prog_prospera ?>
        </tr>
    <?php } ?>
    <tr>
        <td align="center"><b>Total</b></td>
        <td align="center"><b><?= $total_vinc_prog_liconsa ?></b></td>
        <td align="center"><b><?= $total_vinc_prog_diconsa ?></b></td>
        <td align="center"><b><?= $total_vinc_prog_abastece_diconsa ?></b></td>
        <td align="center"><b><?= $total_vinc_prog_comedor ?></b></td>
        <td align="center"><b><?= $total_vinc_prog_asiste_comedor ?></b></td>
        <td align="center"><b><?= $total_vinc_prog_acceso ?></b></td>
        <td align="center"><b><?= $total_vinc_prog_prospera ?></b></td>
    </tr>
    </tbody>
</table>




