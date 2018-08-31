<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 31/08/18
 * Time: 12:35 PM
 */
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