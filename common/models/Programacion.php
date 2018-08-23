<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


class Programacion extends \yii\db\ActiveRecord
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
        return 'programacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entidad_id', 'region_id', 'mun_id', 'loc_id'], 'required', 'message' => 'Campo Requerido'],
            [['entidad_id', 'region_id', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha'], 'safe'],
            ['fecha', 'validateDate'],
            [['mes'], 'string', 'max' => 2],
            [['periodo'], 'string', 'max' => 4],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }
    public function validateDate(){
        $año = Yii::$app->formatter->asDate($this->fecha, 'yyyy');

        if($año == 2018){
            if ($this->isNewRecord) {
                $dup = self::find()->where([
                    'loc_id' => $this->loc_id,
                    //'created_by' => Yii::$app->user->id
                ])
                    ->andWhere(['mes' => $this->mes])
                    ->andWhere(['periodo' => $this->periodo])
                    ->andWhere(['status' => 1])
                    ->all();
                if ($dup) {
                    $this->addError('fecha', 'Este mes ya existe en esta localidad');
                    $fecha = Yii::$app->formatter->asDate($this->fecha, 'dd-MM-yyyy');
                    $this->fecha = $fecha;
                }
            }

        }
        else{
            $this->addError('fecha', 'Fecha incorrecta');
            $fecha =  Yii::$app->formatter->asDate($this->fecha, 'dd-MM-yyyy');
            $this->fecha = $fecha;
        }
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
