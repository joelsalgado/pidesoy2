<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "directorio_responsables".
 *
 * @property int $id
 * @property string $fecha
 * @property string $imagen
 * @property int $resp_institucional
 * @property int $resp_comunitario
 * @property int $otro
 * @property string $especifique
 * @property string $funcion
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $nombre
 * @property string $sexo
 * @property string $fecha_nacimiento
 * @property string $calle
 * @property string $num_ext
 * @property string $num_int
 * @property string $colonia
 * @property int $codigo_posta
 * @property string $tel_local
 * @property string $tel_cel
 * @property int $mun_id
 * @property int $loc_id
 * @property string $referencia
 * @property string $correo
 * @property string $redes_sociales
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CatLocalidades $loc
 * @property CatMunicipios $mun
 */
class DirectorioResponsables extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'directorio_responsables';
    }

    /**
     * @inheritdoc
     */
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
}
