<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\helpers\FileHelper;

class Documentos extends \yii\db\ActiveRecord
{
    public $imageTemp;
    public $imageTemp2;
    public static function tableName()
    {
        return 'documentos';
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
            [['solicitante_id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'created_at', 'updated_at'], 'required'],
            [['solicitante_id', 'periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['documento', 'foto'], 'string', 'max' => 255],
            [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
            [
                ['imageTemp', 'imageTemp2'],
                'file',
                'extensions' => ['jpg', 'pdf'],
                'wrongExtension'=>'Solo se permiten estas extensiones {extensions} '
                //'mimeTypes' => ['image/jpeg',],
                //'maxSize'=>1024*240,
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'solicitante_id' => 'Solicitante ID',
            'periodo' => 'Periodo',
            'entidad_id' => 'Entidad ID',
            'region_id' => 'Region ID',
            'mun_id' => 'Mun ID',
            'loc_id' => 'Loc ID',
            'imageTemp' => 'Documento',
            'imageTemp2' => 'Foto',
            'documento' => 'Documento',
            'foto' => 'Foto',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
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

    public function  saveImage($imageFile, $name, $type, $tipo) {
        if ($type == 'imageTemp' || $type == 'imageTemp2') {

            $image = Image::getImagine()->open($imageFile->tempName);
            FileHelper::createDirectory(Yii::getAlias('@images').'/docs/'.$tipo);

            $cropSizeThumb = new Box(440, 640);
            $image->resize($cropSizeThumb)
                ->save(Yii::getAlias('@images').'/docs/'.$tipo.'/'.$name, ['quality' => 80]);
        }

    }
}
