<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_personal".
 *
 * @property int $id
 * @property string $desc_personal
 * @property int $status
 *
 * @property DirectorioResponsables[] $directorioResponsables
 */
class TipoPersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_personal'], 'required'],
            [['status'], 'integer'],
            [['desc_personal'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc_personal' => 'Desc Personal',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirectorioResponsables()
    {
        return $this->hasMany(DirectorioResponsables::className(), ['tipo_personal_id' => 'id']);
    }
}
