<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loc_tot".
 *
 * @property string $desc_loc
 * @property int $mun_id
 * @property int $region_id
 * @property string $pobreza_extrema
 * @property string $pobreza_moderada
 * @property string $vulnerable_por_ingresos
 * @property string $vulnerable_por_carencias
 * @property string $no_vulnerable
 */
class LocTot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loc_tot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_loc'], 'required'],
            [['mun_id', 'region_id'], 'integer'],
            [['pobreza_extrema', 'pobreza_moderada', 'vulnerable_por_ingresos', 'vulnerable_por_carencias', 'no_vulnerable'], 'number'],
            [['desc_loc'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desc_loc' => 'Desc Loc',
            'mun_id' => 'Mun ID',
            'region_id' => 'Region ID',
            'pobreza_extrema' => 'Pobreza Extrema',
            'pobreza_moderada' => 'Pobreza Moderada',
            'vulnerable_por_ingresos' => 'Vulnerable Por Ingresos',
            'vulnerable_por_carencias' => 'Vulnerable Por Carencias',
            'no_vulnerable' => 'No Vulnerable',
        ];
    }
}
