<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class Programacion2 extends \yii\db\ActiveRecord
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
        return 'programacion2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['programacion_id', 'asistentes','fecha_inicio', 'fecha_termino', 'actividad', 'ubicacion', 'hora', 'objetivos', 'responsable_actividad', 'responsable_vivienda', 'acuerdos'], 'required', 'message' => 'Campo Requerido'],
            [['programacion_id', 'asistentes', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message' => 'Debe ser un campo numerico'],
            [['fecha_inicio', 'fecha_termino'], 'safe'],
            [['fecha_termino'], 'validateDates'],
            [['actividad', 'ubicacion', 'hora', 'objetivos', 'responsable_actividad', 'responsable_vivienda', 'acuerdos'], 'string', 'max' => 255],
            [['programacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programacion::className(), 'targetAttribute' => ['programacion_id' => 'id']],
        ];
    }

    public function validateDates(){
        $fecha_inicio = $this->fecha_inicio;
        $fecha_termino = $this->fecha_termino;

        if ($fecha_inicio && $fecha_termino){
            $date1 = date_create($fecha_inicio);
            $date2 = date_create($fecha_termino);
            if($date1 > $date2){
                $this->addError('fecha_termino', 'Fecha es menor a la de inicio');
                $this->fechas();
            }
        }

        $anio = Yii::$app->formatter->asDate($this->fecha_inicio, 'yyyy');
        $mes = Yii::$app->formatter->asDate($this->fecha_inicio, 'MM');

        if ($anio == $this->programacion->periodo && $mes == $this->programacion->mes ){
            echo 'bien';
        }
        else{
            $this->addError('fecha_inicio', 'Este fecha no es valida');
            $this->fechas();
        }
    }

    public function fechas(){
        $this->fecha_inicio = Yii::$app->formatter->asDate($this->fecha_inicio, 'dd-MM-yyyy');
        $this->fecha_termino = Yii::$app->formatter->asDate($this->fecha_termino, 'dd-MM-yyyy');

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'programacion_id' => 'Programacion ID',
            'actividad' => 'Actividad, sesión, evento y otros',
            'ubicacion' => 'Ubicación exacta donde se va a realizar actividad, sesión, evento y otros',
            'hora' => 'Hora de inicio programada',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_termino' => 'Fecha Termino',
            'objetivos' => 'Objetivos y tareas a desarrollar',
            'asistentes' => 'Número de Asistentes a la actividad, sesión, evento y otros',
            'responsable_actividad' => 'Responsable de la actividad, sesión, evento y otros',
            'responsable_vivienda' => 'Responsable de validar actividad, sesión, evento y otros',
            'acuerdos' => 'Acuerdos o compromisos',
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
    public function getProgramacion()
    {
        return $this->hasOne(Programacion::className(), ['id' => 'programacion_id']);
    }
}
