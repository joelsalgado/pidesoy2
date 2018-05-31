<?php

namespace common\models;

use Yii;

class BitacoraFamilia extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'bitacora_familia';
    }

    public function rules()
    {
        return [
            [['entidad_id', 'region_id', 'mun_id', 'familia', 'loc_id', 'resp_institucional', 'resp_comunitario', 'fecha'], 'required', 'message' => 'Campo Requerido'],
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha'], 'safe'],
            [['familia', 'resp_institucional', 'resp_comunitario', 'domicilio'], 'string', 'max' => 255],
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
            'familia' => 'Familia',
            'resp_institucional' => 'Nombre del Responsable Institucional:',
            'resp_comunitario' => 'Nombre del Responsable Comunitario',
            'fecha' => 'Fecha',
            'domicilio' => 'Anote el domicilio de la Familia con las referencias de localización inlcuidas:',
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

    public function getLoc()
    {
        return $this->hasOne(Localidades::className(), ['localidad_id' => 'loc_id']);
    }

    public function getMun()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id']);
    }

    public function getRegion()
    {
        return $this->hasOne(Regiones::className(), ['id' => 'region_id']);
    }
}
