<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "total_reg".
 *
 * @property string $desc_region
 * @property string $total
 */
class TotalReg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'total_reg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_region'], 'required'],
            [['total'], 'number'],
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
            'total' => 'Total',
        ];
    }
}
