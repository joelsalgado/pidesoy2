<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "report_seg_prog_4".
 *
 * @property int $loc_id
 * @property string $total
 */
class ReportSegProg4 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_seg_prog_4';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_id'], 'required'],
            [['loc_id'], 'integer'],
            [['total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loc_id' => 'Loc ID',
            'total' => 'Total',
        ];
    }
}
