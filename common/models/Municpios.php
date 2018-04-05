<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_municipios".
 *
 * @property int $id
 * @property int $cve_esp
 * @property string $nombre_mun
 * @property string $desc_mun
 * @property int $coord_reg_id
 * @property int $regionalizacion_id
 * @property int $reg_fuertes_id
 * @property int $reg_grandes_id
 *
 * @property CatLocalidades[] $catLocalidades
 * @property CatCoordinacionesRegionales $coordReg
 * @property CatRegionesFuertes $regFuertes
 * @property CatRegionesGrandes $regGrandes
 * @property CatRegionalizacion $regionalizacion
 */
class Municpios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_municipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cve_esp', 'coord_reg_id', 'regionalizacion_id', 'reg_fuertes_id', 'reg_grandes_id'], 'integer'],
            [['nombre_mun', 'desc_mun'], 'required'],
            [['nombre_mun', 'desc_mun'], 'string', 'max' => 60],
            [['coord_reg_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatCoordinacionesRegionales::className(), 'targetAttribute' => ['coord_reg_id' => 'id']],
            [['reg_fuertes_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatRegionesFuertes::className(), 'targetAttribute' => ['reg_fuertes_id' => 'id']],
            [['reg_grandes_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatRegionesGrandes::className(), 'targetAttribute' => ['reg_grandes_id' => 'id']],
            [['regionalizacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatRegionalizacion::className(), 'targetAttribute' => ['regionalizacion_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cve_esp' => 'Cve Esp',
            'nombre_mun' => 'Nombre Mun',
            'desc_mun' => 'Desc Mun',
            'coord_reg_id' => 'Coord Reg ID',
            'regionalizacion_id' => 'Regionalizacion ID',
            'reg_fuertes_id' => 'Reg Fuertes ID',
            'reg_grandes_id' => 'Reg Grandes ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidades()
    {
        return $this->hasMany(Localidades::className(), ['mun_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordReg()
    {
        return $this->hasOne(CatCoordinacionesRegionales::className(), ['id' => 'coord_reg_id']);
    }

    public function getRegiones()
    {
        return $this->hasOne(Regiones::className(), ['id' => 'reg_fuertes_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegGrandes()
    {
        return $this->hasOne(CatRegionesGrandes::className(), ['id' => 'reg_grandes_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionalizacion()
    {
        return $this->hasOne(CatRegionalizacion::className(), ['id' => 'regionalizacion_id']);
    }

    public static function getMun($cat_id){
        $sections = self::find()
            ->select(['id', 'desc_mun'])
            ->where(['reg_fuertes_id'=> $cat_id])
            ->asArray()
            ->all();
        $sec = [];
        foreach ($sections as $value){
            $sec[] = ["id"=> $value['id'], "name"=>$value['desc_mun']];
        }

        return $sec;
    }

    public static function getMunOk(){
        if(Yii::$app->user->identity->role == 30){
            $mun_id = self::find()
                ->select(['id', 'desc_mun'])
                ->orderBy(['desc_mun' => 'DESC'])
                ->all();
        }else{
            $mun_id = self::find()
                ->select(['id', 'desc_mun'])
                ->andWhere(['reg_fuertes_id' => Yii::$app->user->identity->region_id ])
                ->orderBy(['desc_mun' => 'DESC'])
                ->all();
        }

        return $mun_id;
    }
}
