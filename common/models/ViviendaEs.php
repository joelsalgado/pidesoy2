<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_vivienda_es".
 *
 * @property int $id
 * @property string $nomb_vivienda_es
 * @property string $desc_vivienda_es
 */
class ViviendaEs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_vivienda_es';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomb_vivienda_es', 'desc_vivienda_es'], 'required'],
            [['nomb_vivienda_es', 'desc_vivienda_es'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomb_vivienda_es' => 'Nomb Vivienda Es',
            'desc_vivienda_es' => 'Desc Vivienda Es',
        ];
    }

    public static function getViviendaOk(){
        $vivienda = self::find()
            ->select(['id', 'desc_vivienda_es'])
            ->orderBy(['desc_vivienda_es' => 'DESC'])
            ->all();

        return $vivienda;
    }
}
