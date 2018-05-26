<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 19/04/2018
 * Time: 08:21 PM
 */


$this->title = 'Regiones';
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

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Desgloce por Region</h3>
    </div>
    <div class="box-body">
        <?= \yii\helpers\Html::a('Excel', ['regionexcel', 'excel' => $excel], ['class' => 'btn btn-success']) ?>
        <?= \yii\helpers\Html::a('Pdf', ['regionpdf', 'excel' => $excel], ['class' => 'btn btn-danger']) ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Region</th>
                <th>Habitantes</th>
                <th>Personas de 0 a 15</th>
                <th>Personas de 16 a 17</th>
                <th>Personas de 18 a 64</th>
                <th>Personas de 65 o más</th>
                <th>Vivienda Propia</th>
                <th>Vivienda Compartida</th>
                <th>Vivienda Prestada</th>
                <th>Vivienda Rentada</th>
                <th>Número de Familias</th>
                <th>Sin Piso Firme</th>
                <th>Sin Techo Firme</th>
                <th>Sin Muros Firmes</th>
                <th>Hacentamiento</th>
                <th>Falta llevar toma de agua al interior</th>
                <th>Falta Servicio de Agua Potable</th>
                <th>Falta Drenaje</th>
                <th>Falta conectar drenaje a red pública</th>
                <th>Falta Electricidad</th>
                <th>Cocina con gas</th>
                <th>Cocina con electricidad</th>
                <th>Cocina con leña</th>
                <th>Cocina con carbon</th>
                <th>Cocina con otro</th>
                <th>Falta Chimenea</th>
                <th>Falta Excusado</th>
                <th>Falta Refrigerador</th>
                <th>Falta Lavadora</th>
                <th>Menor con estudios truncados</th>
                <th>Menor que no asiste a estudiar</th>
                <th>Mayor a 35 sin educación básica</th>
                <th>Habitante entre 16 y 35 sin educación básica</th>
                <th>Mayor a 15 con analfabetismo</th>
                <th>Mayor a 15 con primaria incompleta</th>
                <th>Habitante entre 6 y 14 que no asiste a estudiar</th>
                <th>Sin Servicio de Salud</th>
                <th>Tiene Seguro Popular</th>
                <th>Tiene ISSEMYN</th>
                <th>Tiene IMSS</th>
                <th>Tiene Marina Sedena</th>
                <th>Tiene ISSTE</th>
                <th>Tiene PEMEX</th>
                <th>Tiene Otro Servicio</th>
                <th>No hay Trabajo Formal</th>
                <th>Hay trabajo sin seguridad social</th>
                <th>Adultos Mayores sin Seguridad Social</th>
                <th>Integrantes que reciben ingresos por su trabajo</th>
                <th>Jefe de familia recibe ingresos por su trabajo</th>
                <th>Jefa de familia recibe ingresos por su trabajo</th>
                <th>Hijos recibe ingresos por su trabajo</th>
                <th>Tiene AutoIngreso</th>
                <th>Tiene Apoyo gobierno</th>
                <th>Tiene Apoyo extranjero</th>
                <th>Tiene pension</th>
                <th>Son Madres solteras trabajadoras</th>
                <th>Menor con Poca Variedad de Alimentos</th>
                <th>Menor dejo de comer por falta de Alimentos</th>
                <th>Menor se disminuyo los alimentos</th>
                <th>Menor sintio hambre y no comio</th>
                <th>Menor se acosto con hambre</th>
                <th>Menor sin comer todo el día</th>
                <th>Adulto con Poca Variedad de Alimentos</th>
                <th>Adulto dejo de comer por falta de Alimentos</th>
                <th>Adulto se disminuyo los alimentos</th>
                <th>Se quedaron sin alimentos</th>
                <th>Adulto sintio hambre y no comio</th>
                <th>Adulto sin comer todo el día</th>
                <th>No cuentan con LICONSA</th>
                <th>No cuentan con DICONSA</th>
                <th>No abastece en tiendas DICONSA</th>
                <th>No Existe Comedor Comunitario</th>
                <th>No Asiste al Comedor Comunitario</th>
                <th>No cuenta con programas sociales</th>
                <th>No es beneficiario PROSPERA</th>
                </thead>
                <tbody>
                <?php $y=1; foreach ($model as $data){ ?>
                    <tr <?php if($y%2==0){ echo 'bgcolor="#A8AC90"'; }?>>
                        <td><b><?= $data->desc_region ?></b></td>
                        <td><?= $data->num_personas ?></td>
                        <?php $total_num_personas = $total_num_personas + $data->num_personas ?>
                        <td><?= $data->per_0_15 ?></td>
                        <?php $total_per_0_15 = $total_per_0_15 + $data->per_0_15 ?>
                        <td><?= $data->per_16_17 ?></td>
                        <?php $total_per_16_17 = $total_per_16_17 + $data->per_16_17 ?>
                        <td><?= $data->per_18_64 ?></td>
                        <?php $total_per_18_64 = $total_per_18_64 + $data->per_18_64 ?>
                        <td><?= $data->per_65_mas ?></td>
                        <?php $total_per_65_mas = $total_per_65_mas + $data->per_65_mas ?>
                        <td><?= $data->vivienda_propia ?></td>
                        <?php $total_vivienda_propia = $total_vivienda_propia + $data->vivienda_propia ?>
                        <td><?= $data->vivienda_compartida ?></td>
                        <?php $total_vivienda_compartida = $total_vivienda_compartida + $data->vivienda_compartida ?>
                        <td><?= $data->vivienda_prestada ?></td>
                        <?php $total_vivienda_prestada = $total_vivienda_prestada + $data->vivienda_prestada ?>
                        <td><?= $data->vivienda_rentada ?></td>
                        <?php $total_vivienda_rentada = $total_vivienda_rentada + $data->vivienda_rentada ?>
                        <td><?= $data->num_familias ?></td>
                        <?php $total_num_familias = $total_num_familias + $data->num_familias ?>
                        <td><?= $data->sin_piso ?></td>
                        <?php $total_sin_piso = $total_sin_piso + $data->sin_piso ?>
                        <td><?= $data->sin_techo ?></td>
                        <?php $total_sin_techo = $total_sin_techo + $data->sin_techo ?>
                        <td><?= $data->sin_muro ?></td>
                        <?php $total_sin_muro = $total_sin_muro + $data->sin_muro ?>
                        <td><?= $data->hacentamiento ?></td>
                        <?php $total_hacentamiento = $total_hacentamiento + $data->hacentamiento ?>
                        <td><?= $data->agua_interior ?></td>
                        <?php $total_agua_interior = $total_agua_interior + $data->agua_interior ?>
                        <td><?= $data->servicio_agua ?></td>
                        <?php $total_servicio_agua = $total_servicio_agua + $data->servicio_agua ?>
                        <td><?= $data->falta_drenaje ?></td>
                        <?php $total_falta_drenaje = $total_falta_drenaje + $data->falta_drenaje ?>
                        <td><?= $data->falta_conectar ?></td>
                        <?php $total_falta_conectar = $total_falta_conectar + $data->falta_conectar ?>
                        <td><?= $data->falta_luz ?></td>
                        <?php $total_falta_luz = $total_falta_luz + $data->falta_luz ?>
                        <td><?= $data->cocina_gas ?></td>
                        <?php $total_cocina_gas = $total_cocina_gas + $data->cocina_gas ?>
                        <td><?= $data->cocina_luz ?></td>
                        <?php $total_cocina_luz = $total_cocina_luz + $data->cocina_luz ?>
                        <td><?= $data->cocina_lena ?></td>
                        <?php $total_cocina_lena = $total_cocina_lena + $data->cocina_lena ?>
                        <td><?= $data->cocina_carbon ?></td>
                        <?php $total_cocina_carbon = $total_cocina_carbon + $data->cocina_carbon ?>
                        <td><?= $data->cocina_otro ?></td>
                        <?php $total_cocina_otro = $total_cocina_otro + $data->cocina_otro ?>
                        <td><?= $data->falta_chimenea ?></td>
                        <?php $total_falta_chimenea = $total_falta_chimenea + $data->falta_chimenea ?>
                        <td><?= $data->falta_excusado ?></td>
                        <?php $total_falta_excusado = $total_falta_excusado + $data->falta_excusado ?>
                        <td><?= $data->falta_refrigerador ?></td>
                        <?php $total_falta_refrigerador = $total_falta_refrigerador + $data->falta_refrigerador ?>
                        <td><?= $data->falta_lavadora ?></td>
                        <?php $total_falta_lavadora = $total_falta_lavadora + $data->falta_lavadora ?>
                        <td><?= $data->educ_trunca_3_15 ?></td>
                        <?php $total_educ_trunca_3_15 = $total_educ_trunca_3_15 + $data->educ_trunca_3_15 ?>
                        <td><?= $data->educ_no_asiste_3_15 ?></td>
                        <?php $total_educ_no_asiste_3_15 = $total_educ_no_asiste_3_15 + $data->educ_no_asiste_3_15 ?>
                        <td><?= $data->educ_no_prim_35 ?></td>
                        <?php $total_educ_no_prim_35 = $total_educ_no_prim_35 + $data->educ_no_prim_35 ?>
                        <td><?= $data->educ_sec_inc_16_35 ?></td>
                        <?php $total_educ_sec_inc_16_35 = $total_educ_sec_inc_16_35 + $data->educ_sec_inc_16_35 ?>
                        <td><?= $data->educ_analfabeta_may_15 ?></td>
                        <?php $total_educ_analfabeta_may_15 = $total_educ_analfabeta_may_15 + $data->educ_analfabeta_may_15 ?>
                        <td><?= $data->educ_prim_inc_may_15 ?></td>
                        <?php $total_educ_prim_inc_may_15 = $total_educ_prim_inc_may_15 + $data->educ_prim_inc_may_15 ?>
                        <td><?= $data->educ_no_asiste_6_14 ?></td>
                        <?php $total_educ_no_asiste_6_14 = $total_educ_no_asiste_6_14 + $data->educ_no_asiste_6_14 ?>
                        <td><?= $data->salud_recibe ?></td>
                        <?php $total_salud_recibe = $total_salud_recibe + $data->salud_recibe ?>
                        <td><?= $data->seguro_popular ?></td>
                        <?php $total_seguro_popular = $total_seguro_popular + $data->seguro_popular ?>
                        <td><?= $data->issemyn ?></td>
                        <?php $total_issemyn = $total_issemyn + $data->issemyn ?>
                        <td><?= $data->imss ?></td>
                        <?php $total_imss = $total_imss + $data->imss ?>
                        <td><?= $data->marina_sedena ?></td>
                        <?php $total_marina_sedena = $total_marina_sedena + $data->marina_sedena ?>
                        <td><?= $data->isste ?></td>
                        <?php $total_isste = $total_isste + $data->isste ?>
                        <td><?= $data->pemex ?></td>
                        <?php $total_pemex = $total_pemex + $data->pemex ?>
                        <td><?= $data->otro_serv_med ?></td>
                        <?php $total_otro_serv_med = $total_otro_serv_med + $data->otro_serv_med ?>
                        <td><?= $data->ss_trabajo_formal ?></td>
                        <?php $total_ss_trabajo_formal = $total_ss_trabajo_formal + $data->ss_trabajo_formal ?>
                        <td><?= $data->ss_trabajo_sin ?></td>
                        <?php $total_ss_trabajo_sin = $total_ss_trabajo_sin + $data->ss_trabajo_sin ?>
                        <td><?= $data->ss_adultos_may_sin ?></td>
                        <?php $total_ss_adultos_may_sin = $total_ss_adultos_may_sin + $data->ss_adultos_may_sin ?>
                        <td><?= $data->cuantos_ingresos ?></td>
                        <?php $total_cuantos_ingresos = $total_cuantos_ingresos + $data->cuantos_ingresos ?>
                        <td><?= $data->jefe_familia ?></td>
                        <?php $total_jefe_familia = $total_jefe_familia + $data->jefe_familia ?>
                        <td><?= $data->jefa_familia ?></td>
                        <?php $total_jefa_familia = $total_jefa_familia + $data->jefa_familia ?>
                        <td><?= $data->hijo ?></td>
                        <?php $total_hijo = $total_hijo + $data->hijo ?>
                        <td><?= $data->autoingreso ?></td>
                        <?php $total_autoingreso = $total_autoingreso + $data->autoingreso ?>
                        <td><?= $data->apoyo_gobierno ?></td>
                        <?php $total_apoyo_gobierno = $total_apoyo_gobierno + $data->apoyo_gobierno ?>
                        <td><?= $data->apoyo_extranjero ?></td>
                        <?php $total_apoyo_extranjero = $total_apoyo_extranjero + $data->apoyo_extranjero ?>
                        <td><?= $data->pension ?></td>
                        <?php $total_pension = $total_pension + $data->pension ?>
                        <td><?= $data->madre_soltera_labora ?></td>
                        <?php $total_madre_soltera_labora = $total_madre_soltera_labora + $data->madre_soltera_labora ?>
                        <td><?= $data->menor_poca_variedad ?></td>
                        <?php $total_menor_poca_variedad = $total_menor_poca_variedad + $data->menor_poca_variedad ?>
                        <td><?= $data->menor_falta_alimentos ?></td>
                        <?php $total_menor_falta_alimentos = $total_menor_falta_alimentos + $data->menor_falta_alimentos ?>
                        <td><?= $data->menor_menor_porcion ?></td>
                        <?php $total_menor_menor_porcion = $total_menor_menor_porcion + $data->menor_menor_porcion ?>
                        <td><?= $data->menor_hambre ?></td>
                        <?php $total_menor_hambre = $total_menor_hambre + $data->menor_hambre ?>
                        <td><?= $data->menor_acosto_hambre ?></td>
                        <?php $total_menor_acosto_hambre = $total_menor_acosto_hambre + $data->menor_acosto_hambre ?>
                        <td><?= $data->menor_sin_comer_dia ?></td>
                        <?php $total_menor_sin_comer_dia = $total_menor_sin_comer_dia + $data->menor_sin_comer_dia ?>
                        <td><?= $data->adulto_poca_variedad ?></td>
                        <?php $total_adulto_poca_variedad = $total_adulto_poca_variedad + $data->adulto_poca_variedad ?>
                        <td><?= $data->adulto_falta_alimentos ?></td>
                        <?php $total_adulto_falta_alimentos = $total_adulto_falta_alimentos + $data->adulto_falta_alimentos ?>
                        <td><?= $data->adulto_menor_porcion ?></td>
                        <?php $total_adulto_menor_porcion = $total_adulto_menor_porcion + $data->adulto_menor_porcion ?>
                        <td><?= $data->quedaron_sin_comida ?></td>
                        <?php $total_quedaron_sin_comida = $total_quedaron_sin_comida + $data->quedaron_sin_comida ?>
                        <td><?= $data->adulto_hambre ?></td>
                        <?php $total_adulto_hambre = $total_adulto_hambre + $data->adulto_hambre ?>
                        <td><?= $data->adulto_sin_comer_dia ?></td>
                        <?php $total_adulto_sin_comer_dia = $total_adulto_sin_comer_dia + $data->adulto_sin_comer_dia ?>
                        <td><?= $data->vinc_prog_liconsa ?></td>
                        <?php $total_vinc_prog_liconsa = $total_vinc_prog_liconsa + $data->vinc_prog_liconsa ?>
                        <td><?= $data->vinc_prog_diconsa ?></td>
                        <?php $total_vinc_prog_diconsa = $total_vinc_prog_diconsa + $data->vinc_prog_diconsa ?>
                        <td><?= $data->vinc_prog_abastece_diconsa ?></td>
                        <?php $total_vinc_prog_abastece_diconsa = $total_vinc_prog_abastece_diconsa + $data->vinc_prog_abastece_diconsa ?>
                        <td><?= $data->vinc_prog_comedor ?></td>
                        <?php $total_vinc_prog_comedor = $total_vinc_prog_comedor + $data->vinc_prog_comedor ?>
                        <td><?= $data->vinc_prog_asiste_comedor ?></td>
                        <?php $total_vinc_prog_asiste_comedor = $total_vinc_prog_asiste_comedor + $data->vinc_prog_asiste_comedor ?>
                        <td><?= $data->vinc_prog_acceso ?></td>
                        <?php $total_vinc_prog_acceso = $total_vinc_prog_acceso + $data->vinc_prog_acceso ?>
                        <td><?= $data->vinc_prog_prospera ?></td>
                        <?php $total_vinc_prog_prospera = $total_vinc_prog_prospera + $data->vinc_prog_prospera ?>
                    </tr>
                <?php $y++;} ?>
                <tr>
                    <td><b>Total</b></td>
                    <td><b><?= $total_num_personas ?></b></td>
                    <td><b><?= $total_per_0_15 ?></b></td>
                    <td><b><?= $total_per_16_17 ?></b></td>
                    <td><b><?= $total_per_18_64 ?></b></td>
                    <td><b><?= $total_per_65_mas ?></b></td>
                    <td><b><?= $total_vivienda_propia ?></b></td>
                    <td><b><?= $total_vivienda_compartida ?></b></td>
                    <td><b><?= $total_vivienda_prestada ?></b></td>
                    <td><b><?= $total_vivienda_rentada ?></b></td>
                    <td><b><?= $total_num_familias ?></b></td>
                    <td><b><?= $total_sin_piso ?></b></td>
                    <td><b><?= $total_sin_techo ?></b></td>
                    <td><b><?= $total_sin_muro ?></b></td>
                    <td><b><?= $total_hacentamiento ?></b></td>
                    <td><b><?= $total_agua_interior ?></b></td>
                    <td><b><?= $total_servicio_agua ?></b></td>
                    <td><b><?= $total_falta_drenaje ?></b></td>
                    <td><b><?= $total_falta_conectar ?></b></td>
                    <td><b><?= $total_falta_luz ?></b></td>
                    <td><b><?= $total_cocina_gas ?></b></td>
                    <td><b><?= $total_cocina_luz ?></b></td>
                    <td><b><?= $total_cocina_lena ?></b></td>
                    <td><b><?= $total_cocina_carbon ?></b></td>
                    <td><b><?= $total_cocina_otro ?></b></td>
                    <td><b><?= $total_falta_chimenea ?></b></td>
                    <td><b><?= $total_falta_excusado ?></b></td>
                    <td><b><?= $total_falta_refrigerador ?></b></td>
                    <td><b><?= $total_falta_lavadora ?></b></td>
                    <td><b><?= $total_educ_trunca_3_15 ?></b></td>
                    <td><b><?= $total_educ_no_asiste_3_15 ?></b></td>
                    <td><b><?= $total_educ_no_prim_35 ?></b></td>
                    <td><b><?= $total_educ_sec_inc_16_35 ?></b></td>
                    <td><b><?= $total_educ_analfabeta_may_15 ?></b></td>
                    <td><b><?= $total_educ_prim_inc_may_15 ?></b></td>
                    <td><b><?= $total_educ_no_asiste_6_14 ?></b></td>
                    <td><b><?= $total_salud_recibe ?></b></td>
                    <td><b><?= $total_seguro_popular ?></b></td>
                    <td><b><?= $total_issemyn ?></b></td>
                    <td><b><?= $total_imss ?></b></td>
                    <td><b><?= $total_marina_sedena ?></b></td>
                    <td><b><?= $total_isste ?></b></td>
                    <td><b><?= $total_pemex ?></b></td>
                    <td><b><?= $total_otro_serv_med ?></b></td>
                    <td><b><?= $total_ss_trabajo_formal ?></b></td>
                    <td><b><?= $total_ss_trabajo_sin ?></b></td>
                    <td><b><?= $total_ss_adultos_may_sin ?></b></td>
                    <td><b><?= $total_cuantos_ingresos ?></b></td>
                    <td><b><?= $total_jefe_familia ?></b></td>
                    <td><b><?= $total_jefa_familia ?></b></td>
                    <td><b><?= $total_hijo ?></b></td>
                    <td><b><?= $total_autoingreso ?></b></td>
                    <td><b><?= $total_apoyo_gobierno ?></b></td>
                    <td><b><?= $total_apoyo_extranjero ?></b></td>
                    <td><b><?= $total_pension ?></b></td>
                    <td><b><?= $total_madre_soltera_labora ?></b></td>
                    <td><b><?= $total_menor_poca_variedad ?></b></td>
                    <td><b><?= $total_menor_falta_alimentos ?></b></td>
                    <td><b><?= $total_menor_menor_porcion ?></b></td>
                    <td><b><?= $total_menor_hambre ?></b></td>
                    <td><b><?= $total_menor_acosto_hambre ?></b></td>
                    <td><b><?= $total_menor_sin_comer_dia ?></b></td>
                    <td><b><?= $total_adulto_poca_variedad ?></b></td>
                    <td><b><?= $total_adulto_falta_alimentos ?></b></td>
                    <td><b><?= $total_adulto_menor_porcion ?></b></td>
                    <td><b><?= $total_quedaron_sin_comida ?></b></td>
                    <td><b><?= $total_adulto_hambre ?></b></td>
                    <td><b><?= $total_adulto_sin_comer_dia ?></b></td>
                    <td><b><?= $total_vinc_prog_liconsa ?></b></td>
                    <td><b><?= $total_vinc_prog_diconsa ?></b></td>
                    <td><b><?= $total_vinc_prog_abastece_diconsa ?></b></td>
                    <td><b><?= $total_vinc_prog_comedor ?></b></td>
                    <td><b><?= $total_vinc_prog_asiste_comedor ?></b></td>
                    <td><b><?= $total_vinc_prog_acceso ?></b></td>
                    <td><b><?= $total_vinc_prog_prospera ?></b></td>

                </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
