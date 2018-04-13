<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class DirectoresMunicipales extends \yii\db\ActiveRecord
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
        return 'directores_municipales';
    }

    public function rules()
    {
        return [
            [['formato_id'], 'required'],
            [['formato_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['nombre_director', 'domicilio_director', 'contacto_director'], 'string', 'max' => 255],
            [['formato_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormatoLoc::className(), 'targetAttribute' => ['formato_id' => 'id']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'formato_id' => 'Formato ID',
            'nombre_director' => 'Nombre',
            'domicilio_director' => 'Domicilio',
            'contacto_director' => 'Contacto',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormato()
    {
        return $this->hasOne(FormatoLoc::className(), ['id' => 'formato_id']);
    }
}
