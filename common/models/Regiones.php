<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_regiones_fuertes".
 *
 * @property int $id
 * @property string $desc_region
 * @property string $nombre_region
 *
 * @property CatMunicipios[] $catMunicipios
 */
class Regiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_regiones_fuertes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_region', 'nombre_region'], 'required'],
            [['desc_region', 'nombre_region'], 'string', 'max' => 150],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc_region' => 'Desc Region',
            'nombre_region' => 'Nombre Region',
            'status' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatMunicipios()
    {
        return $this->hasMany(Municpios::className(), ['reg_fuertes_id' => 'id']);
    }

    public static function getRegionesActivas(){
        $regiones_activas = self::find()
            ->select(['id', 'desc_region'])
            ->where(['status' => 1])
            ->orderBy(['desc_region' => 'DESC'])
            ->all();
        return $regiones_activas;
    }
}
