<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 31/08/18
 * Time: 12:35 PM
 */
$sumaad1= 0;
$sumaad2= 0;
$sumaad3= 0;
?>

<table class="table table-condensed">
    <tr>
        <td align="right">Fecha: <?= $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): '';?></td>
    </tr>
</table>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #FF9933; color: black;" width="100%">
            <b><p>IDENTIFICACIÓN DE LA LOCALIDAD</p></b>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="30%">
            <b><p>Región</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="70%">
            <b><p>Nombre del municipio</p></b>
        </td>
    </tr>
    <tr>
        <td align="center" width="30%"><?=$model->region->desc_region?></td>
        <td align="center" width="70%"><?=$model->mun->desc_mun?></td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="100%">
            <b><p>Nombre de la localidad</p></b>
        </td>
    </tr>
    <tr>
        <td align="center" width="100%">
            <?=$model->loc->desc_loc?>
        </td>
    </tr>
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="100%">
            <b><p>Anote las indicaciones de cómo llegar a la localidad</p></b>
        </td>
    </tr>
    <tr>
        <td align="center" width="100%">
            <?=$model->indicaciones?>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td width="40%">
            Tipo de acceso o caminos terrestres:
        </td>
        <td width="10%">
            Pavimentado
        </td>
        <td width="10%" align="center">
            <?php
                if ($model->tipo_acceso == 'Pavimentado'){
                    echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
                }else{
                    echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
                }
            ?>
        </td>
        <td width="10%">
            Terracería
        </td>
        <td width="10%" align="center">
            <?php
            if ($model->tipo_acceso == 'Terracería'){
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
            }else{
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
            }
            ?>
        </td>
        <td width="10%">
            Sin acceso
        </td>
        <td width="10%" align="center">
            <?php
            if ($model->tipo_acceso == 'Sin Acceso'){
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
            }else{
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
            }
            ?>
        </td>
    </tr>
