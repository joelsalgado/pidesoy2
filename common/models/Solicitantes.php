<?php

namespace common\models;

use Yii;

class Solicitantes extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'solicitantes';
    }

    public function rules()
    {
        return [
            [['periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'edo_civil_id', 'edad', 'codigo_postal', 'otra_referencia', 'status', 'created_by', 'updated_by'], 'integer', 'message' => 'Debe ser un numero entero'],
            [['nombre', 'apellido_paterno', 'apellido_materno', 'edo_civil_id', 'fecha_nacimiento', 'edad', 'sexo', 'telefono', 'calle', 'colonia', 'num_ext', 'num_int', 'codigo_postal', 'otra_referencia', 'created_at', 'updated_at'], 'required', 'message' => 'Campo requerido'],
            [['fecha_nacimiento', 'created_at', 'updated_at'], 'safe'],
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'string', 'max' => 60],
            [['sexo'], 'string', 'max' => 1],
            [['telefono'], 'string', 'max' => 15],
            [['calle', 'colonia'], 'string', 'max' => 80],
            [['num_ext', 'num_int'], 'string', 'max' => 40],
            [['edo_civil_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoCivil::className(), 'targetAttribute' => ['edo_civil_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['apellido_paterno','apellido_materno', 'nombre'], 'match', 'pattern' => '/^[a-zñ\s]+$/i',
                'message' => 'Sólo se aceptan letras sin acentos'],
            [['fecha_nacimiento'],'date', 'format'=>'dd/mm/yyyy', 'message' => 'Formato no valido'],
            [['telefono'], 'match', 'pattern' => '/^[0-9+\s]+$/i', 'message' => 'Solo se aceptan números'],
            [['codigo_postal'], 'match', 'pattern' => '/^[0-9]{5}/i', 'message' => 'Deben ser 5 digitos'],
            [['codigo_postal'], 'integer', 'max' => 70000, 'message' => 'Debe ser de 5 digitos'],
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
            'calle' => 'Calle, Avenida, Callejón, Carretera, Camino, Boulervard, Km',
            'colonia' => 'Colonia, Fraccionamnte, Unidad Habitacionakl,',
            'num_ext' => 'Número Exteror',
            'num_int' => 'Númrto Interior',
            'codigo_postal' => 'Código Postal',
            'otra_referencia' => 'Rasgo Físico que ayudre a ubicar la vivienda(Tienda, río, edificio, arrollo, arbol u otro',
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
}
