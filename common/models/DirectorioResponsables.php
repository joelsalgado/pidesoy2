<?php

namespace common\models;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\helpers\FileHelper;

use Yii;


class DirectorioResponsables extends \yii\db\ActiveRecord
{
    public $imageTemp;

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
        return 'directorio_responsables';
    }


    public function rules()
    {
        return [
            [['fecha', 'fecha_nacimiento'], 'safe'],
            [['entidad_id', 'region_id', 'mun_id1', 'loc_id1','resp_institucional', 'resp_comunitario', 'otro', 'codigo_posta', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at','tipo_personal_id'], 'integer','message' => 'Solo se aceptan números'],
            [['fecha','entidad_id', 'region_id', 'mun_id1', 'loc_id1','apellido_paterno', 'apellido_materno', 'nombre', 'sexo', 'fecha_nacimiento', 'mun_id', 'loc_id'], 'required', 'message' => 'Campo Requerido'],
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
            ],
            [['correo'], 'email', 'message' => 'No tiene formato de correo electronico'],
            [['nombre'], 'validatePuesto'],
            [['tel_local', 'tel_cel'], 'match', 'pattern' => '/^[0-9+\s]+$/i', 'message' => 'Solo se aceptan números'],
            [['codigo_posta'], 'match', 'pattern' => '/^[0-9]{5}/i', 'message' => 'Deben ser 5 digitos'],
            [['codigo_posta'], 'integer', 'max' => 90000,'tooBig' => '{attribute} no debe ser mayor a 9000' ],
            [['apellido_paterno','apellido_materno', 'nombre'], 'match', 'pattern' => '/^[a-zñÑ\s]+$/i',
                'message' => 'Sólo se aceptan letras sin acentos'],

            ];
    }

    public function validatePuesto(){
        if($this->resp_institucional == 1)
        {
            if ($this->resp_comunitario == 1 || $this->otro == 1){
                $this->addError('resp_institucional', 'Debe ser solo un puesto');
            }
        }

        if($this->resp_comunitario == 1)
        {
            if ($this->resp_institucional == 1 || $this->otro == 1){
                $this->addError('resp_comunitario', 'Debe ser solo un puesto');
            }
        }

        if($this->otro == 1)
        {
            if ($this->resp_institucional == 1 || $this->resp_comunitario == 1){
                $this->addError('otro', 'Debe ser solo un puesto');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad_id' => 'Clave del Estado',
            'region_id' => 'Region',
            'mun_id1' => 'Municipio',
            'loc_id1' => 'Localidad',
            'imageTemp' => 'Imagen',
            'fecha' => 'Fecha',
            'imagen' => 'Imagen',
            'resp_institucional' => 'Responsable Institucional',
            'resp_comunitario' => 'Responsable Comunitario',
            'tipo_personal_id' =>'Tipo de Personal',
            'otro' => 'Otro',
            'especifique' => 'Especifique',
            'funcion' => 'Función',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'nombre' => 'Nombre(S)',
            'sexo' => 'Sexo',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'calle' => 'Calle',
            'num_ext' => 'Número Exterior',
            'num_int' => 'Número Interior',
            'colonia' => 'Colonia',
            'codigo_posta' => 'Codigo Postal',
            'tel_local' => 'Teléfono Local',
            'tel_cel' => 'Teléfono Celular',
            'mun_id' => 'Municipio',
            'loc_id' => 'Localidad',
            'referencia' => 'Referencia',
            'correo' => 'Correo Electrónico',
            'redes_sociales' => 'Redes Sociales',
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

    public function getLoc1()
    {
        return $this->hasOne(Localidades::className(), ['localidad_id' => 'loc_id1']);
    }

    public function getPesonal()
    {
        return $this->hasOne(TipoPersonal::className(), ['id' => 'tipo_personal_id']);
    }


    public function getMun()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id']);
    }


    public function getMun1()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id1']);
    }

    public function  saveImage($imageFile, $name, $type, $tipo) {
        if ($type == 'imageTemp') {
            $image = Image::getImagine()->open($imageFile->tempName);
            FileHelper::createDirectory(Yii::getAlias('@images').'/directorio/');
            $cropSizeThumb = new Box(440, 640);
            $image->resize($cropSizeThumb)
                ->save(Yii::getAlias('@images').'/directorio/'.$name, ['quality' => 100]);
        }
    }
}
