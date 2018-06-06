<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class AccionesAdicionales extends \yii\db\ActiveRecord
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
        return 'acciones_adicionales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solicitante_id', 'nombre_accion', 'meta', 'fecha_inicio', 'fecha_entrega', 'acciones', 'inversion'], 'required', 'message' => 'Campo requerido'],
            [['solicitante_id', 'periodo', 'meta', 'acciones', 'acciones_pendientes', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message'=> 'Debe ser numerico'],
            [['inversion'], 'number', 'message' => 'Debe ser numerico'],
            //[['acciones'], 'boolean', 'message' => 'Solo 0 y 1'],
            [['fecha_inicio', 'fecha_entrega', 'fecha_termino'], 'safe'],
            [['nombre_accion', 'programa', 'responsable'], 'string', 'max' => 120],
            [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
            [['acciones'], 'validateAdicionales'],
        ];
    }

    public function validateAdicionales()
    {
        if($this->meta >= 1){
            $fecha_inicio = $this->fecha_inicio;
            $fecha_entrega = $this->fecha_entrega;
            $fecha_termino = $this->fecha_termino;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio', 'Fecha Obligatoria');
                $this->fecha_inicio = ($this->fecha_inicio)? Yii::$app->formatter->asDate($this->fecha_inicio, 'dd-MM-yyyy'): null;
                $this->fecha_entrega = ($this->fecha_entrega)? Yii::$app->formatter->asDate($this->fecha_entrega, 'dd-MM-yyyy'): null;
                $this->fecha_termino = ($this->fecha_termino)? Yii::$app->formatter->asDate($this->fecha_termino, 'dd-MM-yyyy'): null;
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega', 'Fecha Obligatoria');
                $this->fecha_inicio = ($this->fecha_inicio)? Yii::$app->formatter->asDate($this->fecha_inicio, 'dd-MM-yyyy'): null;
                $this->fecha_entrega = ($this->fecha_entrega)? Yii::$app->formatter->asDate($this->fecha_entrega, 'dd-MM-yyyy'): null;
                $this->fecha_termino = ($this->fecha_termino)? Yii::$app->formatter->asDate($this->fecha_termino, 'dd-MM-yyyy'): null;
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega', 'Fecha es menor a la de inicio');
                    $this->fecha_inicio = ($this->fecha_inicio)? Yii::$app->formatter->asDate($this->fecha_inicio, 'dd-MM-yyyy'): null;
                    $this->fecha_entrega = ($this->fecha_entrega)? Yii::$app->formatter->asDate($this->fecha_entrega, 'dd-MM-yyyy'): null;
                    $this->fecha_termino = ($this->fecha_termino)? Yii::$app->formatter->asDate($this->fecha_termino, 'dd-MM-yyyy'): null;
                }
            }

            if ($this->acciones >= 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino', 'Fecha Obligatoria');
                    $this->fecha_inicio = ($this->fecha_inicio)? Yii::$app->formatter->asDate($this->fecha_inicio, 'dd-MM-yyyy'): null;
                    $this->fecha_entrega = ($this->fecha_entrega)? Yii::$app->formatter->asDate($this->fecha_entrega, 'dd-MM-yyyy'): null;
                    $this->fecha_termino = ($this->fecha_termino)? Yii::$app->formatter->asDate($this->fecha_termino, 'dd-MM-yyyy'): null;
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino', 'Fecha es menor a la de inicio');
                        $this->fecha_inicio = ($this->fecha_inicio)? Yii::$app->formatter->asDate($this->fecha_inicio, 'dd-MM-yyyy'): null;
                        $this->fecha_entrega = ($this->fecha_entrega)? Yii::$app->formatter->asDate($this->fecha_entrega, 'dd-MM-yyyy'): null;
                        $this->fecha_termino = ($this->fecha_termino)? Yii::$app->formatter->asDate($this->fecha_termino, 'dd-MM-yyyy'): null;
                    }
                }
            }

        }

        if ($this->meta < $this->acciones){
            $this->addError('acciones', 'Las acciones superan el numero de meta');
            $this->fecha_inicio = ($this->fecha_inicio)? Yii::$app->formatter->asDate($this->fecha_inicio, 'dd-MM-yyyy'): null;
            $this->fecha_entrega = ($this->fecha_entrega)? Yii::$app->formatter->asDate($this->fecha_entrega, 'dd-MM-yyyy'): null;
            $this->fecha_termino = ($this->fecha_termino)? Yii::$app->formatter->asDate($this->fecha_termino, 'dd-MM-yyyy'): null;

        }

    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'solicitante_id' => 'Solicitante ID',
            'periodo' => 'Periodo',
            'nombre_accion' => 'Nombre de la Acción',
            'meta' => 'Acciones A Realizar (Meta)',
            'acciones' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes' => 'Acciones Pendientes Por Realizar',
            'inversion' => 'Inversión (Costo)',
            'fecha_inicio' => 'Fecha De Inicio De La Acción',
            'fecha_entrega' => 'Fecha De Entrega Programada',
            'fecha_termino' => 'Fecha De Término Real De La Acción',
            'programa' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable' => 'Responsable Designado Del Programa De Atención',
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