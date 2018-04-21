<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cedula_ps".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $cual_programa
 * @property string $nombre_recibe_programa
 * @property string $titular
 * @property int $parentesco_recibe_programa
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CedulaDePobreza $cedula
 * @property CatParentesco $parentescoRecibePrograma
 */
class CedulaPs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cedula_ps';
    }

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

    public function rules()
    {
        return [
            [['cedula_id'], 'required'],
            [['cedula_id', 'cual_programa', 'parentesco_recibe_programa', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['nombre_recibe_programa', 'titular'], 'string', 'max' => 120],
            [['nombre_recibe_programa', 'titular'], 'match', 'pattern' => '/^[a-zñÑ\s]+$/i',
                'message' => 'Sólo se aceptan letras sin acentos'],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => CedulaPobreza::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['parentesco_recibe_programa'], 'exist', 'skipOnError' => true, 'targetClass' => Parentesco::className(), 'targetAttribute' => ['parentesco_recibe_programa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula_id' => 'Cedula ID',
            'cual_programa' => 'Cual Programa',
            'nombre_recibe_programa' => 'Nombre Recibe Programa',
            'titular' => 'Titular',
            'parentesco_recibe_programa' => 'Parentesco Recibe Programa',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedula()
    {
        return $this->hasOne(CedulaPobreza::className(), ['id' => 'cedula_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentescoRecibePrograma()
    {
        return $this->hasOne(Parentesco::className(), ['id' => 'parentesco_recibe_programa']);
    }

    public function getPrograma()
    {
        return $this->hasOne(Programas::className(), ['id' => 'cual_programa']);
    }

}
