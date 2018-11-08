<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "report_seg_prog_2".
 *
 * @property int $loc_id
 * @property string $programa_piso
 * @property string $total
 */
class ReportSegProg2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_seg_prog_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_id'], 'integer'],
            [['total'], 'number'],
            [['programa_piso'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loc_id' => 'Loc ID',
            'programa_piso' => 'Programa Piso',
            'total' => 'Total',
        ];
    }
}
