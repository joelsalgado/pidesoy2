<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loc_seg".
 *
 * @property int $loc_id
 * @property string $desc_loc
 * @property string $total
 */
class LocSeg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loc_seg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_id', 'desc_loc'], 'required'],
            [['loc_id'], 'integer'],
            [['total'], 'number'],
            [['desc_loc'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loc_id' => 'Loc ID',
            'desc_loc' => 'Desc Loc',
            'total' => 'Total',
        ];
    }
}
