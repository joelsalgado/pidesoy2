<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_ent_nacimiento".
 *
 * @property int $id
 * @property string $desc_ent_nac
 * @property string $abrev_ent_nac
 */
class EntidadNacimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_ent_nacimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_ent_nac', 'abrev_ent_nac'], 'required'],
            [['desc_ent_nac', 'abrev_ent_nac'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc_ent_nac' => 'Desc Ent Nac',
            'abrev_ent_nac' => 'Abrev Ent Nac',
        ];
    }
}
