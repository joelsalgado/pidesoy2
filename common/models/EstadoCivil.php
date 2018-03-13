<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_estado_civil".
 *
 * @property int $id
 * @property string $nomb_edo_civil
 * @property string $desc_edo_civil
 * @property int $status
 */
class EstadoCivil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_estado_civil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomb_edo_civil', 'desc_edo_civil'], 'required'],
            [['status'], 'integer'],
            [['nomb_edo_civil', 'desc_edo_civil'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomb_edo_civil' => 'Nomb Edo Civil',
            'desc_edo_civil' => 'Desc Edo Civil',
            'status' => 'Status',
        ];
    }

    public static function getEstados(){
        $estados = self::find()
            ->select(['id', 'desc_edo_civil'])
            ->where(['status' => 1])
            ->orderBy(['desc_edo_civil' => 'DESC'])
            ->all();
        return $estados;
    }
}
