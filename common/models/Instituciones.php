<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "instituciones".
 *
 * @property int $id
 * @property int $ficha_id
 * @property int $grado_id
 * @property string $nombre_escuela
 * @property int $total_alumnos
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CatGradoEstudios $grado
 * @property FichaTecnica $ficha
 */
class Instituciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instituciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ficha_id'], 'required'],
            [['ficha_id', 'grado_id', 'total_alumnos', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['nombre_escuela'], 'string', 'max' => 255],
            [['grado_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatGradoEstudios::className(), 'targetAttribute' => ['grado_id' => 'id']],
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
            'grado_id' => 'Grado ID',
            'nombre_escuela' => 'Nombre Escuela',
            'total_alumnos' => 'Total Alumnos',
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
    public function getGrado()
    {
        return $this->hasOne(CatGradoEstudios::className(), ['id' => 'grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFicha()
    {
        return $this->hasOne(FichaTecnica::className(), ['id' => 'ficha_id']);
    }
}
