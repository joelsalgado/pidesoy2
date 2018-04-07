<?php

namespace common\models;

use Yii;

class FormatoLoc extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'formato_loc';
    }

    public function rules()
    {
        return [
            [['region_id', 'mun_id', 'loc_id', 'created_at', 'updated_at'], 'required'],
            [['region_id', 'mun_id', 'loc_id', 'num_habitantes', 'ocupantes_por_vivienda', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['indice_marginacion', 'indentificacion_hogares', 'calidad_vivienda', 'serv_basicos', 'acceso_edu', 'salud', 'seguridad_social', 'ingresos', 'alimentacion', 'vinculacion', 'acceso_terrestre'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'REGIÓN',
            'mun_id' => 'MUNICIPIO',
            'loc_id' => 'LOCALIDAD',
            'num_habitantes' => 'No. DE HABITANTES',
            'ocupantes_por_vivienda' => 'OCUPANTES PROMEDIO POR VIVIENDA',
            'indice_marginacion' => 'ÍNDICE DE MARGINACIÓN',
            'indentificacion_hogares' => '1. Identificación de hogares y residentes:',
            'calidad_vivienda' => '2. Calidad y espacios de la vivienda',
            'serv_basicos' => '3. Acceso a servicios básicos.',
            'acceso_edu' => '4. Acceso a la educación',
            'salud' => '5. Salud',
            'seguridad_social' => '6. Seguridad Social',
            'ingresos' => '7 . Ingresos',
            'alimentacion' => '8. Alimentación',
            'vinculacion' => '9. Vinculación a programas de Desarrollo Social',
            'acceso_terrestre' => 'DESCRIPCIÓN DE ACCESO TERRESTRE',
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
    public function getRegion()
    {
        return $this->hasOne(Regiones::className(), ['id' => 'region_id']);
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
}
