<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Censo extends \yii\db\ActiveRecord
{

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solicitante_id'], 'required'],
            [['solicitante_id', 'periodo', 'agua_potable', 'drenaje', 'basura', 'policias', 'parques', 'salones', 'iglesia', 'doctor', 'salud', 'medicamentos', 'lamparas', 'diconsa', 'liconsa', 'comunitario', 'ambulacia', 'otro1', 'documentos', 'vacunacion', 'ortopedicos', 'seguro_popular', 'becas', 'papeles', 'terminar_esc', 'credito', 'luz', 'desayuno', 'otro2', 'grupo_comunitario', 'autoridades_estatales', 'acciones', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha'], 'safe'],
            [['cual1', 'cual2', 'cual3'], 'string', 'max' => 100],
            [['observaciones'], 'string', 'max' => 255],
            [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
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
