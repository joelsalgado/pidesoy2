<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cabildo".
 *
 * @property int $id
 * @property int $formato_id
 * @property string $nombre_cabildo
 * @property string $domicilio_cabildo
 * @property string $contacto_cabildo
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property FormatoLoc $formato
 */
class Cabildo extends \yii\db\ActiveRecord
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
        return 'cabildo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['formato_id'], 'required'],
            [['formato_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['nombre_cabildo', 'domicilio_cabildo', 'contacto_cabildo'], 'string', 'max' => 255],
            [['formato_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormatoLoc::className(), 'targetAttribute' => ['formato_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'formato_id' => 'Formato ID',
            'nombre_cabildo' => 'Nombre',
            'domicilio_cabildo' => 'Domicilio',
            'contacto_cabildo' => 'Contacto',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormato()
    {
        return $this->hasOne(FormatoLoc::className(), ['id' => 'formato_id']);
    }
}
