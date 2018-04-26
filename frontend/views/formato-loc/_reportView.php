<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 09/04/2018
 * Time: 09:54 AM
 */

?>
<table class="table table-condensed">
    <tr>
        <td>
            <img class="rounded float-left" src="<?= Yii::$app->homeUrl ?>images/logoedo.png" height="100" width="100">
        </td>
        <td align="center">
            <p align="center" style="font-size: small"><b>SECRETARÍA DE DESARROLLO SOCIAL</b></p>
            <p align="center" style="font-size: small">FORMATO DE INFORMACIÓN SOCIO-POLÍTICA DE LA LOCALIDAD</p>
        </td>
        <td align="right">
            <img style="text-align:right" src="<?= Yii::$app->homeUrl ?>images/logomex.png" height="100" width="100">
        </td>
    </tr>
</table>

<table class="table table-condensed" border="1">
    <thead>
    <tr>
        <th colspan="6" style="background-color:#a4a4a7" align="center">ANÁLISIS DE LA LOCALIDAD</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="2" align="center" style="background-color:#a4a4a7"><b>REGIÓN</b></td>
        <td colspan="2" align="center" style="background-color:#a4a4a7"><b>MUNICIPIO</b></td>
        <td colspan="2" align="center" style="background-color:#a4a4a7"><b>LOCALIDAD</b></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><?= $model->region->desc_region ?></td>
        <td colspan="2" align="center"><?= $model->mun->desc_mun ?></td>
        <td colspan="2" align="center"><?= $model->loc->desc_loc ?></td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="background-color:#a4a4a7"><b>No. DE HABITANTES</b></td>
        <td colspan="2" align="center" style="background-color:#a4a4a7"><b>OCUPANTES PROMEDIO POR VIVIENDA</b></td>
        <td colspan="2" align="center" style="background-color:#a4a4a7"><b>ÍNDICE DE DESARROLLO SOCIAL Y HUMANO</b></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><?= $model->num_habitantes ?></td>
        <td colspan="2" align="center"><?= $model->ocupantes_por_vivienda ?></td>
        <td colspan="2" align="center"><?= $model->indice_marginacion ?></td>
    </tr>
    <tr>
        <td colspan="6" style="background-color:#a4a4a7" align="center"><b>ANÁLISIS DE LA LOCALIDAD</b></td>
    </tr>
    <tr>
        <td colspan="6"><b>1. Identificación de hogares y residentes:</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->indentificacion_hogares ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>2. Calidad y espacios de la vivienda:</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->calidad_vivienda ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>3. Acceso a servicios básicos:</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->serv_basicos ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>4. Acceso a la educación:</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->acceso_edu ?></td>
    </tr>
    <tr>
        <td colspan="2">PREESCOLAR</td>
        <td colspan="2">PRIMARIA</td>
        <td colspan="2">SECUNDARIA</td>
    </tr>
    <tr>
        <td colspan="2"><?= $model->preescolar ?></td>
        <td colspan="2"><?= $model->primaria ?></td>
        <td colspan="2"><?= $model->secundaria ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>5. Salud</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->salud ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>6. Seguridad social</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->seguridad_social ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>7. Ingresos</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->ingresos ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>8. Alimentación</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->alimentacion ?></td>
    </tr>
    <tr>
        <td colspan="6" ><b>9. Vinculación a programas de Desarrollo Social</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->vinculacion ?></td>
    </tr>
    <tr>
        <td colspan="3">LICONSA</td>
        <td colspan="3">DICONSA</td>
    </tr>
    <tr>
        <td colspan="3"><?= $liconsa = ($model->liconsa == 1)? 'SI' : 'NO' ?></td>
        <td colspan="3"><?= $Diconsa = ($model->diconsa == 1)? 'SI' : 'NO' ?></td>
    </tr>
    <tr>
        <td colspan="6" style="background-color:#a4a4a7" align="center"><b>DESCRIPCIÓN DE ACCESO TERRESTRE</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->acceso_terrestre ?></td>
    </tr>
    <tr>
        <td colspan="6" style="background-color:#a4a4a7" align="center"><b>REPRESENTACIÓN EN LA LOCALIDAD</b></td>
    </tr>
    <tr>
        <td colspan="2">Delegación Municipal</td>
        <td colspan="2">Copaci</td>
        <td colspan="2">Comisariado Ejidal </td>
    </tr>
    <tr>
        <td colspan="2"><?= $model->delegacion_municipal ?></td>
        <td colspan="2"><?= $model->copaci ?></td>
        <td colspan="2"><?= $model->comisariado ?></td>
    </tr>
    <tr>
        <td colspan="2">Consejo de Vigilancia</td>
        <td colspan="2">Comité de Agua Potable</td>
        <td colspan="2">Comité de Prospera </td>
    </tr>
    <tr>
        <td colspan="2"><?= $model->vigilancia ?></td>
        <td colspan="2"><?= $model->agua ?></td>
        <td colspan="2"><?= $model->comite_prospera ?></td>
    </tr>
    <tr>
        <td colspan="6" style="background-color:#a4a4a7" align="center"><b>PRINCIPALES NECESIDADES:</b></td>
    </tr>
    <tr>
        <td colspan="6"><?= $model->necesidades ?></td>
    </tr>
    <tr>
        <td colspan="6" style="background-color:#a4a4a7" align="center"><b>DATOS GENERALES DEL AYUNTAMIENTO</b></td>
    </tr>
    <tr>
        <td colspan="2"><b>Nombre del Presidente Municipal</b></td>
        <td colspan="2"><b>Domicilio del Presidente Municipal</b></td>
        <td colspan="2"><b>Contacto del Presidente Municipal</b></td>
    </tr>
    <tr>
        <td colspan="2"><?= $model->nombre_presidente ?></td>
        <td colspan="2"><?= $model->domicilio_presidente ?></td>
        <td colspan="2"><?= $model->contacto_presidente ?></td>
    </tr>
    <tr>
        <td colspan="2"><b>Nombre del Integrante del Cabildo</b></td>
        <td colspan="2"><b>Domicilio del Integrante del Cabildo</b></td>
        <td colspan="2"><b>Contacto del Integrante del Cabildo</b></td>
    </tr>
    <?php if($cabildo): ?>
        <?php foreach ($cabildo as $cabil){ ?>
    <tr>
        <td colspan="2"><?= $cabil->nombre_cabildo ?></td>
        <td colspan="2"><?= $cabil->domicilio_cabildo ?></td>
        <td colspan="2"><?= $cabil->contacto_cabildo ?></td>
    </tr>
        <?php } ?>
    <?php else: ?>
        <tr>
            <td colspan="2"> </td>
            <td colspan="2"> </td>
            <td colspan="2"> </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td colspan="2"><b>Nombre del Director Municipal</b></td>
        <td colspan="2"><b>Domicilio del Director Municipal</b></td>
        <td colspan="2"><b>Contacto del Director Municipal</b></td>
    </tr>
    <?php if($directores): ?>
    <?php foreach ($directores as $dir){ ?>
    <tr>
        <td colspan="2"><?= $dir->nombre_director ?></td>
        <td colspan="2"><?= $dir->domicilio_director ?></td>
        <td colspan="2"><?= $dir->contacto_director ?></td>
    </tr>
    <?php } ?>
    <?php else: ?>
        <tr>
            <td colspan="2"> </td>
            <td colspan="2"> </td>
            <td colspan="2"> </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td colspan="6" style="background-color:#a4a4a7" align="center"><b>ACTIVIDADES RELEVANTES</b></td>
    </tr>
    <tr>
        <td colspan="3"><b>FECHA</b></td>
        <td colspan="3"><b>DESCRIPCIÓN</b></td>
    </tr>
    <?php if($actividades): ?>
        <?php foreach ($actividades as $act){ ?>
            <tr>
                <td colspan="3"><?= $act->fecha ?></td>
                <td colspan="3"><?= $act->descripcion ?></td>
            </tr>
        <?php } ?>
    <?php else: ?>
        <tr>
            <td colspan="3"> </td>
            <td colspan="3"> </td>
        </tr>
    <?php endif; ?>




</table>
