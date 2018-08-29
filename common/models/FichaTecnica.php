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
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'acceso_facil', 'cedulas_aplicadas', 'habitantes', 'ocupantes', 'campesinos', 'obreros', 'albaniles', 'amas', 'empleados', 'otros', 'catolica', 'testigos', 'evangelistas', 'cristiana', 'otra', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha'], 'safe'],
            [['indicaciones', 'tiempo', 'cual1', 'cual2'], 'string', 'max' => 255],
            [['tipo_acceso', 'estado', 'indice_marginacion', 'indice_desarrollo_humano'], 'string', 'max' => 20],
            [['ingreso_promedio'], 'string', 'max' => 30],
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

            'indicaciones' => 'Anote las indicaciones de cómo llegar a la localidad',
            'tipo_acceso' => 'Tipo de acceso o caminos terrestres:',
            'estado' => 'Estado en que se encuentran las vías de comunicación terrestre: ',
            'acceso_facil' => 'Acceso fácil a transporte de carga:',
            'tiempo' => 'Tiempo de recorrido en horas desde la capital del Estado:',

            'cedulas_aplicadas' => 'Cédulas aplicadas',
            'habitantes' => 'Número de habitantes ',
            'ocupantes' => 'Ocupantes promedio por vivienda',
            'indice_marginacion' => 'Índice de marginación',
            'indice_desarrollo_humano' => 'Índice de desarrollo humano',

            'campesinos' => 'Campesinos',
            'obreros' => 'Obreros',
            'albaniles' => 'Albañiles',
            'amas' => 'Amas de casa',
            'empleados' => 'Empleados',
            'otros' => 'Otro',
            'cual1' => '¿Cuál?',

            'ingreso_promedio' => 'Ingreso Promedio',

            'catolica' => 'Católica',
            'testigos' => 'Testigo de Jehová',
            'evangelistas' => 'Evangélica',
            'cristiana' => 'Cristiana',
            'otra' => 'Otra',
            'cual2' => '¿Cuál?',

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
