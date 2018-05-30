<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "apiregiones".
 *
 * @property string $Mun
 * @property string $Region
 * @property string $pobreza_extrema
 * @property string $pobreza_moderada
 * @property string $vulnerable_por_ingresos
 * @property string $vulnerable_por_carencias
 * @property string $no_vulnerable
 */
class Apiregiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apiregiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Mun', 'Region'], 'required'],
            [['pobreza_extrema', 'pobreza_moderada', 'vulnerable_por_ingresos', 'vulnerable_por_carencias', 'no_vulnerable'], 'number'],
            [['Mun'], 'string', 'max' => 60],
            [['Region'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
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