</table>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td width="61%">
            Estado en que se encuentran las vías de comunicación terrestre:
        </td>
        <td width="5%">
            Bueno
        </td>
        <td width="8%" align="center">
            <?php
            if ($model->estado == 'Bueno'){
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
            }else{
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
            }
            ?>
        </td>
        <td width="5%">
            Regular
        </td>
        <td width="8%" align="center">
            <?php
            if ($model->estado == 'Regular'){
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
            }else{
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
            }
            ?>
        </td>
        <td width="5%">
            Malo
        </td>
        <td width="8%" align="center">
            <?php
            if ($model->estado == 'Malo'){
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
            }else{
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
            }
            ?>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td width="35%">
            Acceso fácil a transporte de carga:
        </td>
        <td width="3%">
            Si
        </td>
        <td width="3%" align="center">
            <?php
            if ($model->acceso_facil == 1){
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
            }else{
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
            }
            ?>
        </td>
        <td width="3%">
            No
        </td>
        <td width="3%" align="center">
            <?php
            if ($model->acceso_facil == 0){
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo2.png" width="20" height="20">';
            }else{
                echo '<img src="'.Yii::$app->homeUrl.'images/circulo1.png" width="20" height="20">';
            }
            ?>
        </td>
        <td width="53%">
            Tiempo de recorrido en horas desde la capital del Estado:
        </td>
        <td width="10%">
            <?= $model->tiempo ?>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #FF9933; color: black;" width="100%">
            <b><p>ANÁLISIS GENERAL Y DESCRIPCIÓN SOCIOPOLÍTICA DE LA LOCALIDAD</p></b>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="20%">
            <b><p>Cédulas aplicadas</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="20%">
            <b><p>Número de habitantes</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="20%">
            <b><p>Ocupantes promedio por vivienda</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="20%">
            <b><p>Índice de marginación</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="20%">
            <b><p>Índice de desarrollo humano</p></b>
        </td>
    </tr>
    <tr>
        <td align="center" width="20%"><?=$model->cedulas_aplicadas ?></td>
        <td align="center" width="20%"><?=$model->habitantes ?></td>
        <td align="center" width="20%"><?=$model->ocupantes ?></td>
        <td align="center" width="20%"><?=$model->indice_marginacion ?></td>
        <td align="center" width="20%"><?=$model->indice_desarrollo_humano ?></td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="50%">
            <b><p>Principales actividades a las que se dedican los habitantes</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="50%">
            <b><p>Ingreso promedio mensual de los habitantes de la localidad</p></b>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td width="50%">Campesinos: <?= $campesino =($model->campesinos) ? $model->campesinos.'%': '' ?> </td>
        <td width="50%" rowspan="2">De 1 a 3 salarios mínimos: <?=$uno = ($model->ingreso_promedio == 'De 1 a 3 salarios mínimos')? 'X' : '' ?> </td>
    </tr>
    <tr>
        <td width="50%">Obreros: <?=$obreros =($model->obreros) ? $model->obreros.'%' : '' ?> </td>
    </tr>
    <tr>
        <td width="50%">Albañiles: <?=$albaniles = ($model->albaniles) ? $model->albaniles.'%' : ''?> </td>
        <td width="50%" rowspan="2">De 3 a 5 salarios mínimos: <?=$uno = ($model->ingreso_promedio == 'De 3 a 5 salarios mínimos')? 'X' : '' ?> </td>
    </tr>
    <tr>
        <td width="50%">Amas de casa: <?=$amas = ($model->amas) ? $model->amas.'%' : '' ?> </td>
    </tr>
    <tr>
        <td width="50%">Empleados: <?= $empleados = ($model->empleados) ? $model->empleados.'%' : '' ?> </td>
        <td width="50%" rowspan="2">5 o más salarios mínimos: <?=$uno = ($model->ingreso_promedio == '5 o más salarios mínimos')? 'X' : '' ?> </td>
    </tr>
    <tr>
        <td width="50%">Otro: <?=$otros = ($model->otros) ? $model->otros.'%' : ''?> </td>
    </tr>
    <tr>
        <td width="50%"><?= $otro1 = ($model->otros > 0) ? '¿Cuál?:'.$model->cual1 : '' ?> </td>
        <td width="50%" align="center"><b>El salario mínimo vigente es de $88.36 (CONASAMI, 2017)</b></td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="left" style="background-color: #D9D9D9; color: black;" width="100%">
            <b><p>Religión predominante en la localidad</p></b>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="left" width="50%">
            <p>Católica: <?= $catolica = ($model->catolica) ? $model->catolica.'%' : '' ?></p>
        </td>
        <td align="left" width="50%">
            <p>Cristiana: <?= $cristiana = ($model->cristiana) ? $model->cristiana.'%': '' ?></p>
        </td>
    </tr>
    <tr>
        <td align="left" width="50%">
            <p>Testigo de Jehová: <?= $testigos = ($model->testigos) ? $model->testigos.'%': '' ?></p>
        </td>
        <td align="left" width="50%">
            <p>Otra: <?= $otra = ($model->otra) ? $model->otra.'%' : '' ?></p>
        </td>
    </tr>
    <tr>
        <td align="left" width="50%">
            <p>Evangélica: <?=$evangelistas = ($model->evangelistas) ? $model->evangelistas.'%' : ''?></p>
        </td>
        <td align="left" width="50%">
            <p><?= $otro2 = ($model->otra > 0) ? '¿Cuál?:'.$model->cual2 : '' ?></p>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="left" style="background-color: #D9D9D9; color: black;" width="100%">
            <b><p>Principales líderes de la localidad</p></b>
        </td>
    </tr>
</table>
<?php if($model2): ?>
    <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
        <thead>
            <tr>
                <td align="center" style="background-color: #D9D9D9; color: black;" width="50%">
                    <b><p>Nombre</p></b>
                </td>
                <td align="center" style="background-color: #D9D9D9; color: black;" width="50%">
                    <b><p>Cargo</p></b>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if($model2) : $i=1; foreach($model2 as $value){?>
            <tr>
                <td align="center" width="50%"><p><?= $value->nombre ?></p></td>
                <td align="center" width="50%"><p><?= $value->cargo ?></p></td>
            </tr>
            <?php }endif;?>
        </tbody>

    </table>
