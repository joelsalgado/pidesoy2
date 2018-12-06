<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_actividades".
 *
 * @property int $id
 * @property string $desc_actividad
 * @property int $status
 */
class Actividades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_actividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_actividad'], 'required'],
            [['status'], 'integer'],
            [['desc_actividad'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc_actividad' => 'Actividad',
            'status' => 'Status',
        ];
    }
}
