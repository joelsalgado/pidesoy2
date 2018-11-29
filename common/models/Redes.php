<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_red_social".
 *
 * @property int $id
 * @property string $desc_redes
 * @property int $status
 */
class Redes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_red_social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_redes'], 'required'],
            [['status'], 'integer'],
            [['desc_redes'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc_redes' => 'Desc Redes',
            'status' => 'Status',
        ];
    }
}