<?php endif; ?>
<pagebreak />
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="left" style="background-color: #D9D9D9; color: black;" width="100%">
            <b><p>Instituciones educativas con las que cuenta la Localidad</p></b>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <thead>
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="33%">
            <b><p>Nivel educativo</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="33%">
            <b><p>Nombre de la institución educativa</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="33%">
            <b><p>Total de  alumnos</p></b>
        </td>
    </tr>
    </thead>
    <tbody>
    <?php if($model3) : $i=1; foreach($model3 as $value){?>
        <tr>
            <td align="center" width="33%"><p><?= $value->grado->desc_grado ?></p></td>
            <td align="center" width="33%"><p><?= $value->nombre_escuela ?></p></td>
            <td align="center" width="33%"><p><?= $value->total_alumnos ?></p></td>
        </tr>
    <?php }endif;?>
    </tbody>

</table>
<br>
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="left" style="background-color: #D9D9D9; color: black;" width="100%">
            <b><p>Mapa de localización (vista satelital)</p></b>
        </td>
    </tr>
    <tr>
        <td align="center" width="100%">
            <br>
            <?php
            switch ($model->loc_id) {
                case 1180120:
                    echo '<img src="'.Yii::$app->homeUrl.'images/agua-blanca.png" width="600" height="600">';
                    break;
                case 800003:
                    echo '<img src="'.Yii::$app->homeUrl.'images/atzumpa.png" width="600" height="600">';
                    break;
                case 1050224:
                    echo '<img src="'.Yii::$app->homeUrl.'images/cofradia.png" width="600" height="600">';
                    break;
                case 510078:
                    echo '<img src="'.Yii::$app->homeUrl.'images/colonia_ojo_de_agua.png" width="600" height="600">';
                    break;
                case 1230065:
                    echo '<img src="'.Yii::$app->homeUrl.'images/cruz_clavos.png" width="600" height="600">';
                    break;
                case 780008:
                    echo '<img src="'.Yii::$app->homeUrl.'images/ojo_de_agua.png" width="600" height="600">';
                    break;
                case 380007:
                    echo '<img src="'.Yii::$app->homeUrl.'images/palomas.png" width="600" height="600">';
                    break;
                case 1240101:
                    echo '<img src="'.Yii::$app->homeUrl.'images/san-jeronimo-pilitas.png" width="600" height="600">';
                    break;
                case 560026:
                    echo '<img src="'.Yii::$app->homeUrl.'images/san-jose-el-quelite.png" width="600" height="600">';
                    break;
                case 900057:
                    echo '<img src="'.Yii::$app->homeUrl.'images/san-roman.png" width="600" height="600">';
                    break;
                default:
                    echo '';
                    break;
            }


            ?>
        </td>
    </tr>
</table>
<pagebreak />
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #FF9933; color: black;" width="100%">
            <b><p>DETECCIÓN DE NECESIDADES</p></b>
        </td>
    </tr>
    <tr>
        <td align="left" style="background-color: #FF9933; color: black;" width="100%">
            <b><p>ATENCIÓN DIRECTA</p></b>
        </td>
    </tr>
</table>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="80%">
            <b><p>Descripción de la necesidad</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="20%">
            <b><p>Cantidad en número</p></b>
        </td>
    </tr>
