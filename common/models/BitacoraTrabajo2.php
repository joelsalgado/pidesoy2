<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bitacora_trabajo2".
 *
 * @property int $id
 * @property int $bitacora_trabajo_id
 * @property string $fechas
 * @property string $objetivo
 * @property string $acciones
 * @property int $cumplio
 * @property string $observaciones
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property BitacoraTrabajo $bitacoraTrabajo
 */
class BitacoraTrabajo2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora_trabajo2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bitacora_trabajo_id', 'cumplio','fechas', 'objetivo', 'acciones', 'observaciones'], 'required', 'message' => 'Campo requerido'],
            [['bitacora_trabajo_id', 'cumplio', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fechas'], 'safe'],
            [['objetivo', 'acciones', 'observaciones'], 'string', 'max' => 255],
            [['bitacora_trabajo_id'], 'exist', 'skipOnError' => true, 'targetClass' => BitacoraTrabajo::className(), 'targetAttribute' => ['bitacora_trabajo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bitacora_trabajo_id' => 'Bitacora Trabajo ID',
            'fechas' => 'Fecha de la visita',
            'objetivo' => 'Objetivo de la visita',
            'acciones' => 'Acción o actividad a realizar',
            'cumplio' => 'Se Cumplio?',
            'observaciones' => 'Observaciones',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function getBitacoraTrabajo()
    {
        return $this->hasOne(BitacoraTrabajo::className(), ['id' => 'bitacora_trabajo_id']);
    }
}
