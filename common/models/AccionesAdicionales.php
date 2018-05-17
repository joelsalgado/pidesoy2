<?php

namespace common\models;

use Yii;


class AccionesAdicionales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acciones_adicionales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solicitante_id'], 'required'],
            [['solicitante_id', 'periodo', 'meta', 'acciones', 'acciones_pendientes', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['inversion'], 'number'],
            [['fecha_inicio', 'fecha_entrega'], 'safe'],
            [['nombre_accion', 'programa', 'responsable'], 'string', 'max' => 120],
            [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'solicitante_id' => 'Solicitante ID',
            'periodo' => 'Periodo',
            'nombre_accion' => 'Nombre Accion',
            'meta' => 'Meta',
            'acciones' => 'Acciones',
            'acciones_pendientes' => 'Acciones Pendientes',
            'inversion' => 'Inversion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_entrega' => 'Fecha Entrega',
            'programa' => 'Programa',
            'responsable' => 'Responsable',
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
    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
    }
}
