<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 16/08/18
 * Time: 01:10 PM
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
            <b><p>PARTICIPANTE</p></b>
        </td>
    </tr>
</table><br>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
    <tr>
        <td width="50%"></td>
        <td width="15%" align="center" style="background-color: #CC0066; color: white;">
            Municipio:
        </td>
        <td width="35%" align="right"><b><?=$model->mun->desc_mun?></b></td>
    </tr>
    <tr>
        <td width="50%"></td>
        <td width="15%" align="center" style="background-color: #CC0066; color: white;">
            Localidad:
        </td>
        <td width="35%" align="right"> <b><?=$model->loc->nombre_loc?></b></td>
    </tr>
</table>

<br>

<div class="alert alert-success-general" role="alert">
    <strong>DATOS PERSONALES</strong>
    <i class="fa fa-user" aria-hidden="true"></i>
</div>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="33%" align="left">
            <font  color="#CC0066;"><b>Nombre: </b></font><?=$model->nombre?>
        </td>
        <td width="33%" align="center">
            <font  color="#CC0066;"><b>Apellido Paterno: </b></font><?=$model->apellido_paterno?>
        </td>
        <td width="33%" align="right">
            <font  color="#CC0066;"><b>Apellido Materno: </b></font><?=$model->apellido_materno?>
        </td>
    </tr>
</table>
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="20%" align="left">
            <font  color="#CC0066;"><b>Estado Civil: </b></font><?=$model->edoCivil->desc_edo_civil?>
        </td>
        <td width="15%" align="center">
            <font  color="#CC0066;"><b>Sexo: </b></font><?=$model->sexo?>
        </td>
        <td width="35%" align="center">
            <font  color="#CC0066;"><b>Fecha de Nacimiento: </b></font><?= $fec_nac = ($model->fecha_nacimiento) ? Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd-MM-yyyy') : '' ?>
        </td>
        <td width="30%" align="right">
            <font  color="#CC0066;"><b>Teléfono: </b></font><?=$model->telefono?>
        </td>
    </tr>
</table><br>

<div class="alert alert-success-general" role="alert">
    <strong>DIRECCIÓN DE LA VIVIENDA</strong>
    <i class="fa fa-user" aria-hidden="true"></i>
</div>

<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="50%" align="left">
            <font  color="#CC0066;"><b>Calle: </b></font><?=$model->calle?>
        </td>
        <td width="50%" align="right">
            <font  color="#CC0066;"><b>Colonia: </b></font><?=$model->colonia?>
        </td>
    </tr>
</table>
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="50%" align="left">
            <font  color="#CC0066;"><b>Número Exteror: </b></font><?=$model->num_ext?>
        </td>
        <td width="50%" align="right">
            <font  color="#CC0066;"><b>Número Interior: </b></font><?=$model->num_int?>
        </td>
    </tr>
</table>
<br>
<table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr>
        <td width="25%" align="left">
            <font  color="#CC0066;"><b>Código Postal: </b></font><?=$model->codigo_postal?>
        </td>
        <td width="75%" align="right">
            <font  color="#CC0066;"><b>Rasgo Físico que ayude a ubicar la vivienda: </b></font><?=$model->otra_referencia ?>
        </td>
    </tr>
