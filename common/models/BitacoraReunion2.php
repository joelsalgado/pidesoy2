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
            [['bitacora_reunion_id', 'fechas', 'objetivo', 'acuerdos', 'observaciones', 'autoridades_federales', 'autoridades_estatales', 'autoridades_municipales'], 'required' , 'message' => 'Campo Requerido'],
            [['bitacora_reunion_id', 'autoridades_federales', 'autoridades_estatales', 'autoridades_municipales', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message'=> 'Dede ser Numerico'],
            [['fechas'], 'safe'],
            [['objetivo', 'acuerdos', 'observaciones'], 'string', 'max' => 2000],
            [['bitacora_reunion_id'], 'exist', 'skipOnError' => true, 'targetClass' => BitacoraReunion::className(), 'targetAttribute' => ['bitacora_reunion_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bitacora_reunion_id' => 'Bitacora Reunion ID',
            'fechas' => 'Fechas',
            'objetivo' => 'Objetivo',
            'autoridades_federales' => 'Autoridades Federales',
            'autoridades_estatales' => 'Autoridades Estatales',
            'autoridades_municipales' => 'Autoridades Municipales',
            'acuerdos' => 'Acuerdos',
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