</table>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" width="15%" rowspan="9">1) Vivienda</td>
        <td align="center" width="5%">1.1</td>
        <td align="left" width="60%">Viviendas que carecen de piso firme</td>
        <td align="center" width="20%"><?=$model4->piso_firme?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.2</td>
        <td align="left" width="60%">Viviendas que carecen de techo firme</td>
        <td align="center" width="20%"><?=$model4->techo_firme?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.3</td>
        <td align="left" width="60%">Viviendas que carecen de muro firme</td>
        <td align="center" width="20%"><?=$model4->muro_firme?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.4</td>
        <td align="left" width="60%">Viviendas que requieren cuarto adicional</td>
        <td align="center" width="20%"><?=$model4->cuarto_adicional ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.5</td>
        <td align="left" width="60%">Viviendas que requieren instalación de estufa ecológica</td>
        <td align="center" width="20%"><?=$model4->estufa ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.6</td>
        <td align="left" width="60%">Viviendas que requieren conexión a la red de agua potable</td>
        <td align="center" width="20%"><?=$model4->agua_potable ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.7</td>
        <td align="left" width="60%">Viviendas que requieren conexión al servicio de drenaje</td>
        <td align="center" width="20%"><?=$model4->drenaje ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.8</td>
        <td align="left" width="60%">Viviendas que requieren conectarse el servicio de energía eléctrica</td>
        <td align="center" width="20%"><?=$model4->luz ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">1.9</td>
        <td align="left" width="60%">Luminarias de alumbrado público que se requieren en la localidad</td>
        <td align="center" width="20%"><?=$model4->alumbrado ?></td>
    </tr>
    <tr>
        <td align="center" width="15%" rowspan="4">2) Educación</td>
        <td align="center" width="5%">2.1</td>
        <td align="left" width="60%">Menores de edad que no han concluido educación básica</td>
        <td align="center" width="20%"><?=$model4->menor_no_edu_basica?></td>
    </tr>
    <tr>
        <td align="center" width="5%">2.2</td>
        <td align="left" width="60%">Estructuras escolares dañadas que requieran reparación</td>
        <td align="center" width="20%"><?=$model4->estructuras_escolares ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">2.3</td>
        <td align="left" width="60%">Escuelas que requieran acondicionamiento (mobiliario y equipo)</td>
        <td align="center" width="20%"><?=$model4->escuelas_acondicionamiento?></td>
    </tr>
    <tr>
        <td align="center" width="5%">2.4</td>
        <td align="left" width="60%">Adultos que no cuentan con educación básica concluida</td>
        <td align="center" width="20%"><?=$model4->adulto_no_edu_basica ?></td>
    </tr>
    <tr>
        <td align="center" width="15%" rowspan="5">3) Salud</td>
        <td align="center" width="5%">3.1</td>
        <td align="left" width="60%">Cantidad de centros de salud o equivalente existentes en la localidad</td>
        <td align="center" width="20%"><?=$model4->centros_medicos?></td>
    </tr>
    <tr>
        <td align="center" width="5%">3.2</td>
        <td align="left" width="60%">Cantidad de personal médico que presta servicio en el centro de salud</td>
        <td align="center" width="20%"><?=$model4->personal_medico?></td>
    </tr>
    <tr>
        <td align="center" width="5%">3.3</td>
        <td align="left" width="60%">El medicamento del centro de salud es suficiente</td>
        <td align="center" width="20%"><?=$medicamento = ($model4->medicamento == 1) ? 'SI' : 'NO' ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">3.4</td>
        <td align="left" width="60%">Se requieren Jornadas de Salud</td>
        <td align="center" width="20%"><?=$jornada_de_salud = ($model4->jornada_de_salud == 1) ? 'SI' : 'NO'?></td>
    </tr>
    <tr>
        <td align="center" width="5%">3.5</td>
        <td align="left" width="60%">Personas que no están inscritas al seguro popular y lo requieren</td>
        <td align="center" width="20%"><?=$model4->seguro_popular?></td>
    </tr>
    <tr>
        <td align="center" width="15%" rowspan="2">4) Seguridad Social</td>
        <td align="center" width="5%">4.1</td>
        <td align="left" width="60%">Personas que trabajan y no están afiliadas a la seguridad social</td>
        <td align="center" width="20%"><?=$model4->trabajador_no_ss?></td>
    </tr>
    <tr>
        <td align="center" width="5%">4.2</td>
        <td align="left" width="60%">Adultos mayores que no están afiliados a la seguridad social</td>
        <td align="center" width="20%"><?=$model4->adulto_no_ss?></td>
    </tr>
    <tr>
        <td align="center" width="15%" rowspan="5">5) Alimentación</td>
        <td align="center" width="5%">5.1</td>
        <td align="left" width="60%">Personas que se alimentan una o dos veces al día</td>
        <td align="center" width="20%"><?=$model4->alimentan1o2 ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">5.2</td>
        <td align="left" width="60%">Menores de edad que requieren desayunos escolares</td>
        <td align="center" width="20%"><?=$model4->menor_desayunos ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">5.3</td>
        <td align="left" width="60%">Comedores comunitarios que operan en la localidad</td>
        <td align="center" width="20%"><?=$model4->comedor_comunitario ?></td>
    </tr>
    <tr>
        <td align="center" width="5%">5.4</td>
        <td align="left" width="60%">Lecherías Liconsa con que cuenta la localidad</td>
        <td align="center" width="20%"><?=$model4->liconsa?></td>
    </tr>
    <tr>
        <td align="center" width="5%">5.5</td>
        <td align="left" width="60%">Tiendas Diconsa con que cuenta la localidad</td>
        <td align="center" width="20%"><?=$model4->diconsa?></td>
    </tr>
