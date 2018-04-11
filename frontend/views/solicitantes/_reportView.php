<table class="table table-condensed">
    <tr>
        <td>
            <img class="rounded float-left" src="<?= Yii::$app->homeUrl ?>images/logoedo.png" height="75" width="75">
        </td>
        <td align="center">
            <p align="center" style="font-size: small"><b>SECRETARÍA DE DESARROLLO SOCIAL</b></p>
            <p align="center" style="font-size: small"> Detección de Necesidades</p>
            <p align="center" style="font-size: small">FAMILIAS FUERTES COMUNIDADES CON TODO</p>
        </td>
        <td align="right">
            <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="75" width="75">
        </td>
    </tr>
</table>
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="6" style="background-color:#b1b024">POBREZA MULTIDIMENSIONAL</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Carencia por calidad y espacios en la vivienda</b></td>
            <?php if($model->calidad_vivienda == 1): ?>
            <td style="background-color: #c28484"><p>Carencia</p></td>
            <?php else: ?>
            <td>Sin Carencia</td>
            <?php endif; ?>
            <td><?= $piso = ($model->calidad_vivienda_piso == 1) ? 'Falta Piso Firme' : '' ?></td>
            <td><?= $techo = ($model->calidad_vivienda_techo == 1) ? 'Falta Techo Firme' : '' ?></td>
            <td><?= $muros = ($model->calidad_vivienda_muros == 1) ? 'Faltan Muros de Material Solido' : '' ?></td>
            <td><?= $hacentamiento = ($model->calidad_vivienda_hacentamiento == 1) ? 'Existe Hacinamiento' : '' ?></td>
        </tr>
        <tr>
            <td rowspan="2"><b>Carencia por acceso a los servicios básicos en la vivienda</b></td>
            <?php if($model->serv_basicos == 1): ?>
            <td style="background-color: #c28484" rowspan="2"><p>Carencia</p></td>
            <?php else: ?>
            <td rowspan="2">Sin Carencia</td>
            <?php endif; ?>

            <?php if($model->serv_basicos_agua == 2): ?>
            <td>Falta Servicio de Agua Potable</td>
            <?php elseif ($model->serv_basicos_agua == 1): ?>
            <td>Falta llevar toma de agua al interior</td>
            <?php else:?>
            <td> </td>
            <?php endif;?>

            <?php if($model->serv_basicos_drenaje == 3): ?>
            <td>Falta conectar drenaje a red pública</td>
            <?php elseif ($model->serv_basicos_drenaje == 1): ?>
            <td>Falta Drenaje</td>
            <?php else:?>
            <td> </td>
            <?php endif;?>
            <td><?= $luz = ($model->serv_basicos_electricidad == 1) ? 'Falta Electricidad' : '' ?></td>
            <td><?= $chimenea = ($model->serv_basicos_chimenea == 1) ? 'Falta Chimenea' : '' ?></td>
        </tr>
        <tr>
            <td><?= $excusado = ($model->serv_basicos_excusado == 1) ? 'Falta Excusado' : '' ?></td>
            <td><?= $refrigerador = ($model->serv_basicos_reefrigerador == 1) ? 'Falta Refrigerador' : '' ?></td>
            <td><?= $lavadora = ($model->serv_basicos_lavadora == 1) ? 'Falta Lavadora' : '' ?></td>
        </tr>
        <tr>
            <td rowspan="2"><b>Rezago Educativo</b></td>
            <?php if($model->educ == 1): ?>
                <td rowspan="2" style="background-color: #c28484"><p>Carencia</p></td>
            <?php else: ?>
                <td rowspan="2">Sin Carencia</td>
            <?php endif; ?>
            <td><?= $educ_trunca_3_15 = ($model->educ_trunca_3_15 == 1) ? 'Menor con estudios truncados' : '' ?></td>
            <td><?= $educ_no_asiste_3_15 = ($model->educ_no_asiste_3_15 == 1) ? 'Menor que no asiste a estudiar' : '' ?></td>
            <td><?= $educ_no_prim_35 = ($model->educ_no_prim_35 == 1) ? 'Mayor a 33 sin educación básica' : '' ?></td>
            <td><?= $educ_sec_inc_16_35 = ($model->educ_sec_inc_16_35 == 1) ? 'Habitante entre 16 y 33 sin educación básica' : '' ?></td>
        </tr>
        <tr>
            <td><?= $educ_analfabeta_may_15 = ($model->educ_analfabeta_may_15 == 1) ? 'Habitante mayores a 15 son analfabetas' : '' ?></td>
            <td><?= $educ_prim_inc_may_15 = ($model->educ_prim_inc_may_15 == 1) ? 'Habitante mayores a 15 con primaria incompleta' : '' ?></td>
            <td><?= $educ_no_asiste_6_14 = ($model->educ_no_asiste_6_14 == 1) ? 'Habitante entre 6 y 14 no asisten a escuela' : '' ?></td>
        </tr>
        <tr>
            <td><b>Carencia por acceso a servicios de salud</b></td>
            <?php if($model->salud == 1): ?>
                <td style="background-color: #c28484"><p>Carencia</p></td>
            <?php else: ?>
                <td>Sin Carencia</td>
            <?php endif; ?>
            <td><?= $salud_recibe = ($model->salud_recibe == 1) ? 'Sin Servicio de Salud' : '' ?></td>
        </tr>
        <tr>
            <td><b>Carencia por seguridad social</b></td>
            <?php if($model->ss == 1): ?>
                <td style="background-color: #c28484"><p>Carencia</p></td>
            <?php else: ?>
                <td>Sin Carencia</td>
            <?php endif; ?>
            <td><?= $ss_trabajo_formal = ($model->ss_trabajo_formal == 1) ? 'No hay Trabajo Formal' : '' ?></td>
            <td><?= $ss_trabajo_sin = ($model->ss_trabajo_sin == 1) ? 'Hay trabajo sin seguridad social' : '' ?></td>
            <td><?= $ss_adultos_may_sin = ($model->ss_adultos_may_sin == 1) ? 'Adultos Mayores sin Seguridad Social' : '' ?></td>
        </tr>
        <tr>
            <td><b>Carencia por Acceso a la Alimentación</b></td>
            <?php if($model->alimentacion == 1): ?>
                <td style="background-color: #c28484"><p>Carencia</p></td>
            <?php else: ?>
                <td>Sin Carencia</td>
            <?php endif; ?>
            <?php if($model->alimentacion_val == 0): ?>
                <td style="background-color: #00e765">Seguridad Alimentaria</td>
            <?php elseif ($model->alimentacion_val < 4): ?>
                <td style="background-color: #efe24b">Inseguridad Alimentaria Leve</td>
            <?php elseif ($model->alimentacion_val < 8): ?>
                <td style="background-color: #985f0d">Inseguridad Alimentaria Moderada</td>
            <?php elseif ($model->alimentacion_val < 13): ?>
                <td style="background-color: #c28484">Inseguridad Alimentaria Severa</td>
            <?php endif;?>
        </tr>
        <tr>
            <td rowspan="2"><b>Vinculación a Programas de Desarrollo Social Estatal o Federal</b></td>
            <td><?= $vinc_prog_liconsa = ($model->vinc_prog_liconsa == 1) ? 'Cuenta con LICONSA' : 'No tiene Acceso a LICONSA' ?></td>
            <td><?= $vinc_prog_diconsa = ($model->vinc_prog_diconsa == 1) ? 'Tiene acceso a DICONSA' : 'No tiene Acceso a DICONSA' ?></td>
            <td><?= $vinc_prog_abastece_diconsa = ($model->vinc_prog_abastece_diconsa == 1) ? 'Abastece en DICONSA' : '' ?></td>
            <td><?= $vinc_prog_comedor = ($model->vinc_prog_comedor == 1) ? 'Existe Comedor Comunitario' : 'No Existe Comedor Comunitario' ?></td>
            <td><?= $vinc_prog_asiste_comedor= ($model->vinc_prog_asiste_comedor == 1) ? 'Asiste al Comedor Comunitario' : '' ?></td>
        </tr>
        <tr>
            <td><?= $vinc_prog_acceso = ($model->vinc_prog_acceso == 1) ? 'Tiene acceso a Programas de Desarrollo Social' : '' ?></td>
            <td><?= $vinc_prog_prospera = ($model->vinc_prog_prospera == 1) ? 'Beneficiario PROSPERA' : '' ?></td>
            <td><?= $vinc_prog_mujeres_solt = ($model->vinc_prog_mujeres_solt == 1) ? 'Existe Madre Soltera' : '' ?></td>
            <td><?= $vinc_prog_adult_may = ($model->vinc_prog_adult_may == 1) ? 'Existe Adultos Mayores' : '' ?></td>
        </tr>
        <tr>
            <td><b>Indicador de Carencias Sociales</b></td>
            <?php if($model->carencia_soc_desc == 0): ?>
                <td>No pobre por carencia</td>
            <?php elseif ($model->carencia_soc_desc == 1): ?>
                <td>Vulnerable por carencias</td>
            <?php elseif ($model->carencia_soc_desc == 2): ?>
                <td>Pobre por carencia</td>
            <?php endif;?>

            <?php if($model->carencia_soc_desc == 0): ?>
                <td style="background-color: #00e765"><?= $model->carencia_soc ?></td>
            <?php elseif ($model->carencia_soc_desc == 1): ?>
                <td style="background-color: #efe24b"><?= $model->carencia_soc ?></td>
            <?php elseif ($model->carencia_soc_desc == 2): ?>
                <td style="background-color: #c28484"><?= $model->carencia_soc ?></td>
            <?php endif;?>
        </tr>
        <tr>
            <td><b>Indicador de Ingresos</b></td>
            <?php if($model->indicador_ingresos_desc == 0): ?>
                <td>No Pobre por Ingresos</td>
            <?php elseif ($model->indicador_ingresos_desc == 1): ?>
                <td>Vulnerable por Ingresos</td>
            <?php elseif ($model->indicador_ingresos_desc == 2): ?>
                <td>Pobreza por Ingresos</td>
            <?php endif;?>


            <?php if($model->indicador_ingresos_desc == 0): ?>
                <td style="background-color: #00e765">No Pobre por Ingresos</td>
            <?php elseif ($model->indicador_ingresos_desc == 1): ?>
                <td style="background-color: #efe24b">Vulnerable por Ingresos</td>
            <?php elseif ($model->indicador_ingresos_desc == 2): ?>
                <td style="background-color: #c28484">Pobreza por Ingresos</td>
            <?php endif;?>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>RESULTADO</b></td>
            <?php if($model->resultado_val == 0): ?>
                <td colspan="3">NO POBRE NO VULNERABLE</td>
            <?php elseif ($model->resultado_val == 1): ?>
                <td colspan="3">VULNERABLE POR CARENCIAS SOCIALES</td>
            <?php elseif ($model->resultado_val == 2): ?>
                <td colspan="3">VULNERABLE POR INGRESOS</td>
            <?php elseif ($model->resultado_val == 3): ?>
                <td colspan="3">POBREZA MODERADA</td>
            <?php elseif ($model->resultado_val == 4): ?>
                <td colspan="3">POBREZA EXTREMA</td>
            <?php endif;?>
        </tr>
    </tbody>
</table>

<table class="table table-bordered">
    <tr>
        <td style="background-color: #c9c9c9"><b>NOMBRE DEL ENTREVISTADO</b></td>
        <td><?= $model->solicitante->apellido_paterno.' '.$model->solicitante->apellido_materno. ' '.$model->solicitante->nombre?></td>
        <td style="background-color: #c9c9c9"><b>MUNICIPIO</b></td>
        <td><?= $model->mun->nombre_mun ?></td>
    </tr>
    <tr>
        <td style="background-color: #c9c9c9"><b>FECHA DE NACIMIENTO</b></td>
        <td><?= $model->solicitante->fecha_nacimiento ?></td>
        <td style="background-color: #c9c9c9"><b>COMUNIDAD</b></td>
        <td><?= $model->loc->desc_loc ?></td>
    </tr>
    <tr>
        <td style="background-color: #c9c9c9"><b>EDAD</b></td>
        <td><?= $edad ?></td>
        <td style="background-color: #c9c9c9"><b>TELEFONO</b></td>
        <td><?= $model->solicitante->telefono ?></td>
    </tr>
</table>