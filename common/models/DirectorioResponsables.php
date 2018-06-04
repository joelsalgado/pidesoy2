<?php

namespace common\models;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\helpers\FileHelper;

use Yii;


class DirectorioResponsables extends \yii\db\ActiveRecord
{
    public $imageTemp;

    public static function tableName()
    {
        return 'directorio_responsables';
    }


    public function rules()
    {
        return [
            [['fecha', 'fecha_nacimiento'], 'safe'],
            [['resp_institucional', 'resp_comunitario', 'otro', 'codigo_posta', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['apellido_paterno', 'apellido_materno', 'nombre', 'sexo', 'fecha_nacimiento', 'mun_id', 'loc_id'], 'required'],
            [['imagen', 'especifique', 'funcion'], 'string', 'max' => 255],
            [['apellido_paterno', 'apellido_materno', 'nombre'], 'string', 'max' => 60],
            [['sexo'], 'string', 'max' => 1],
            [['calle', 'colonia'], 'string', 'max' => 80],
            [['num_ext', 'num_int'], 'string', 'max' => 40],
            [['tel_local', 'tel_cel'], 'string', 'max' => 15],
            [['referencia', 'correo'], 'string', 'max' => 100],
            [['redes_sociales'], 'string', 'max' => 150],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [
                ['imageTemp'],
                'file',
                'extensions' => ['jpg'],
                'wrongExtension'=>'Solo se permiten estas extensiones {extensions} '
                //'mimeTypes' => ['image/jpeg',],
                //'maxSize'=>1024*240,
            ],        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imageTemp' => 'Imagen',
            'fecha' => 'Fecha',
            'imagen' => 'Imagen',
            'resp_institucional' => 'Resp Institucional',
            'resp_comunitario' => 'Resp Comunitario',
            'otro' => 'Otro',
            'especifique' => 'Especifique',
            'funcion' => 'Funcion',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'nombre' => 'Nombre',
            'sexo' => 'Sexo',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'calle' => 'Calle',
            'num_ext' => 'Num Ext',
            'num_int' => 'Num Int',
            'colonia' => 'Colonia',
            'codigo_posta' => 'Codigo Posta',
            'tel_local' => 'Tel Local',
            'tel_cel' => 'Tel Cel',
            'mun_id' => 'Mun ID',
            'loc_id' => 'Loc ID',
            'referencia' => 'Referencia',
            'correo' => 'Correo',
            'redes_sociales' => 'Redes Sociales',
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

    public function  saveImage($imageFile, $name, $type, $tipo) {
        if ($type == 'imageTemp') {

            $image = Image::getImagine()->open($imageFile->tempName);
            FileHelper::createDirectory(Yii::getAlias('@images').'/docs/'.$tipo);

            $cropSizeThumb = new Box(440, 640);
            $image->resize($cropSizeThumb)
                ->save(Yii::getAlias('@images').'/docs/'.$tipo.'/'.$name, ['quality' => 100]);
        }

    }
}