</table>

<pagebreak />
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="left" style="background-color: #FF9933; color: black;" width="100%">
            <b><p>ATENCIÓN COMPLEMENTARIA DE GESTIÓN</p></b>
        </td>
    </tr>
</table>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="80%">
            <b><p>Descripción de la necesidad</p></b>
        </td>
        <td align="center" style="background-color: #D9D9D9; color: black;" width="20%">
            <b><p>Cantidad en número</p></b>
        </td>
    </tr>
    <tr>
        <td width="80%">6) Viviendas que no cuentan con cobertura de servicio público de recolección de basura</td>
        <td width="20%" align="center"><?=$model4->basura ?></td>
    </tr>
    <tr>
        <td width="80%">7) Personas que requieran regularización de cualquier trámite escolar</td>
        <td width="20%" align="center"><?=$model4->tramite ?></td>
    </tr>
    <tr>
        <td width="80%">8) Ambulancia para traslado de pacientes (cuando se requiera)</td>
        <td width="20%" align="center"><?=$model4->ambulancia ?></td>
    </tr>
    <tr>
        <td width="80%">9) Personas que requieren apoyos como créditos o financiamiento</td>
        <td width="20%" align="center"><?=$model4->creditos ?></td>
    </tr>
    <tr>
        <td width="80%">10) Personal de seguridad pública que se requiere en la localidad (policías)</td>
        <td width="20%" align="center"><?=$model4->policia ?></td>
    </tr>
    <tr>
        <td width="80%">11) Cantidad de espacios recreativos que se requieren (parques, jardines, unidades deportivas)</td>
        <td width="20%" align="center"><?=$model4->parques ?></td>
    </tr>
    <tr>
        <td width="80%">12) Centros religiosos que requieran reparación</td>
        <td width="20%" align="center"><?=$model4->iglesias ?></td>
    </tr>
    <tr>
        <td width="80%">13) Personas que requieren tramitar documentos personales (actas de nacimiento o matrimonio, CURP)</td>
        <td width="20%" align="center"><?=$model4->documentos_personales ?></td>
    </tr>
    <tr>
        <td width="80%">14) Personas que requieren apoyo con aparatos ortopédicos y sillas de ruedas</td>
        <td width="20%" align="center"><?=$model4->aparatos_ortopedicos ?></td>
    </tr>
    <tr>
        <td width="80%">15) Personas que requieren apoyo con aparatos auditivos</td>
        <td width="20%" align="center"><?=$model4->aparatos_auditivos ?></td>
    </tr>
    <tr>
        <td width="80%">16) Personas que requieran apoyo con lentes</td>
        <td width="20%" align="center"><?=$model4->lentes ?></td>
    </tr>
</table>

<br>
<br>
<table class="table table-condensed">
    <tr>
        <td align="center">____________________________________________________</td>
        <td align="center">____________________________________________________</td>
    </tr>
    <tr>
        <td align="center"><p style="font-size: 8pt">Nombre completo y firma del responsable de integrar la información</p> </td>
        <td align="center"><p style="font-size: 8pt">Nombre completo y firma del responsable de validar la información</p> </td>
    </tr>
</table>
<?php if($query) : ?>
<pagebreak />
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td align="center" style="background-color: #FF9933; color: black;" width="100%">
            <b><p>ACCIONES COMUNITARIAS</p></b>
        </td>
    </tr>
</table>

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
        <?php if($query) : $i=1; foreach($query as $value){?>
            <tr>
                <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->nombre_accion ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->meta ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->acciones ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $valor1 = $value->meta - $value->acciones?></p></td>
                <?php
                $sumaad1 = $sumaad1 + $value->meta;
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

<?php endif; ?>