<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class BitacoraReunion extends \yii\db\ActiveRecord
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
        return 'bitacora_reunion';
    }


    public function rules()
    {
        return [
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'resp_institucional', 'resp_comunitario', 'fecha'], 'required', 'message' => 'Campo Requerido'],
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha'], 'safe'],
            [['resp_institucional', 'resp_comunitario'], 'string', 'max' => 255],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad_id' => 'Clave del Estado',
            'region_id' => 'Region',
            'mun_id' => 'Municipio',
            'loc_id' => 'Localidad',
            'resp_institucional' => 'Nombre del Responsable Institucional:',
            'resp_comunitario' => 'Nombre del Responsable Comunitario',
            'fecha' => 'Fecha',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function getEntidad()
    {
        return $this->hasOne(EntidadNacimiento::className(), ['id' => 'entidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoc()
    {
        return $this->hasOne(Localidades::className(), ['localidad_id' => 'loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMun()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regiones::className(), ['id' => 'region_id']);
    }
}
