<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "informes".
 *
 * @property int $id
 * @property int $entidad_id
 * @property int $region_id
 * @property int $mun_id
 * @property int $loc_id
 * @property string $fecha
 * @property int $cantidad
 * @property int $actividad_id
 * @property string $descripcion
 * @property int $personas_beneficiadas
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CatActividades $actividad
 * @property CatEntNacimiento $entidad
 * @property CatLocalidades $loc
 * @property CatMunicipios $mun
 * @property CatRegionesFuertes $region
 */
class Informes extends \yii\db\ActiveRecord
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
        return 'informes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'actividad_id', 'fecha', 'cantidad', 'personas_beneficiadas', 'descripcion'], 'required', 'message' => 'Campo requerido'],
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'cantidad', 'actividad_id', 'personas_beneficiadas', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message' => 'Debe ser nùmerico'],
            [['fecha'], 'safe'],
            [['descripcion'], 'string', 'max' => 255],
            [['actividad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::className(), 'targetAttribute' => ['actividad_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad_id' => 'Entidad Federativa',
            'region_id' => 'Zona',
            'mun_id' => 'Municipio',
            'loc_id' => 'Localidad',
            'fecha' => 'Fecha',
            'cantidad' => 'Cantidad',
            'actividad_id' => 'Tipo de Actividad',
            'descripcion' => 'Descripción',
            'personas_beneficiadas' => 'Personas Beneficiadas',
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
    public function getActividad()
    {
        return $this->hasOne(Actividades::className(), ['id' => 'actividad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
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
