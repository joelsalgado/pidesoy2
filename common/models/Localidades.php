<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_localidades".
 *
 * @property int $id
 * @property int $entidad_federativa_id
 * @property int $mun_id
 * @property int $localidad_id
 * @property string $desc_loc
 * @property string $nombre_loc
 * @property string $tipo_loc
 * @property double $latitud_loc
 * @property double $longitud_loc
 * @property int $regionalizacion_id
 * @property int $loc_grandes_id
 * @property int $loc_fuertes_id
 * @property string $cieps_desc
 *
 * @property CatMunicipios $mun
 */
class Localidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_localidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entidad_federativa_id', 'mun_id', 'localidad_id', 'regionalizacion_id', 'loc_grandes_id', 'loc_fuertes_id'], 'integer'],
            [['desc_loc', 'nombre_loc', 'tipo_loc'], 'required'],
            [['latitud_loc', 'longitud_loc'], 'number'],
            [['desc_loc', 'nombre_loc'], 'string', 'max' => 150],
            [['tipo_loc'], 'string', 'max' => 1],
            [['cieps_desc'], 'string', 'max' => 50],
            [['localidad_id'], 'unique'],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatMunicipios::className(), 'targetAttribute' => ['mun_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad_federativa_id' => 'Entidad Federativa ID',
            'mun_id' => 'Mun ID',
            'localidad_id' => 'Localidad ID',
            'desc_loc' => 'Desc Loc',
            'nombre_loc' => 'Nombre Loc',
            'tipo_loc' => 'Tipo Loc',
            'latitud_loc' => 'Latitud Loc',
            'longitud_loc' => 'Longitud Loc',
            'regionalizacion_id' => 'Regionalizacion ID',
            'loc_grandes_id' => 'Loc Grandes ID',
            'loc_fuertes_id' => 'Loc Fuertes ID',
            'cieps_desc' => 'Cieps Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMun()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id']);
    }
}
