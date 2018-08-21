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
        <td rowspan="2"  width="15%">
            <img  src="<?= Yii::$app->homeUrl ?>images/colors.png" width="160" height="55">
        </td>
        <td align="right" width="85%">
            <b><p style="color:#CC0066; font-size: xx-small">FAMILIAS FUERTES, COMUNIDADES CON TODO</p></b>
        </td>
    </tr>
    <tr>
        <td align="right" style="background-color: #CC0066; color: white;" width="85%">
            <b><p>BITACORA DE TRABAJO POR VIVIENDA</p></b>
        </td>
    </tr>
</table><br>

<table class="table table-condensed">
    <tr>
        <td align="center" style="background-color: #CC0066; color: white;">
            Municipio:
        </td>
        <td><b><?=$model->mun->desc_mun?></b></td>
        <td align="right">Fecha: <?= $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): '';?></td>
    </tr>
    <tr>
        <td align="center" style="background-color: #CC0066; color: white;">
            Localidad:
        </td>
        <td> <b><?=$model->loc->nombre_loc?></b></td>
        <td></td>
    </tr>
</table>


<table class="table table-bordered">
    <thead>
    <tr>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No.</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">FECHA DE VISITA</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">ACTIVIDAD A REALIZAR</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">NOMBRE DEL RESPONSABLE DE LA EJECUCIÓN DE LA ACTIVIDAD</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">NOMBRE DEL RESPONSABLE DE SUPERVISAR EL CUMPLIMIENTO </p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">¿SE CUMPLIÓ?</p></b></td>
        <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">OBSERVACIONES</p></b></td>
    </tr>
    </thead>
    <tbody>
    <?php if($model2) : $i=1; foreach($model2 as $value){?>
        <tr>
            <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->fechas = ($value->fechas)? Yii::$app->formatter->asDate($value->fechas, 'dd-MM-yyyy'): '';?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->actividad_realizar ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->nombre_ejecucion ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->nombre_supervisar ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $cumplio = ($value->cumplio == 1) ? 'SI' : 'NO' ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->observaciones ?></p></td>
        </tr>
    <?php }endif;?>
    </tbody>
</table>
<br>
<br>
<table class="table table-condensed">
    <tr>
        <td align="center">_________________________________________________</td>
        <td align="center">_________________________________________________</td>
    </tr>
    <tr>
        <td align="center"><p style="font-size: 6pt">Nombre completo y firma del responsable del llenado de la bitácora</p> </td>
        <td align="center"><p style="font-size: 6pt">Nombre completo y firma del responsable de validar la información</p> </td>
    </tr>
</table>
