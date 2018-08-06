<?php

namespace common\models;


use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class BitacoraReunion2 extends \yii\db\ActiveRecord
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
        return 'bitacora_reunion2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bitacora_reunion_id', 'fechas', 'observaciones', 'actividad_realizar', 'nombre_ejecucion', 'nombre_supervisar', 'cumplio'], 'required' , 'message' => 'Campo Requerido'],
            [['bitacora_reunion_id', 'autoridades_federales', 'autoridades_estatales', 'autoridades_municipales', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'cumplio'], 'integer', 'message'=> 'Dede ser Numerico'],
            [['fechas'], 'safe'],
            [['fechas'], 'validateDates'],
            [['objetivo', 'acuerdos', 'observaciones'], 'string', 'max' => 2000],
            [['nombre_ejecucion', 'nombre_supervisar', 'actividad_realizar'], 'string', 'max' => 255],
            [['bitacora_reunion_id'], 'exist', 'skipOnError' => true, 'targetClass' => BitacoraReunion::className(), 'targetAttribute' => ['bitacora_reunion_id' => 'id']],
        ];
    }

    public function validateDates(){
        $año = Yii::$app->formatter->asDate($this->fechas, 'yyyy');
        $mes = Yii::$app->formatter->asDate($this->fechas, 'MM');

        if ($año == $this->bitacoraReunion->periodo && $mes == $this->bitacoraReunion->mes ){
            echo 'bien';
        }
        else{
            $this->addError('fechas', 'Este fecha no es valida');
            $fecha = Yii::$app->formatter->asDate($this->fechas, 'dd-MM-yyyy');
            $this->fechas = $fecha;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bitacora_reunion_id' => 'Bitacora Reunion ID',
            'fechas' => 'Fecha De Reunión',
            'actividad_realizar' => 'Actividad a Realizar',
            'nombre_ejecucion' => 'Nombre del Responsable de la Ejecución de la Actividad',
            'nombre_supervisar' => 'Nombre del Responsable de Supervisar el Cumplimiento de la Actividad',
            'cumplio' => '¿Se cumplio?',
            'objetivo' => 'Objetivo De La Reunión',
            'autoridades_federales' => 'Autoridades Federales',
            'autoridades_estatales' => 'Autoridades Estatales',
            'autoridades_municipales' => 'Autoridades Municipales',
            'acuerdos' => 'Acuerdos Tomados',
            'observaciones' => 'Observaciones',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getBitacoraReunion()
    {
        return $this->hasOne(BitacoraReunion::className(), ['id' => 'bitacora_reunion_id']);
    }
}
