<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 23/08/18
 * Time: 02:46 PM
 */
?>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td rowspan="2"  width="10%">
            <img  src="<?= Yii::$app->homeUrl ?>images/colors.png" width="160" height="55">
        </td>
        <td align="right" width="90%">
            <b><p style="color:#222522; font-size: xx-small">FAMILIAS FUERTES, COMUNIDADES CON TODO</p></b>
        </td>
    </tr>
    <tr>
        <td align="right" style="background-color: #70AD47; color: white;" width="85%">
            <b><p>PROGRAMACIÓN Y SEGUIMIENTO DE ACTIVIDADES, SESIONES, EVENTOS Y OTROS POR LOCALIDAD</p></b>
        </td>
    </tr>
</table><br>

<table class="table table-condensed">
    <tr>
        <td align="center" style="background-color: #70AD47; color: white;">
            Municipio:
        </td>
        <td><b><?=$model->mun->desc_mun?></b></td>
        <td align="right">Fecha: <?= $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): '';?></td>
    </tr>
    <tr>
        <td align="center" style="background-color: #70AD47; color: white;">
            Localidad:
        </td>
        <td> <b><?=$model->loc->nombre_loc?></b></td>
        <td></td>
    </tr>
</table>

<table class="table table-bordered">
    <thead>
    <tr>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">No.</p></b></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Actividad, sesión, evento y otros</p></b></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Ubicación exacta donde se va a realizar actividad, sesión, evento y otros</p></b></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Hora de inicio programada</p></b></td>
        <td colspan="2" align="center" style="background-color: #70AD47; color: white;"><p style="font-size: 7pt">Fecha</p></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Objetivos y tareas a desarrollar</p></b></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Número de Asistentes a la actividad, sesión, evento y otros</p></b></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Responsable de la actividad, sesión, evento y otros</p></b></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Responsable de validar actividad, sesión, evento y otros</p></b></td>
        <td rowspan="2" align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Acuerdos o compromisos</p></b></td>
    </tr>
    <tr>

        <td align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Fecha Inicio </p></b></td>
        <td align="center" style="background-color: #70AD47; color: white;"><b><p style="font-size: 7pt">Fecha Termino</p></b></td>

    </tr>
    </thead>
    <tbody>
    <?php if($model2) : $i=1; foreach($model2 as $value){?>
        <tr>
            <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->actividad; ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->ubicacion; ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->hora; ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->fecha_inicio = ($value->fecha_inicio)? Yii::$app->formatter->asDate($value->fecha_inicio, 'dd-MM-yyyy'): '';?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->fecha_termino = ($value->fecha_termino)? Yii::$app->formatter->asDate($value->fecha_termino, 'dd-MM-yyyy'): '';?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->objetivos ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->asistentes ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->responsable_actividad ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->responsable_vivienda ?></p></td>
            <td align="center"><p style="font-size: 7pt"><?= $value->acuerdos ?></p></td>
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
        <td align="center"><p style="font-size: 6pt">Nombre completo y firma del responsable de integrar la información</p> </td>
        <td align="center"><p style="font-size: 6pt">Nombre completo y firma del responsable de validar la información</p> </td>
    </tr>
</table>


