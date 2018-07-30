<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Censo extends \yii\db\ActiveRecord
{

    const SCENARIO_P = 'CENSO';
    public $scenario = 'web';

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className()
            ]
        ];
    }
    public static function tableName()
    {
        return 'censo';
    }

    public function rules()
    {
        if ($this->scenario == self::SCENARIO_P) {
            return [
                [['solicitante_id'], 'required'],
                [['solicitante_id', 'periodo', 'agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud', 'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1', 'documentos', 'vacunacion', 'ortopedicos', 'seguro_popular', 'becas', 'papeles', 'terminar_esc', 'credito', 'luz', 'desayuno', 'otro2', 'grupo_comunitario', 'autoridades_estatales', 'acciones', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message' => 'Debe ser un numero'],
                [['fecha'], 'safe'],
                [['agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud', 'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1'], 'integer', 'max' => 5, 'tooBig' => 'Solo del 1 al 5'],
                [['agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud', 'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1'], 'match', 'pattern' => '/^[1-5+\s]+$/i', 'message' => 'Solo del 1 al 5'],
                [['cual1', 'cual2', 'cual3'], 'string', 'max' => 100],
                [['observaciones'], 'string', 'max' => 255],
                [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
            ];
        }
        else{
            return [
                [['solicitante_id', 'grupo_comunitario', 'autoridades_estatales', 'acciones'], 'required'],
                [['solicitante_id', 'periodo', 'agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud', 'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1', 'documentos', 'vacunacion', 'ortopedicos', 'seguro_popular', 'becas', 'papeles', 'terminar_esc', 'credito', 'luz', 'desayuno', 'otro2', 'grupo_comunitario', 'autoridades_estatales', 'acciones', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message' => 'Debe ser un numero'],
                [['fecha'], 'safe'],
                [['agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud', 'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1'], 'integer', 'max' => 5, 'tooBig' => 'Solo del 1 al 5'],
                [['agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud',
                    'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1'], 'match', 'pattern' => '/^[1-5+\s]+$/i', 'message' => 'Solo del 1 al 5'],
                [['cual1', 'cual2', 'cual3'], 'string', 'max' => 100],
                [['observaciones'], 'string', 'max' => 1500],
                ['grupo_comunitario', 'validateUno'],
                ['grupo_comunitario', 'validateDos'],
                [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
            ];
        }
    }

    public function  validateUno(){
        $x1 = ($this->agua_potable > 0 && $this->agua_potable < 6) ? $this->agua_potable : 0;
        $x2 = ($this->drenaje > 0 && $this->drenaje < 6) ? $this->drenaje : 0;
        $x3 = ($this->basura > 0 && $this->basura < 6) ? $this->basura : 0;
        $x4 = ($this->policias > 0 && $this->policias < 6) ? $this->policias : 0;
        $x5 = ($this->parques > 0 && $this->parques < 6) ? $this->parques : 0;
        $x6 = ($this->salones > 0 && $this->salones < 6) ? $this->salones : 0;
        $x7 = ($this->iglesia > 0 && $this->iglesia < 6) ? $this->iglesia : 0;
        $x8 = ($this->doctor > 0 && $this->doctor < 6) ? $this->doctor : 0;
        $x9 = ($this->salud > 0 && $this->salud < 6) ? $this->salud : 0;
        $x10 = ($this->medicamentos > 0 && $this->medicamentos < 6) ? $this->medicamentos : 0;
        $x11 = ($this->lamparas > 0 && $this->lamparas < 6) ? $this->lamparas : 0;
        $x12 = ($this->diconsa > 0 && $this->diconsa < 6) ? $this->diconsa : 0;
        $x13 = ($this->liconsa > 0 && $this->liconsa < 6) ? $this->liconsa : 0;
        $x14 = ($this->comunitario > 0 && $this->comunitario < 6) ? $this->comunitario : 0;
        $x15 = ($this->ambulacia > 0 && $this->ambulacia < 6) ? $this->ambulacia : 0;
        $x16 = ($this->otro1 > 0 && $this->otro1 < 6) ? $this->otro1 : 0;

        $a = array($x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$x11,$x12,$x13,$x14,$x15, $x16);

        $a = array_filter($a);
        $u = count($a);
        if ($u == 5){
            sort($a, SORT_NUMERIC);
            $y = implode('', $a);

            if ($y == "12345"){
                echo "bien";
            }
            else{
                $this->addError('otro1', 'Los numeros no coinciden');
            }

        }else{
            $this->addError('otro1', 'Deben ser 5 valores');
        }
    }
    public function  validateDos(){
        $x1 = ($this->documentos == 1) ? $this->documentos : 0;
        $x2 = ($this->vacunacion == 1) ? $this->vacunacion : 0;
        $x3 = ($this->ortopedicos == 1) ? $this->ortopedicos : 0;
        $x4 = ($this->seguro_popular == 1) ? $this->seguro_popular : 0;
        $x5 = ($this->becas == 1) ? $this->becas : 0;
        $x6 = ($this->papeles == 1) ? $this->papeles : 0;
        $x7 = ($this->terminar_esc == 1) ? $this->terminar_esc : 0;
        $x8 = ($this->credito == 1) ? $this->credito : 0;
        $x9 = ($this->luz == 1) ? $this->luz : 0;
        $x10 = ($this->desayuno == 1) ? $this->desayuno : 0;
        $x11 = ($this->otro2 == 1) ? $this->otro2 : 0;

        $a = array($x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$x11);

        $a = array_filter($a);
        $u = count($a);

        if ($u != 5){
            $this->addError('otro2', 'Deben ser 5 valores');
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'solicitante_id' => 'Solicitante ID',
            'periodo' => 'Periodo',
            'fecha' => 'Fecha',

            'agua_potable' => 'a) Que tengamos agua potable',
            'drenaje' => 'b) Que tengamos drenaje',
            'basura' => 'c) Que pasen por la basura',
            'policias' => 'd) Que tenga más policías y patrullas',
            'parques' => 'e) Que construyan o recuperen parques, jardines y canchas',
            'salones' => 'f) Se requiere salón o sanitarios en escuela',
            'iglesia' => 'g) Reparar la iglesia',
            'doctor' => 'h) Contar con doctor que nos atienda',
            'salud' => 'i) Tener un centro de salud',
            'medicamentos' => 'j) Tener medicamentos suficientes en el centro de salud',
            'lamparas' => 'k) Tener lámparas en la calle',
            'diconsa' => 'l) Que abran una tienda Diconsa',
            'liconsa' => 'm) Que abran una lechería Liconsa',
            'comunitario' => 'n) Que haya un comedor comunitario',
            'ambulacia' => 'o) Contar con ambulancia para traslado de pacientes, cuando así se requiera',
            'otro1' => 'p) Otro ',
            'cual1' => '¿Cuál?',

            'documentos' => 'a) Necesito tener mis documentos personales (CURP, acta de nacimiento, etc.)',
            'vacunacion' => 'b) Necesito que halla campañas de vacunación y jornadas de salud (que me tomen presión, azúcar, revisen mis dientes, papanicolau, etc).',
            'ortopedicos' => 'c) Necesito aparatos ortopédicos, para escuchar mejor o lentes',
            'seguro_popular' => 'd) Necesito afiliarme al seguro popular',

            'becas' => 'e) Necesito una beca (capacitación o escolar)',
            'papeles' => 'f) Necesito recuperar mis papeles de la escuela',
            'terminar_esc' => 'g) Necesito terminar mi primaria, secundaria o preparato',
            'credito' => 'h) Necesito dinero prestado (crédito)',

            'luz' => 'i) Necesito luz en la casa',
            'desayuno' => 'k) Que los niños reciban un desayuno escolar',
            'otro2' => 'l) Otro ',
            'cual2' => '¿Cuál?',


            'grupo_comunitario' => '3. ¿Es miembro de alguna organización de vecinos u otro grupo comunitario?',
            'cual3' => '¿Cuál?',

            'autoridades_estatales' => '4. ¿Le gustaría participar con las autoridades municipales y estatales para mejorar las condiciones de su localidad y vivienda?',
            'acciones' => '5. ¿Cuenta con tiempo disponible para participar en las acciones de mejora para su localidad y vivienda?',
            'observaciones' => 'Espacio para observaciones',

            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
    }
}
