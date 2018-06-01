<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "apilocalidades".
 *
 * @property string $Loc
 * @property int $localidad_id
 * @property string $Mun
 * @property string $Region
 * @property string $pobreza_extrema
 * @property string $pobreza_moderada
 * @property string $vulnerable_por_ingresos
 * @property string $vulnerable_por_carencias
 * @property string $no_vulnerable
 */
class Apilocalidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apilocalidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Loc', 'Mun', 'Region'], 'required'],
            [['localidad_id'], 'integer'],
            [['pobreza_extrema', 'pobreza_moderada', 'vulnerable_por_ingresos', 'vulnerable_por_carencias', 'no_vulnerable'], 'number'],
            [['Loc', 'Region'], 'string', 'max' => 150],
            [['Mun'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Loc' => 'Loc',
            'localidad_id' => 'Localidad ID',
            'Mun' => 'Mun',
            'Region' => 'Region',
            'pobreza_extrema' => 'Pobreza Extrema',
            'pobreza_moderada' => 'Pobreza Moderada',
            'vulnerable_por_ingresos' => 'Vulnerable Por Ingresos',
            'vulnerable_por_carencias' => 'Vulnerable Por Carencias',
            'no_vulnerable' => 'No Vulnerable',
        ];
    }
}
