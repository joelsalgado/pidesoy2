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
            'desc_region' => 'Region',
            'id' => 'ID',
            'pobreza_extrema' => 'Pobreza Extrema',
            'pobreza_moderada' => 'Pobreza Moderada',
            'vulnerable_por_ingresos' => 'Vulnerable Por Ingresos',
            'vulnerable_por_carencias' => 'Vulnerable Por Carencias',
            'no_vulnerable' => 'No Vulnerable',
        ];
    }


    public static function getRegTot(array $val){
        $suma1 = 0;
        $suma2 = 0;
        $suma3 = 0;
        $suma4 = 0;
        $suma5 = 0;
        $model = self::find()->where(['id' => $val])->all();

        foreach ($model as $value){
            $suma1 = $suma1 + $value->pobreza_extrema;
            $suma2 = $suma2 + $value->pobreza_moderada;
            $suma3 = $suma3 + $value->vulnerable_por_ingresos;
            $suma4 = $suma4 + $value->vulnerable_por_carencias;
            $suma5 = $suma5 + $value->no_vulnerable;
        }
        $array1 = self::find()->where(['id' => $val])->asArray()->all();
        $array2[] = [
            'desc_region' => 'Total',
            'id' => '',
            'pobreza_extrema' => $suma1,
            'pobreza_moderada' => $suma2,
            'vulnerable_por_ingresos' => $suma3,
            'vulnerable_por_carencias' => $suma4,
            'no_vulnerable' => $suma5,
        ];

        $resultado = array_merge($array1, $array2);

        return (object) $resultado;


    }
}
