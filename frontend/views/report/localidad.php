<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 19/04/2018
 * Time: 08:21 PM
 */


$this->title = 'Localidades';
$total_sin_piso = 0;
$total_sin_techo = 0;
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Desgloce por Localidad</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Localidad</th>
                <th>Sin Piso Firme</th>
                <th>Sin Techo Firme</th>
                <th>Sin Muros Firmes</th>
                <th>Hacentamiento</th>
                <th>Falta llevar toma de agua al interior</th>
                <th>Falta Servicio de Agua Potable</th>
                <th>Falta Drenaje</th>
                <th>Falta conectar drenaje a red pública</th>
                <th>Falta Electricidad</th>
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
                <th>No hay Trabajo Formal</th>
                <th>Hay trabajo sin seguridad social</th>
                <th>Adultos Mayores sin Seguridad Social</th>
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
                <?php foreach ($model as $data){ ?>
                    <tr>
                        <td><b><?= $data->desc_loc ?></b></td>
                        <td><?= $data->sin_piso ?></td>
                        <?php $total_sin_piso = $total_sin_piso + $data->sin_piso; ?>
                        <td><?= $data->sin_techo ?></td>
                        <?php $total_sin_techo = $total_sin_techo + $data->sin_techo; ?>
                        <td><?= $data->sin_muro ?></td>
                        <td><?= $data->hacentamiento ?></td>
                        <td><?= $data->agua_interior ?></td>
                        <td><?= $data->servicio_agua ?></td>
                        <td><?= $data->falta_drenaje ?></td>
                        <td><?= $data->falta_conectar ?></td>
                        <td><?= $data->falta_luz ?></td>
                        <td><?= $data->falta_chimenea ?></td>
                        <td><?= $data->falta_excusado ?></td>
                        <td><?= $data->falta_refrigerador ?></td>
                        <td><?= $data->falta_lavadora ?></td>
                        <td><?= $data->educ_trunca_3_15 ?></td>
                        <td><?= $data->educ_no_asiste_3_15 ?></td>
                        <td><?= $data->educ_no_prim_35 ?></td>
                        <td><?= $data->educ_sec_inc_16_35 ?></td>
                        <td><?= $data->educ_analfabeta_may_15 ?></td>
                        <td><?= $data->educ_prim_inc_may_15 ?></td>
                        <td><?= $data->educ_no_asiste_6_14 ?></td>
                        <td><?= $data->salud_recibe ?></td>
                        <td><?= $data->ss_trabajo_formal ?></td>
                        <td><?= $data->ss_trabajo_sin ?></td>
                        <td><?= $data->ss_adultos_may_sin ?></td>
                        <td><?= $data->menor_poca_variedad ?></td>
                        <td><?= $data->menor_falta_alimentos ?></td>
                        <td><?= $data->menor_menor_porcion ?></td>
                        <td><?= $data->menor_hambre ?></td>
                        <td><?= $data->menor_acosto_hambre ?></td>
                        <td><?= $data->menor_sin_comer_dia ?></td>
                        <td><?= $data->adulto_poca_variedad ?></td>
                        <td><?= $data->adulto_falta_alimentos ?></td>
                        <td><?= $data->adulto_menor_porcion ?></td>
                        <td><?= $data->quedaron_sin_comida ?></td>
                        <td><?= $data->adulto_hambre ?></td>
                        <td><?= $data->adulto_sin_comer_dia ?></td>
                        <td><?= $data->vinc_prog_liconsa ?></td>
                        <td><?= $data->vinc_prog_diconsa ?></td>
                        <td><?= $data->vinc_prog_abastece_diconsa ?></td>
                        <td><?= $data->vinc_prog_comedor ?></td>
                        <td><?= $data->vinc_prog_asiste_comedor ?></td>
                        <td><?= $data->vinc_prog_acceso ?></td>
                        <td><?= $data->vinc_prog_prospera ?></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td><b>TOTAL</b></td>
                        <td><b><?= $total_sin_piso ?></b></td>
                        <td><b><?= $total_sin_techo ?></b></td>


                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
