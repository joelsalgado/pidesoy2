<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mun_tot".
 *
 * @property string $desc_mun
 * @property int $id
 * @property int $reg_fuertes_id
 * @property string $pobreza_extrema
 * @property string $pobreza_moderada
 * @property string $vulnerable_por_ingresos
 * @property string $vulnerable_por_carencias
 * @property string $no_vulnerable
 */
class MunTot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mun_tot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_mun'], 'required'],
            [['id', 'reg_fuertes_id'], 'integer'],
            [['pobreza_extrema', 'pobreza_moderada', 'vulnerable_por_ingresos', 'vulnerable_por_carencias', 'no_vulnerable'], 'number'],
            [['desc_mun'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desc_mun' => 'Municipio',
            'id' => 'ID',
            'reg_fuertes_id' => 'Reg Fuertes ID',
            'pobreza_extrema' => 'Pobreza Extrema',
            'pobreza_moderada' => 'Pobreza Moderada',
            'vulnerable_por_ingresos' => 'Vulnerable Por Ingresos',
            'vulnerable_por_carencias' => 'Vulnerable Por Carencias',
            'no_vulnerable' => 'No Vulnerable',
        ];
    }
}
