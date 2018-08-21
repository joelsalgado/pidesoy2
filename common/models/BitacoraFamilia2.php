<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class BitacoraFamilia2 extends \yii\db\ActiveRecord
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
        return 'bitacora_familia2';
    }

    public function rules()
    {
        return [
            [['bitacora_familia_id', 'fechas', 'observaciones', 'actividad_realizar', 'nombre_ejecucion', 'nombre_supervisar', 'cumplio'], 'required' , 'message' => 'Campo Requerido'],
            [['bitacora_familia_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'cumplio'], 'integer', 'message'=> 'Dede ser Numerico'],
            [['fechas'], 'safe'],
            [['fechas'], 'validateDates'],
            [['objetivo', 'observaciones'], 'string', 'max' => 2000],
            [['nombre_ejecucion', 'nombre_supervisar', 'actividad_realizar'], 'string', 'max' => 255],
            [['bitacora_familia_id'], 'exist', 'skipOnError' => true, 'targetClass' => BitacoraFamilia::className(), 'targetAttribute' => ['bitacora_familia_id' => 'id']],
        ];
    }

    public function validateDates(){
        $año = Yii::$app->formatter->asDate($this->fechas, 'yyyy');
        $mes = Yii::$app->formatter->asDate($this->fechas, 'MM');

        if ($año == $this->bitacoraFamilia->periodo && $mes == $this->bitacoraFamilia->mes ){
            echo 'bien';
        }
        else{
            $this->addError('fechas', 'Este fecha no es valida');
            $fecha = Yii::$app->formatter->asDate($this->fechas, 'dd-MM-yyyy');
            $this->fechas = $fecha;
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bitacora_familia_id' => 'Bitacora familia ID',
            'fechas' => 'Fecha De Reunión',
            'actividad_realizar' => 'Actividad a Realizar',
            'nombre_ejecucion' => 'Nombre del Responsable de la Ejecución de la Actividad',
            'nombre_supervisar' => 'Nombre del Responsable de Supervisar el Cumplimiento de la Actividad',
            'cumplio' => '¿Se cumplio?',
            'objetivo' => 'Objetivo De La Reunión',
            'observaciones' => 'Observaciones',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoraFamilia()
    {
        return $this->hasOne(BitacoraFamilia::className(), ['id' => 'bitacora_familia_id']);
    }
}
