<?php

namespace common\models;

use Yii;

class RegTot extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'reg_tot';
    }

    public function rules()
    {
        return [
            [['desc_region'], 'required'],
            [['id'], 'integer'],
            [['pobreza_extrema', 'pobreza_moderada', 'vulnerable_por_ingresos', 'vulnerable_por_carencias', 'no_vulnerable'], 'number'],
            [['desc_region'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desc_region' => 'Desc Region',
            'id' => 'ID',
            'pobreza_extrema' => 'Pobreza Extrema',
            'pobreza_moderada' => 'Pobreza Moderada',
            'vulnerable_por_ingresos' => 'Vulnerable Por Ingresos',
            'vulnerable_por_carencias' => 'Vulnerable Por Carencias',
            'no_vulnerable' => 'No Vulnerable',
        ];
    }
}
