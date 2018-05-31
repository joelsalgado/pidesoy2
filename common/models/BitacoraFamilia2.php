<?php

namespace common\models;

use Yii;


class BitacoraFamilia2 extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'bitacora_familia2';
    }

    public function rules()
    {
        return [
            [['bitacora_familia_id', 'cumplio','fechas', 'objetivo', 'acciones', 'observaciones'], 'required', 'message' => 'Campo requerido'],
            [['bitacora_familia_id', 'cumplio', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fechas'], 'safe'],
            [['objetivo', 'acciones', 'observaciones'], 'string', 'max' => 255],
            [['bitacora_familia_id'], 'exist', 'skipOnError' => true, 'targetClass' => BitacoraFamilia::className(), 'targetAttribute' => ['bitacora_familia_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bitacora_familia_id' => 'Bitacora Familia ID',
            'fechas' => 'Fechas',
            'objetivo' => 'Objetivo',
            'acciones' => 'Acciones',
            'cumplio' => 'Se Cumplio?',
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
