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

            $nomb = trim(strtoupper($data['nombre']));
            $pat = trim(strtoupper($data['primerApellido']));
            $mat = trim(strtoupper($data['segundoApellido']));

            $nombres = ($nomb == null ) ? '': $nomb;
            $paterno = ($pat == null ) ? '': $pat;
            $materno = ($mat == null ) ? '': $mat;

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

            $fecha_nac = ($data['fechaDeNacimiento'] == null) ? 1910-01-01 : $data['fechaDeNacimiento'];
            $sexo = ($data['sexo'] == 'MUJER')? 'M' : 'H';
            $telefono = ($data['telefonoFijo'] == null ) ? '':$data['telefonoFijo'];
            $calle = ($data['calle'] == null ) ? '':$data['calle'];
            $colonia = ($data['colonia'] == null ) ? '':$data['colonia'];
            $ext = ($data['numeroExterior'] == null ) ? '':$data['numeroExterior'];
            $int = ($data['numeroInterior'] == null ) ? '':$data['numeroInterior'];
            $codigo_postal = ($data['codigoPostal'] == null ) ? 50000 :$data['codigoPostal'];
            $otra_referencia = ($data['otraReferencia'] == null ) ? '' :$data['otraReferencia'];

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
            










            echo $data['personas16a17'];
        }die;
    }
}