</table>
<?php if($seguimiento):?>
    <hr class="style18">

    <b><p style="color:#CC0066; font-size: XX-large" align="center" >SEGUIMIENTO</p></b>

    <?php if($seguimiento->meta_piso == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>COLOCACIÓN DE PISO FIRME</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_piso ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_piso = ($seguimiento->fecha_inicio_piso) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_piso, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_piso = ($seguimiento->fecha_entrega_piso) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_piso, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_piso ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa = ($seguimiento->programa_piso) ? $seguimiento->programaPiso->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_piso ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_piso == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_piso = ($seguimiento->fecha_termino_piso) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_piso, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_techo == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>COLOCACIÓN DE TECHO FIRME</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_techo ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_techo = ($seguimiento->fecha_inicio_techo) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_techo, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_techo = ($seguimiento->fecha_entrega_techo) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_techo, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_techo ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_techo = ($seguimiento->programa_techo) ? $seguimiento->programaTecho->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_techo ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_techo == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_techo = ($seguimiento->fecha_termino_techo) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_techo, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_muro == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>COLOCACIÓN DE MURO FIRME</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_muro ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_muro = ($seguimiento->fecha_inicio_muro) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_muro, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_muro = ($seguimiento->fecha_entrega_muro) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_muro, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_muro ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_muro = ($seguimiento->programa_muro) ? $seguimiento->programaMuro->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_muro ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_muro == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_muro = ($seguimiento->fecha_termino_muro) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_muro, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_cuarto == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>CONSTRUCCIÓN DE CUARTO ADICIONAL</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_cuarto ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_cuarto = ($seguimiento->fecha_inicio_cuarto) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_cuarto, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_cuarto = ($seguimiento->fecha_entrega_cuarto) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_cuarto, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_cuarto ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_cuarto = ($seguimiento->programa_cuarto) ? $seguimiento->programaCuarto->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_cuarto ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_cuarto == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_cuarto = ($seguimiento->fecha_termino_cuarto) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_cuarto, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_agua_potable == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>VIVIENDAS CON ACCESO AL SERVICIO DE AGUA POTABLE (RED PÚBLICA)</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_agua_potable ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_agua_potable = ($seguimiento->fecha_inicio_agua_potable) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_agua_potable, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_agua_potable = ($seguimiento->fecha_entrega_agua_potable) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_agua_potable, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_agua_potable ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_agua_potable = ($seguimiento->programa_agua_potable) ? $seguimiento->programaAguaPotable->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_agua_potable ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_agua_potable == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_agua_potable = ($seguimiento->fecha_termino_agua_potable) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_agua_potable, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_agua_interior == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>VIVIENDAS CON CONEXIÓN DE TOMA DE AGUA AL INTERIOR DE LA VIVIENDA</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_agua_interior ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_agua_interior = ($seguimiento->fecha_inicio_agua_interior) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_agua_interior, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_agua_interior = ($seguimiento->fecha_entrega_agua_interior) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_agua_interior, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_agua_interior ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_agua_interior = ($seguimiento->programa_agua_interior) ? $seguimiento->programaAguaInterior->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_agua_interior ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_agua_interior == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_agua_interior = ($seguimiento->fecha_termino_agua_interior) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_agua_interior, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_drenaje == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>VIVIENDAS CON CONEXIÓN AL DRENAJE PÚBLICO O BIOGIGESTORES</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_drenaje ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_drenaje = ($seguimiento->fecha_inicio_drenaje) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_drenaje, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_drenaje = ($seguimiento->fecha_entrega_drenaje) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_drenaje, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_drenaje ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_drenaje = ($seguimiento->programa_drenaje) ? $seguimiento->programaDrenaje->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_drenaje ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_drenaje == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_drenaje = ($seguimiento->fecha_termino_drenaje) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_drenaje, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_luz == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>VIVIENDAS CON CONEXIÓN DE ENERGÍA ELÉCTRICA</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_luz ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_luz = ($seguimiento->fecha_inicio_luz) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_luz, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_luz = ($seguimiento->fecha_entrega_luz) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_luz, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_luz ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_luz = ($seguimiento->programa_luz) ? $seguimiento->programaLuz->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_luz ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_luz == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_luz = ($seguimiento->fecha_termino_luz) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_luz, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_estufa == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>VIVIENDAS CON ESTUFAS ENTREGADAS</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_estufa ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_estufa = ($seguimiento->fecha_inicio_estufa) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_estufa, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_estufa = ($seguimiento->fecha_entrega_estufa) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_estufa, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_estufa ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_estufa = ($seguimiento->programa_estufa) ? $seguimiento->programaEstufa->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_estufa ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_estufa == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_estufa = ($seguimiento->fecha_termino_estufa) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_estufa, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_seguro_popular == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>AFILIADOS AL SEGURO POPULAR</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_seguro_popular ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_seguro_popular = ($seguimiento->fecha_inicio_seguro_popular) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_seguro_popular, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_seguro_popular = ($seguimiento->fecha_entrega_seguro_popular) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_seguro_popular, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_seguro_popular ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_seguro_popular = ($seguimiento->programa_seguro_popular) ? $seguimiento->programaSeguroPopular->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_seguro_popular ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_seguro_popular == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_seguro_popular = ($seguimiento->fecha_termino_seguro_popular) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_seguro_popular, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_3_15_escuela == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>PERSONAS DE 3 A 15 AÑOS QUE ASISTEN A LA ESCUELA</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_3_15_escuela ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_3_15_escuela = ($seguimiento->fecha_inicio_3_15_escuela) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_3_15_escuela, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_3_15_escuela = ($seguimiento->fecha_entrega_3_15_escuela) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_3_15_escuela, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_3_15_escuela ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_3_15_escuela = ($seguimiento->programa_3_15_escuela) ? $seguimiento->programa315Escuela->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_3_15_escuela ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_3_15_escuela == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_3_15_escuela = ($seguimiento->fecha_termino_3_15_escuela) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_3_15_escuela, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_antes_1982_primaria == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>NACIDOS ANTES DE 1982 CON CERTIFICADO DE PRIMARIA</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_antes_1982_primaria ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_antes_1982_primaria = ($seguimiento->fecha_inicio_antes_1982_primaria) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_antes_1982_primaria, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_antes_1982_primaria = ($seguimiento->fecha_entrega_antes_1982_primaria) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_antes_1982_primaria, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_antes_1982_primaria ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_antes_1982_primaria = ($seguimiento->programa_antes_1982_primaria) ? $seguimiento->programaAntes1982Primaria->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_antes_1982_primaria ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_antes_1982_primaria == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_antes_1982_primaria = ($seguimiento->fecha_termino_antes_1982_primaria) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_antes_1982_primaria, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_despues_1982_secundaria == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>NACIDOS DESPUÉS DE 1982 CON CERTIFICADO DE SECUNDARIA</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_despues_1982_secundaria ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_despues_1982_secundaria = ($seguimiento->fecha_inicio_despues_1982_secundaria) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_despues_1982_secundaria, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_despues_1982_secundaria = ($seguimiento->fecha_entrega_despues_1982_secundaria) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_despues_1982_secundaria, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_despues_1982_secundaria ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_despues_1982_secundaria = ($seguimiento->programa_despues_1982_secundaria) ? $seguimiento->programaDespues1982Secundaria->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_despues_1982_secundaria ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_despues_1982_secundaria == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_despues_1982_secundaria = ($seguimiento->fecha_termino_despues_1982_secundaria) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_despues_1982_secundaria, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_despensas == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>NECESIDAD ALIMENTARIA (DESPENSAS)</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_despensas ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_despensas = ($seguimiento->fecha_inicio_despensas) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_despensas, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_despensas = ($seguimiento->fecha_entrega_despensas) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_despensas, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_despensas ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_despensas = ($seguimiento->programa_despensas) ? $seguimiento->programaDespensas->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_despensas ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_despensas == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_despensas = ($seguimiento->fecha_termino_despensas) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_despensas, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_ss == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>TRABAJADOR AFILIADO A LA SEGURIDAD SOCIAL</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_ss ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_ss = ($seguimiento->fecha_inicio_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_ss, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_ss = ($seguimiento->fecha_entrega_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_ss, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_ss ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_ss = ($seguimiento->programa_ss) ? $seguimiento->programaSs->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_ss ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_ss == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_trabajadores_ss = ($seguimiento->fecha_termino_trabajadores_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_trabajadores_ss, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_trabajadores_ss == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>BENEFICIARIOS DE TRABAJADORES CON ACCESO A LA SEGURIDAD SOCIAL</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_trabajadores_ss ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_trabajadores_ss = ($seguimiento->fecha_inicio_trabajadores_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_trabajadores_ss, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_trabajadores_ss = ($seguimiento->fecha_entrega_trabajadores_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_trabajadores_ss, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_trabajadores_ss ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_trabajadores_ss = ($seguimiento->programa_trabajadores_ss) ? $seguimiento->programaTrabajadoresSs->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_trabajadores_ss ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_trabajadores_ss == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_trabajadores_ss = ($seguimiento->fecha_termino_trabajadores_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_trabajadores_ss, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

    <?php if($seguimiento->meta_adultos_ss == 1):?>
        <div class="alert alert-success-general" role="alert">
            <strong>PERSONAS MAYORES DE 65 AÑOS INSCRITOS AL PROGRAMA DE PENSIONES</strong>
        </div>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $seguimiento->meta_adultos_ss ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio_adultos_ss = ($seguimiento->fecha_inicio_adultos_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_inicio_adultos_ss, 'dd-MM-yyyy') : '' ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega_adultos_ss = ($seguimiento->fecha_entrega_adultos_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_entrega_adultos_ss, 'dd-MM-yyyy') : '' ?>
                </td>
            </tr>
        </table>
        <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
            <tr>
                <td width="30%" align="left">
                    <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $seguimiento->inversion_adultos_ss ?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $programa_adultos_ss = ($seguimiento->programa_adultos_ss) ? $seguimiento->programaAdultosSs->desc_programa  : ''?>
                </td>
                <td width="35%" align="right">
                    <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $seguimiento->acciones_adultos_ss ?>
                </td>
            </tr>
        </table>
        <?php if($seguimiento->acciones_adultos_ss == 1):?>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="left">
                        <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino_adultos_ss = ($seguimiento->fecha_termino_adultos_ss) ? Yii::$app->formatter->asDate($seguimiento->fecha_termino_adultos_ss, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
        <br>
    <?php endif; ?>

<?php endif; ?>


<?php if($adicionales): ?>
    <hr class="style18">
    <b><p style="color:#CC0066; font-size: XX-large" align="center" >ACCIONES ADICIONALES</p></b>
    <?php foreach ($adicionales as $value) {?>
        <?php if($value->meta >= 1):?>
            <div class="alert alert-success-general" role="alert">
                <strong><?= $value->nombre_accion ?></strong>
            </div>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="30%" align="left">
                        <font  color="#CC0066;"><b>Acciones A Realizar (Meta): </b></font><?= $value->meta ?>
                    </td>
                    <td width="35%" align="right">
                        <font  color="#CC0066;"><b>Fecha De Inicio De La Acción: </b></font><?= $fecha_inicio = ($value->fecha_inicio) ? Yii::$app->formatter->asDate($value->fecha_inicio, 'dd-MM-yyyy') : '' ?>
                    </td>
                    <td width="35%" align="right">
                        <font  color="#CC0066;"><b>Fecha De Entrega Programada: </b></font><?= $fecha_entrega = ($value->fecha_entrega) ? Yii::$app->formatter->asDate($value->fecha_entrega, 'dd-MM-yyyy') : '' ?>
                    </td>
                </tr>
            </table>
            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="30%" align="left">
                        <font  color="#CC0066;"><b>Inversión (Costo): </b></font><?= $value->inversion ?>
                    </td>
                    <td width="35%" align="right">
                        <font  color="#CC0066;"><b>Programa Mediante El Cual Se Realiza La Acción: </b></font><?= $value->programa ?>
                    </td>
                    <td width="35%" align="right">
                        <font  color="#CC0066;"><b>Acciones Realizadas (Avance): </b></font><?= $value->acciones ?>
                    </td>
                </tr>
            </table>
            <?php if($value->acciones == 1):?>
                <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                    <tr>
                        <td width="100%" align="left">
                            <font  color="#CC0066;"><b>Fecha De Término Real De La Acción: </b></font><?= $fecha_termino = ($value->fecha_termino) ? Yii::$app->formatter->asDate($value->fecha_termino, 'dd-MM-yyyy') : '' ?>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
            <br>
        <?php endif; ?>
    <?php } ?>
<?php endif; ?>


<hr>
<div class="alert alert-success-general" role="alert">
    <strong>VINCULACIÓN A PROGRAMAS DE DESARROLLO SOCIAL (FEDERALES Y ESTATALES)</strong>
</div>

<font  color="#CC0066;"><b>¿La familia es beneficiaria del Programa de Inclusión Social PROSPERA?: </b> </font><?=$prospera = ($cedula->prospera == 1) ? 'SI' : 'NO'?>
    <br>
<font  color="#CC0066;"><b>En el hogar algún o algunos miembros tienen acceso a Programas de Desarrollo Social: </b> </font><?=$prospera = ($cedula->programa_desarrollo_social == 1) ? 'SI' : 'NO'?>

<br><br>
<?php if($cedula2): ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">No.</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Programa</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Nombre Recibe Programa</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Titular</p></b></td>
            <td align="center" style="background-color: #BFBFBF;"><b><p style="font-size: 7pt">Parentesco</p></b></td>
        </tr>
        </thead>
        <tbody>
        <?php if($cedula2) : $i=1; foreach($cedula2 as $value){?>
            <tr>
                <td align="center"><p style="font-size: 7pt"><?= $i++; ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $programa = ($value->cual_programa) ? $value->programa->desc_programa : 'NINGUNO'?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->nombre_recibe_programa ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $value->titular ?></p></td>
                <td align="center"><p style="font-size: 7pt"><?= $parentesco = ($value->parentesco_recibe_programa) ? $value->parentescoRecibePrograma->desc_parentesco : ''  ?></p></td>
            </tr>
        <?php }endif;?>
        </tbody>
    </table>
<?php endif;?>
