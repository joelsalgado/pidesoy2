<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;

class Solicitantes extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'solicitantes';
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
            [['periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'edo_civil_id', 'edad', 'codigo_postal',
                'status', 'created_by', 'updated_by'], 'integer', 'message' => 'Debe ser un numero entero'],
            [['region_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'edo_civil_id', 'fecha_nacimiento',
                'edad', 'sexo', 'telefono', 'calle', 'colonia', 'num_ext', 'num_int', 'codigo_postal',
                'otra_referencia', 'created_at', 'updated_at'], 'required', 'message' => 'Campo requerido'],
            [['fecha_nacimiento', 'created_at', 'updated_at'], 'string'],
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'string', 'max' => 60],
            [['sexo'], 'string', 'max' => 1],
            [['telefono'], 'string', 'max' => 15],
            [['otra_referencia'], 'string', 'max' => 100],
            [['calle', 'colonia'], 'string', 'max' => 80],
            [['num_ext', 'num_int'], 'string', 'max' => 40],
            //[['edo_civil_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoCivil::className(), 'targetAttribute' => ['edo_civil_id' => 'id']],
            //[['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            //[['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            //[['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            //[['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['apellido_paterno','apellido_materno', 'nombre'], 'match', 'pattern' => '/^[a-zñ\s]+$/i',
                'message' => 'Sólo se aceptan letras sin acentos'],
            [['fecha_nacimiento'],'date', 'format'=>'yyyy-MM-dd', 'message' => 'Formato no valido'],
            [['telefono'], 'match', 'pattern' => '/^[0-9+\s]+$/i', 'message' => 'Solo se aceptan números'],
            [['codigo_postal'], 'match', 'pattern' => '/^[0-9]{5}/i', 'message' => 'Deben ser 5 digitos'],
            [['codigo_postal'], 'integer', 'max' => 58000, 'message' => 'Debe ser de 5 digitos'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'periodo' => 'Periodo',
            'entidad_id' => 'Clave de Estado',
            'region_id' => 'Región',
            'mun_id' => 'Clave de Municipio',
            'loc_id' => 'Clave de la Localidad',
            'nombre' => 'Nombre',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'edo_civil_id' => 'Estado Civil',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'edad' => 'Edad',
            'sexo' => 'Sexo',
            'telefono' => 'Teléfono',
            'calle' => 'Calle, Avenida, Callejón, Carretera, Camino, Boulervard, Km.',
            'colonia' => 'Colonia, Fraccionamiento, Unidad Habitacional.',
            'num_ext' => 'Número Exteror',
            'num_int' => 'Número Interior',
            'codigo_postal' => 'Código Postal',
            'otra_referencia' => 'Rasgo Físico que ayude a ubicar la vivienda(Tienda, río, edificio, arroyo, árbol u otro).',
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
    public function getEdoCivil()
    {
        return $this->hasOne(EstadoCivil::className(), ['id' => 'edo_civil_id']);
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if($insert){
            $cedula = new CedulaPobreza();
            $cedula->scenario = 'PARTICIPANTES';

            $cedula->solicitante_id = $this->id;
            $cedula->periodo = $this->periodo;
            $cedula->entidad_id = $this->entidad_id;
            $cedula->region_id = $this->region_id;
            $cedula->region_id = $this->region_id;
            $cedula->mun_id = $this->mun_id;
            $cedula->loc_id = $this->loc_id;
            $cedula->created_at = $this->created_at;
            $cedula->updated_at = $this->updated_at;

            if ($cedula->save()){
                echo "se guardo perro";
            }else{
                die;
            }
        }


    }
}
