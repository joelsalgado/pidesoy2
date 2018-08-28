<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class FichaTecnica extends \yii\db\ActiveRecord
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
        return 'ficha_tecnica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entidad_id', 'region_id', 'mun_id', 'loc_id'], 'required'],
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'acceso_facil', 'cedulas_aplicadas', 'habitantes', 'ocupantes', 'campesinos', 'obreros', 'albañiles', 'amas', 'empleados', 'otros', 'de1a3', 'de3a5', 'de5mas', 'catolica', 'testigos', 'evangelistas', 'cristiana', 'otra', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha'], 'safe'],
            [['indicaciones', 'tiempo', 'cual1', 'cual2'], 'string', 'max' => 255],
            [['tipo_acceso', 'estado', 'indice_marginacion', 'indice_desarrollo_humano'], 'string', 'max' => 20],
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
            'entidad_id' => 'Clave del Estado',
            'region_id' => 'Region',
            'mun_id' => 'Municipio',
            'loc_id' => 'Localidad',
            'fecha' => 'Fecha',
            'indicaciones' => 'Indicaciones',
            'tipo_acceso' => 'Tipo Acceso',
            'estado' => 'Estado',
            'acceso_facil' => 'Acceso Facil',
            'tiempo' => 'Tiempo',
            'cedulas_aplicadas' => 'Cedulas Aplicadas',
            'habitantes' => 'Habitantes',
            'ocupantes' => 'Ocupantes',
            'indice_marginacion' => 'Indice Marginacion',
            'indice_desarrollo_humano' => 'Indice Desarrollo Humano',
            'campesinos' => 'Campesinos',
            'obreros' => 'Obreros',
            'albañiles' => 'Albañiles',
            'amas' => 'Amas',
            'empleados' => 'Empleados',
            'otros' => 'Otros',
            'cual1' => 'Cual1',
            'de1a3' => 'De1a3',
            'de3a5' => 'De3a5',
            'de5mas' => 'De5mas',
            'catolica' => 'Catolica',
            'testigos' => 'Testigos',
            'evangelistas' => 'Evangelistas',
            'cristiana' => 'Cristiana',
            'otra' => 'Otra',
            'cual2' => 'Cual2',
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
        return $this->hasOne(Regiones::className(), ['id' => 'region_id']);
    }
}
