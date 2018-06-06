<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;

class ActividadesRelevantes extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'actividades_relevantes';
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ]
        ];
    }

    public function rules()
    {
        return [
            [['region_id', 'mun_id', 'loc_id', 'created_at', 'updated_at','fecha','descripcion'], 'required', 'message' => 'Campo requerido'],
            [['region_id', 'mun_id', 'loc_id', 'obra_comunitaria', 'status', 'created_by', 'updated_by'], 'integer', 'message' => 'Debe ser numerico'],
            [['fecha', 'created_at', 'updated_at'], 'safe'],
            [['descripcion','dependencia', 'responsable', 'cargo'], 'string', 'max' => 255],
            [['inversion'], 'number'],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Región',
            'mun_id' => 'Municipio',
            'loc_id' => 'Localidad',
            'obra_comunitaria' => 'Obra Comunitaria',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripción',
            'inversion' => 'Inversión',
            'dependencia' => 'Dependencia Responsable',
            'responsable' => 'Nombre del Responsable',
            'cargo' => 'Cargo',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
