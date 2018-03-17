<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_parentesco".
 *
 * @property int $id
 * @property string $nomb_parentesco
 * @property string $desc_parentesco
 * @property int $status
 */
class Parentesco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_parentesco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomb_parentesco', 'desc_parentesco'], 'required'],
            [['status'], 'integer'],
            [['nomb_parentesco', 'desc_parentesco'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomb_parentesco' => 'Nomb Parentesco',
            'desc_parentesco' => 'Desc Parentesco',
            'status' => 'Status',
        ];
    }

    public static function getParentescoOk(){
        $parentesco = self::find()
            ->select(['id', 'desc_parentesco'])
            ->where(['status' => 1])
            ->orderBy(['desc_parentesco' => 'DESC'])
            ->all();

        return $parentesco;
    }
}
