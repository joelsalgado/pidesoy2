<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "desg_censo".
 *
 * @property string $desc_loc
 * @property int $mun_id
 * @property int $region_id
 * @property string $total
 * @property string $agua_potable
 * @property string $drenaje
 * @property string $basura
 * @property string $policias
 * @property string $parques
 * @property string $salones
 * @property string $iglesia
 * @property string $doctor
 * @property string $salud
 * @property string $medicamentos
 * @property string $lamparas
 * @property string $diconsa
 * @property string $liconsa
 * @property string $comunitario
 * @property string $ambulacia
 * @property string $otro1
 * @property string $documentos
 * @property string $vacunacion
 * @property string $ortopedicos
 * @property string $seguro_popular
 * @property string $becas
 * @property string $papeles
 * @property string $terminar_esc
 * @property string $credito
 * @property string $luz
 * @property string $desayuno
 * @property string $otro2
 * @property string $grupo_comunitario_si
 * @property string $grupo_comunitario_no
 * @property string $autoridades_estatales_si
 * @property string $autoridades_estatales_no
 * @property string $acciones_si
 * @property string $acciones_no
 */
class DesgCenso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desg_censo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_loc'], 'required'],
            [['mun_id', 'region_id'], 'integer'],
            [['total', 'agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud', 'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1', 'documentos', 'vacunacion', 'ortopedicos', 'seguro_popular', 'becas', 'papeles', 'terminar_esc', 'credito', 'luz', 'desayuno', 'otro2', 'grupo_comunitario_si', 'grupo_comunitario_no', 'autoridades_estatales_si', 'autoridades_estatales_no', 'acciones_si', 'acciones_no'], 'number'],
            [['desc_loc'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desc_loc' => 'Desc Loc',
            'mun_id' => 'Mun ID',
            'region_id' => 'Region ID',
            'total' => 'Total',
            'agua_potable' => 'Agua Potable',
            'drenaje' => 'Drenaje',
            'basura' => 'Basura',
            'policias' => 'Policias',
            'parques' => 'Parques',
            'salones' => 'Salones',
            'iglesia' => 'Iglesia',
            'doctor' => 'Doctor',
            'salud' => 'Salud',
            'medicamentos' => 'Medicamentos',
            'lamparas' => 'Lamparas',
            'diconsa' => 'Diconsa',
            'liconsa' => 'Liconsa',
            'comunitario' => 'Comunitario',
            'ambulacia' => 'Ambulacia',
            'otro1' => 'Otro1',
            'documentos' => 'Documentos',
            'vacunacion' => 'Vacunacion',
            'ortopedicos' => 'Ortopedicos',
            'seguro_popular' => 'Seguro Popular',
            'becas' => 'Becas',
            'papeles' => 'Papeles',
            'terminar_esc' => 'Terminar Esc',
            'credito' => 'Credito',
            'luz' => 'Luz',
            'desayuno' => 'Desayuno',
            'otro2' => 'Otro2',
            'grupo_comunitario_si' => 'Grupo Comunitario Si',
            'grupo_comunitario_no' => 'Grupo Comunitario No',
            'autoridades_estatales_si' => 'Autoridades Estatales Si',
            'autoridades_estatales_no' => 'Autoridades Estatales No',
            'acciones_si' => 'Acciones Si',
            'acciones_no' => 'Acciones No',
        ];
    }

    public function actionCenso($loc)
    {
        $value = self::find()->where(['desc_loc' => $loc])->one();

        $array = array (
            "elemento-1" => array (
                "nombre" => "Que tengamos agua potable",
                "orden"  => $value->agua_potable
            ),

            "elemento-2" => array (
                "nombre" => "Que tengamos drenaje",
                "orden"  => $value->drenaje
            ),

            "elemento-3" => array (
                "nombre" => "Que pasen por la basura",
                "orden"  => $value->basura
            ),

            "elemento-4" => array (
                "nombre" => "Que tenga más policías y patrullas",
                "orden"  => $value->policias
            ),
            "elemento-5" => array (
                "nombre" => "Que construyan o recuperen parques, jardines y canchas",
                "orden"  => $value->parques
            ),
            "elemento-6" => array (
                "nombre" => "Se requiere salón o sanitarios en escuela",
                "orden"  => $value->salones
            ),
            "elemento-7" => array (
                "nombre" => "Reparar la iglesia",
                "orden"  => $value->iglesia
            ),
            "elemento-8" => array (
                "nombre" => "Contar con doctor que nos atienda",
                "orden"  => $value->doctor
            ),
            "elemento-9" => array (
                "nombre" => "Tener un centro de salud",
                "orden"  => $value->salud
            ),
            "elemento-10" => array (
                "nombre" => "Tener medicamentos suficientes en el centro de salud",
                "orden"  => $value->medicamentos
            ),
            "elemento-11" => array (
                "nombre" => "Tener lámparas en la calle",
                "orden"  => $value->lamparas
            ),
            "elemento-12" => array (
                "nombre" => "Que abran una tienda Diconsa",
                "orden"  => $value->diconsa
            ),
            "elemento-13" => array (
                "nombre" => "Que abran una lechería Liconsa",
                "orden"  => $value->liconsa
            ),
            "elemento-14" => array (
                "nombre" => "Que haya un comedor comunitario",
                "orden"  => $value->comunitario
            ),
            "elemento-15" => array (
                "nombre" => "Contar con ambulancia para traslado de pacientes, cuando así se requiera",
                "orden"  => $value->ambulacia
            ),
            "elemento-16" => array (
                "nombre" => "Otro",
                "orden"  => $value->otro1
            )
        );
        usort($array, array($this,'sort_by_orden1'));
        //echo '<pre>';
        //var_dump($array);die;
        $io = [$array[15]['nombre'],$array[14]['nombre'],$array[13]['nombre'],$array[12]['nombre'],$array[11]['nombre']];
       return $io;
    }

    private static function sort_by_orden1 ($a, $b) {
        return $a['orden'] - $b['orden'];
    }

    public function actionCenso2($loc)
    {
        $value = self::find()->where(['desc_loc' => $loc])->one();

        $array = array (
            "elemento-1" => array (
                "nombre" => "Necesito tener mis documentos personales (CURP, acta de nacimiento, etc.)",
                "orden"  => $value->documentos
            ),

            "elemento-2" => array (
                "nombre" => "Necesito que halla campañas de vacunación y jornadas de salud (que me tomen presión, azúcar, revisen mis dientes, papanicolau, etc).",
                "orden"  => $value->vacunacion
            ),

            "elemento-3" => array (
                "nombre" => "Necesito aparatos ortopédicos, para escuchar mejor o lentes",
                "orden"  => $value->ortopedicos
            ),

            "elemento-4" => array (
                "nombre" => "Necesito afiliarme al seguro popular",
                "orden"  => $value->seguro_popular
            ),
            "elemento-5" => array (
                "nombre" => "Necesito una beca (capacitación o escolar)",
                "orden"  => $value->becas
            ),
            "elemento-6" => array (
                "nombre" => "Necesito recuperar mis papeles de la escuela",
                "orden"  => $value->papeles
            ),
            "elemento-7" => array (
                "nombre" => "Necesito terminar mi primaria, secundaria o preparato",
                "orden"  => $value->terminar_esc
            ),
            "elemento-8" => array (
                "nombre" => "Necesito dinero prestado (crédito)",
                "orden"  => $value->credito
            ),
            "elemento-9" => array (
                "nombre" => "Necesito luz en la casa",
                "orden"  => $value->luz
            ),
            "elemento-10" => array (
                "nombre" => "Que los niños reciban un desayuno escolar",
                "orden"  => $value->desayuno
            ),
            "elemento-11" => array (
                "nombre" => "Otro",
                "orden"  => $value->otro2
            )
        );
        usort($array, array($this,'sort_by_orden2'));
        //echo '<pre>';
        //var_dump($array);die;
        $io = [$array[10]['nombre'],$array[9]['nombre'],$array[8]['nombre'],$array[7]['nombre'],$array[6]['nombre']];
        return $io;
    }

    private static function sort_by_orden2 ($a, $b) {
        return $a['orden'] - $b['orden'];
    }
}
