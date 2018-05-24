<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;


class Apartados extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'navegacion';
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ]
        ];
    }

    public function rules()
    {
        return [
            [['solicitante_id', 'created_at', 'updated_at'], 'required'],
            [['solicitante_id', 'periodo', 'apartado1', 'apartado2', 'apartado3', 'apartado4', 'apartado5', 'apartado6', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'solicitante_id' => 'Solicitante ID',
            'periodo' => 'Periodo',
            'apartado1' => 'Apartado1',
            'apartado2' => 'Apartado2',
            'apartado3' => 'Apartado3',
            'apartado4' => 'Apartado4',
            'apartado5' => 'Apartado5',
            'apartado6' => 'Apartado6',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
    }
}
