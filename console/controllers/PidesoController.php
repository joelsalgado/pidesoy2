<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 02/04/2018
 * Time: 06:24 PM
 */

namespace console\controllers;

ini_set('max_execution_time', "0");
ini_set("memory_limit", "-1");

use common\models\Solicitantes;
use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use common\models\Localidades;

class PidesoController extends Controller
{
    public function actionIndex()
    {
        $datos = Json::decode(file_get_contents('./pideso10.json'));
        foreach ($datos['rows'] as $data) {

            $entidad = ($data['cveEntidad'] == null) ? 15 : $data['cveEntidad'];
            $region = $data['cveRegion'];
            $municipio = $data['cveMunicipio'];
            $loc = Localidades::find()->where(['loc_grandes_id' => $data['cveLocalidad']])->one();

            if ($loc){
                $localidad = $loc->localidad_id;
            }
            else{
                $muni = Localidades::find()->where(['mun_id' => $municipio])->one();
                $localidad = $muni->localidad_id;
            }

            $nomb = trim(strtoupper($data['nombre']));
            $pat = trim(strtoupper($data['primerApellido']));
            $mat = trim(strtoupper($data['segundoApellido']));

            $nombres = ($nomb == null ) ? 'XX': $nomb;
            $paterno = ($pat == null ) ? 'XX': $pat;
            $materno = ($mat == null ) ? 'XX': $mat;

            switch ($data['estadoCivil']){
                case 'CASADO':
                    $edo_civil = 2;
                    break;
                case 'SOLTERO':
                    $edo_civil = 1;
                    break;
                default:
                    $edo_civil = 8;
            }

            $fecha_nac = ($data['fechaDeNacimiento'] == null) ? '1910-01-01' : $data['fechaDeNacimiento'];
            $sexo = ($data['sexo'] == 'MUJER')? 'M' : 'H';
            $telefono = ($data['telefonoFijo'] == null ) ? '123':$data['telefonoFijo'];
            $calle = ($data['calle'] == null ) ? 'SIN CALLE':$data['calle'];
            $colonia = ($data['colonia'] == null ) ? 'COLONIA':$data['colonia'];
            $ext = ($data['numeroExterior'] == null ) ? 'S/N':$data['numeroExterior'];
            $int = ($data['numeroInterior'] == null ) ? 'S/N':$data['numeroInterior'];
            $codigo_postal = ($data['codigoPostal'] == null ) ? 50000 :$data['codigoPostal'];
            $otra_referencia = ($data['otraReferencia'] == null ) ? 'NO' :$data['otraReferencia'];

            $cuantos_habitan = ($data['cuantosHabitan'] == null ) ? 1 :$data['cuantosHabitan'];
            $personas_0_15 = ($data['personas0a15'] == null ) ? 0 :$data['personas0a15'];
            $personas_16_17 = ($data['personas16a17'] == null ) ? 0 :$data['personas16a17'];
            $personas_18_74 = ($data['personas18a74'] == null ) ? 0 :$data['personas18a74'];
            $personas_65_mas = ($data['personas65oMas'] == null ) ? 0 :$data['personas65oMas'];
            $tiempo_anios = ($data['tiempoDeHabitacionAnios'] == null ) ? 0 :$data['tiempoDeHabitacionAnios'];
            $tiempo_meses = ($data['tiempoDeHabitacionMeses'] == null ) ? 0 :$data['tiempoDeHabitacionMeses'];

            switch ($data['laViviendaEs']){
                case 'COMPARTIDA FAMILIAR':
                    $vivienda_es = 2;
                    break;
                case 'PRESTADA':
                    $vivienda_es = 3;
                    break;
                case 'PROPIA':
                    $vivienda_es = 1;
                    break;
                case 'RENTADA':
                    $vivienda_es = 4;
                    break;
                default:
                    $vivienda_es = 1;
            }

            $familias_vivienda = ($data['familiasEnLaVivienda'] == null ) ? 1 :$data['familiasEnLaVivienda'];

            switch ($data['pisoFirme']){
                case 'SI':
                    $piso_firme = 1;
                    break;
                case 'NO':
                    $piso_firme = 0;
                    break;
                default:
                    $piso_firme = 0;
            }

            $piso_material = ($data['materialPiso'] == null ) ? '' :$data['materialPiso'];

            switch ($data['techoFirme']){
                case 'SI':
                    $techo_firme = 1;
                    break;
                case 'NO':
                    $techo_firme = 0;
                    break;
                default:
                    $techo_firme = 0;
            }

            $techo_material = ($data['materialTecho'] == null ) ? '' :$data['materialTecho'];

            switch ($data['muroFirme']){
                case 'SI':
                    $muro_firme = 1;
                    break;
                case 'NO':
                    $muro_firme = 0;
                    break;
                default:
                    $muro_firme = 0;
            }

            $muro_material = ($data['materialMuro'] == null ) ? '' :$data['materialMuro'];

            $habitaciones = ($data['habitaciones'] == null ) ? 1 :$data['habitaciones'];

            switch ($data['aguaPublica']){
                case 'SI':
                    $agua_publica = 1;
                    break;
                case 'NO':
                    $agua_publica = 0;
                    break;
                default:
                    $agua_publica = 0;
            }

            $fuente_agua = ($data['fuenteDeAgua'] == null ) ? '' :$data['fuenteDeAgua'];

            switch ($data['aguaEnInterior']){
                case 'SI':
                    $agua_interior = 1;
                    break;
                case 'NO':
                    $agua_interior = 0;
                    break;
                default:
                    $agua_interior = 0;
            }

            switch ($data['drenajePublico']){
                case 'SI':
                    $drenaje = 1;
                    break;
                case 'NO':
                    $drenaje = 0;
                    break;
                default:
                    $drenaje = 0;
            }

            switch ($data['desemboque']){
                case 'SI':
                    $desemboque = 1;
                    break;
                case 'NO':
                    $desemboque = 0;
                    break;
                default:
                    $desemboque = 0;
            }

            switch ($data['energiaElectrica']){
                case 'SI':
                    $luz = 1;
                    break;
                case 'NO':
                    $luz = 0;
                    break;
                default:
                    $luz = 0;
            }

            $cocina_gas = ($data['cocinaConGas'] == 'SI') ? 1 : 0;
            $cocina_luz = ($data['cocinaConElectricidad'] == 'SI') ? 1 : 0;
            $cocina_lena = ($data['cocinaConLena'] == 'SI') ? 1 : 0;
            $cocina_carbon = ($data['cocinaConCarbon'] == 'SI') ? 1 : 0;
            $cocina_otro = ($data['cocinaConOtro'] == 'SI') ? 1 : 0;
            $cocina_otro_c = ($data['otroCombustible'] == null) ? '' : $data['otroCombustible'];

            switch ($data['chimenea']){
                case 'SI':
                    $chimenea = 1;
                    break;
                case 'NO':
                    $chimenea = 0;
                    break;
                default:
                    $chimenea = 8;
            }

            switch ($data['educacionTrunca3a15']){
                case 'SI':
                    $edu_trunca_3_15 = 1;
                    break;
                case 'NO':
                    $edu_trunca_3_15 = 0;
                    break;
                default:
                    $edu_trunca_3_15 = 0;
            }

            $causa_3_15 = ($data['causa3a15'] == null) ? '' : $data['causa3a15'];

            switch ($data['noAsisteEscuela3a15']){
                case 'SI':
                    $no_asiste = 1;
                    break;
                case 'NO':
                    $no_asiste = 0;
                    break;
                default:
                    $no_asiste = 0;
            }

            $causa_no_asiste= ($data['causaInasistencia3a15'] == null) ? '' : $data['causaInasistencia3a15'];

            switch ($data['primariaIncompleta33oMas']){
                case 'SI':
                    $prim_incompleta = 1;
                    break;
                case 'NO':
                    $prim_incompleta = 0;
                    break;
                default:
                    $prim_incompleta = 0;
            }

            switch ($data['secundariaIncompleta16a33']){
                case 'SI':
                    $sec_incompleta = 1;
                    break;
                case 'NO':
                    $sec_incompleta = 0;
                    break;
                default:
                    $sec_incompleta = 0;
            }

            switch ($data['tieneServiciosMedicos']){
                case 'SI':
                    $serv_medicos = 1;
                    break;
                case 'NO':
                    $serv_medicos = 0;
                    break;
                default:
                    $serv_medicos = 0;
            }

            $seguro_popular = ($data['seguroPopular'] == 'SI') ? 1 : 0;
            $issemym = ($data['issemym'] == 'SI') ? 1 : 0;
            $imss = ($data['imss'] == 'SI') ? 1 : 0;
            $sedena= ($data['marinaSedena'] == 'SI') ? 1 : 0;
            $issste = ($data['issste'] == 'SI') ? 1 : 0;
            $pemex = ($data['pemex'] == 'SI') ? 1 : 0;
            $otro_serv_med = ($data['otroServicio'] == 'SI') ? 1 : 0;
            $otro_serv_med_desc = ($data['otroServicioMedico'] == null) ? '' : $data['otroServicioMedico'];

            switch ($data['trabajaIntegrante']){
                case 'SI':
                    $trabaja_formalmente = 1;
                    break;
                case 'NO':
                    $trabaja_formalmente = 0;
                    break;
                default:
                    $trabaja_formalmente = 0;
            }

            switch ($data['seguridadSocial']){
                case 'SI':
                    $seguridad_social = 1;
                    break;
                case 'NO':
                    $seguridad_social = 0;
                    break;
                default:
                    $seguridad_social = 0;
            }

            switch ($data['sinSS65oMas']){
                case 'SI':
                    $no_SS_65_mas = 1;
                    break;
                case 'NO':
                    $no_SS_65_mas = 0;
                    break;
                default:
                    $no_SS_65_mas = 0;
            }

            $cuantos_ingresos = ($data['cuantosIngresos'] == null) ? 0 : $data['cuantosIngresos'];
            $jefe = ($data['jefeConIngresos'] == 'SI') ? 1 : 0;
            $jefa = ($data['jefaConIngresos'] == 'SI') ? 1 : 0;
            $hijos = ($data['hijosConIngresos'] == 'SI') ? 1 : 0;
            $ingreso_total = ($data['ingresoTotal'] == null) ? 0 : $data['ingresoTotal'];


            switch ($data['autoIngreso']){
                case 'SI':
                    $auto_ingreso = 1;
                    break;
                case 'NO':
                    $auto_ingreso = 0;
                    break;
                default:
                    $auto_ingreso = 0;
            }

            $monto_autoingreso = ($data['montoAutoIngreso'] == null) ? 0 : $data['montoAutoIngreso'];
            $actividad_autoingreso = ($data['actividadAutoIngreso'] == null) ? '' : $data['montoAutoIngreso'];

            switch ($data['apoyoGobierno']){
                case 'SI':
                    $apoyo_gob = 1;
                    break;
                case 'NO':
                    $apoyo_gob = 0;
                    break;
                default:
                    $apoyo_gob = 0;
            }

            $monto_gob = ($data['montoApoyoGobierno'] == null) ? 0 : $data['montoApoyoGobierno'];
            $que_programa = ($data['quePrograma'] == null) ? '' : $data['quePrograma'];

            switch ($data['apoyoExtranjero']){
                case 'SI':
                    $apoyo_ext = 1;
                    break;
                case 'NO':
                    $apoyo_ext = 0;
                    break;
                default:
                    $apoyo_ext = 0;
            }

            $monto_ext = ($data['montoApoyoExtranjero'] == null) ? 0 : $data['montoApoyoExtranjero'];

            switch ($data['pension']){
                case 'SI':
                    $pension = 1;
                    break;
                case 'NO':
                    $pension = 0;
                    break;
                default:
                    $pension = 0;
            }

            $monto_pension = ($data['montoPension'] == null) ? 0 : $data['montoPension'];

            switch ($data['madreSolteraTrabajadora']){
                case 'SI':
                    $madre_soltero = 1;
                    break;
                case 'NO':
                    $madre_soltero = 0;
                    break;
                default:
                    $madre_soltero = 0;
            }

            $menor_poca_variedad = ($data['menorConPocaVariedad'] == 'SI') ? 1 : 0;
            $menor_falta_aliemntacion = ($data['menorConFaltaDeAlimentos'] == 'SI') ? 1 : 0;
            $menor_menor_porcion = ($data['menorConMenosPorcion'] == 'SI') ? 1 : 0;
            $menor_hambre = ($data['menorConHambre'] == 'SI') ? 1 : 0;
            $menor_acosto_hambre = ($data['menorSeAcostoConHambre'] == 'SI') ? 1 : 0;
            $menor_sin_comer_dia = ($data['menorSinComerUnDia'] == 'SI') ? 1 : 0;
            $adulto_poca_variedad  = ($data['adultoConPocaVariedad'] == 'SI') ? 1 : 0;
            $adulto_falta_alimentos = ($data['adultoConFaltaDeAlimentos'] == 'SI') ? 1 : 0;
            $adulto_menor_porcion = ($data['adultoConMenosPorcion'] == 'SI') ? 1 : 0;
            $adulto_sin_comida = ($data['sinComida'] == 'SI') ? 1 : 0;
            $adulto_hambre = ($data['adultoConHambre'] == 'SI') ? 1 : 0;
            $adulto_sin_comer_dia = ($data['adultoSinComerUnDia'] == 'SI') ? 1 : 0;

            $liconsa = ($data['tarjetaLiconsa'] == 'SI') ? 1 : 0;
            $diconsa = ($data['accesoTiendaDiconsa'] == 'SI') ? 1 : 0;
            $abastece_diconsa = ($data['compraTiendaDiconsa'] == 'SI') ? 1 : 0;
            $comedor_comunitario = ($data['comedorComunitarioCercano'] == 'SI') ? 1 : 0;
            $usa_comedor_comunitario = ($data['usaComedorComunitario'] == 'SI') ? 1 : 0;
            $pds = ($data['accesoPds'] == 'SI') ? 1 : 0;
            $prospera = ($data['prospera'] == 'SI') ? 1 : 0;


            $solicitante = new Solicitantes();
            $solicitante->periodo = 2017;
            $solicitante->entidad_id = $entidad;
            $solicitante->region_id = $region;
            $solicitante->mun_id = $municipio;
            $solicitante->loc_id = $localidad;
            $solicitante->nombre = $nombres;
            $solicitante->apellido_paterno = $paterno;
            $solicitante->apellido_materno = $materno;
            $solicitante->edo_civil_id = $edo_civil;
            $solicitante->fecha_nacimiento = $fecha_nac;
            $solicitante->sexo = $sexo;
            $solicitante->telefono = $telefono;
            $solicitante->calle = $calle;
            $solicitante->colonia = $colonia;
            $solicitante->num_ext = $ext;
            $solicitante->num_int = $int;
            $solicitante->codigo_postal = $codigo_postal;
            $solicitante->otra_referencia = $otra_referencia;
            $solicitante->status = 1;
            $solicitante->created_at = '2017-11-28 20:41:06';
            $solicitante->updated_at = '2017-11-28 20:41:06';
            $solicitante->created_by = 1;
            $solicitante->updated_by = 1;

            if($solicitante->save())
            {
                echo "bien";
            }
            else{
                echo "error";
            }





        }
    }
}