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
            [['nomb_programa', 'desc_programa'], 'required', 'message' => 'Campo Requerido'],
            [['status'], 'integer'],
            [['nomb_programa', 'desc_programa', 'responsable'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomb_programa' => 'Nombre del Programa',
            'desc_programa' => 'Descripcion del Programa',
            'responsable' => 'Responsable del Programa',
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
