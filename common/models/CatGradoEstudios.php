<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_grado_estudios".
 *
 * @property int $id
 * @property string $desc_grado
 * @property int $status
 */
class CatGradoEstudios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_grado_estudios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_grado'], 'required'],
            [['status'], 'integer'],
            [['desc_grado'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc_grado' => 'Desc Grado',
            'status' => 'Status',
        ];
    }
}
