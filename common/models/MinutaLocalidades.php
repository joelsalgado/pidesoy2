<?php
namespace common\models;


use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class MinutaLocalidades extends \yii\db\ActiveRecord
{
    public $imageTemp;
    public $imageTemp2;

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
        return 'minuta_localidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'fecha'], 'required', 'message' => 'Campo Requerido'],
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha'], 'safe'],
            [['mes'], 'string', 'max' => 2],
            [['periodo'], 'string', 'max' => 4],
            [['minuta', 'lista'], 'string', 'max' => 255],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
            [
                ['imageTemp', 'imageTemp2'],
                'file',
                'extensions' => ['pdf'],
                'wrongExtension'=>'Solo se permiten estas extensiones {extensions} '
                //'mimeTypes' => ['image/jpeg',],
                //'maxSize'=>1024*240,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad_id' => 'Clave del Estado',
            'region_id' => 'Region',
            'mun_id' => 'Municipio',
            'loc_id' => 'Localidad',
            'mes' => 'Mes',
            'periodo' => 'Periodo',
            'fecha' => 'Fecha',
            'minuta' => 'Minuta',
            'imageTemp' => 'Minuta',
            'imageTemp2' => 'Lista',
            'lista' => 'Lista',
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
        return $this->hasOne(Localidades::className(), ['id' => 'region_id']);
    }
}
