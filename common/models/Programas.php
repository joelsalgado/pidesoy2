<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_programas".
 *
 * @property int $id
 * @property string $nomb_programa
 * @property string $desc_programa
 * @property int $status
 */
class Programas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_programas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomb_programa', 'desc_programa'], 'required'],
            [['status'], 'integer'],
            [['nomb_programa', 'desc_programa'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomb_programa' => 'Nomb Programa',
            'desc_programa' => 'Desc Programa',
            'status' => 'Status',
        ];
    }

    public static function getProgramasOk(){
        $programas = self::find()
            ->select(['id', 'desc_programa'])
            ->where(['status' => 1])
            ->orderBy(['desc_programa' => 'DESC'])
            ->all();

        return $programas;
    }
}
