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
            $codigo_postal = ($data['codigoPostal'] == null ) ? '':$data['codigoPostal'];

            echo $data['personas16a17'];
        }die;
    }
}