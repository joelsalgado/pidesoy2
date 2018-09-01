<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "lideres".
 *
 * @property int $id
 * @property int $ficha_id
 * @property string $nombre
 * @property string $cargo
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property FichaTecnica $ficha
 */
class Lideres extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className()
            ]
        ];
    }

    public static function tableName()
    {
        return 'lideres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ficha_id', 'nombre', 'cargo'], 'required', 'message' => 'Campo Requerido'],
            [['ficha_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['nombre', 'cargo'], 'string', 'max' => 255],
            [['ficha_id'], 'exist', 'skipOnError' => true, 'targetClass' => FichaTecnica::className(), 'targetAttribute' => ['ficha_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ficha_id' => 'Ficha ID',
            'nombre' => 'Nombre',
            'cargo' => 'Cargo',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFicha()
    {
        return $this->hasOne(FichaTecnica::className(), ['id' => 'ficha_id']);
    }
}
