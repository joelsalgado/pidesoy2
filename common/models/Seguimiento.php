<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Seguimiento extends \yii\db\ActiveRecord
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
        return 'seguimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solicitante_id'], 'required'],
            [['solicitante_id', 'periodo', 'meta_piso', 'acciones_piso', 'acciones_pendientes_piso', 'programa_piso', 'meta_techo', 'acciones_techo', 'acciones_pendientes_techo', 'programa_techo', 'meta_muro', 'acciones_muro', 'acciones_pendientes_muro', 'programa_muro', 'meta_cuarto', 'acciones_cuarto', 'acciones_pendientes_cuarto', 'programa_cuarto', 'meta_calidad_espacios_vivienda', 'acciones_calidad_espacios_vivienda', 'acciones_pendientez_calidad_espacios_vivienda', 'meta_agua_potable', 'acciones_agua_potable', 'acciones_pendientes_agua_potable', 'programa_agua_potable', 'meta_agua_interior', 'acciones_agua_interior', 'acciones_pendientes_agua_interior', 'programa_agua_interior', 'meta_drenaje', 'acciones_drenaje', 'acciones_pendientes_drenaje', 'programa_drenaje', 'meta_luz', 'acciones_luz', 'acciones_pendientes_luz', 'programa_luz', 'meta_estufa', 'acciones_estufa', 'acciones_pendientes_estufa', 'programa_estufa', 'meta_servicios_basicos', 'acciones_servicios_basicos', 'acciones_pendientez_servicios_basicos', 'meta_seguro_popular', 'acciones_seguro_popular', 'acciones_pendientes_seguro_popular', 'programa_seguro_popular', 'meta_3_15_escuela', 'acciones_3_15_escuela', 'acciones_pendientes_3_15_escuela', 'programa_3_15_escuela', 'meta_antes_1982_primaria', 'acciones_antes_1982_primaria', 'acciones_pendientes_antes_1982_primaria', 'programa_antes_1982_primaria', 'meta_despues_1982_secundaria', 'acciones_despues_1982_secundaria', 'acciones_pendientes_despues_1982_secundaria', 'programa_despues_1982_secundaria', 'meta_educacion', 'acciones_educacion', 'acciones_pendientez_educacion', 'meta_despensas', 'acciones_despensas', 'acciones_pendientes_despensas', 'programa_despensas', 'meta_ss', 'acciones_ss', 'acciones_pendientes_ss', 'programa_ss', 'meta_trabajadores_ss', 'acciones_trabajadores_ss', 'acciones_pendientes_trabajadores_ss', 'programa_trabajadores_ss', 'meta_adultos_ss', 'acciones_adultos_ss', 'acciones_pendientes_adultos_ss', 'programa_adultos_ss', 'meta_s_s', 'acciones_s_s', 'acciones_pendientez_s_s', 'meta_vivienda', 'acciones_vivienda', 'acciones_pendientez_vivienda', 'inversion_vivienda', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['inversion_piso', 'inversion_techo', 'inversion_muro', 'inversion_cuarto', 'inversion_agua_potable', 'inversion_agua_interior', 'inversion_drenaje', 'inversion_luz', 'inversion_estufa', 'inversion_seguro_popular', 'inversion_3_15_escuela', 'inversion_antes_1982_primaria', 'inversion_despues_1982_secundaria', 'inversion_despensas', 'inversion_ss', 'inversion_trabajadores_ss', 'inversion_adultos_ss'], 'number'],
            [['fecha_inicio_piso', 'fecha_entrega_piso', 'fecha_inicio_techo', 'fecha_entrega_techo', 'fecha_inicio_muro', 'fecha_entrega_muro', 'fecha_inicio_cuarto', 'fecha_entrega_cuarto', 'fecha_inicio_agua_potable', 'fecha_entrega_agua_potable', 'fecha_inicio_agua_interior', 'fecha_entrega_agua_interior', 'fecha_inicio_drenaje', 'fecha_entrega_drenaje', 'fecha_inicio_luz', 'fecha_entrega_luz', 'fecha_inicio_estufa', 'fecha_entrega_estufa', 'fecha_inicio_seguro_popular', 'fecha_entrega_seguro_popular', 'fecha_inicio_3_15_escuela', 'fecha_entrega_3_15_escuela', 'fecha_inicio_antes_1982_primaria', 'fecha_entrega_antes_1982_primaria', 'fecha_inicio_despues_1982_secundaria', 'fecha_entrega_despues_1982_secundaria', 'fecha_inicio_despensas', 'fecha_entrega_despensas', 'fecha_inicio_ss', 'fecha_entrega_ss', 'fecha_inicio_trabajadores_ss', 'fecha_entrega_trabajadores_ss', 'fecha_inicio_adultos_ss', 'fecha_entrega_adultos_ss'], 'safe'],
            [['responsable_piso', 'responsable_techo', 'responsable_muro', 'responsable_cuarto', 'responsable_agua_potable', 'responsable_agua_interior', 'responsable_drenaje', 'responsable_luz', 'responsable_estufa', 'responsable_seguro_popular', 'responsable_3_15_escuela', 'responsable_antes_1982_primaria', 'responsable_despues_1982_secundaria', 'responsable_despensas', 'responsable_ss', 'responsable_trabajadores_ss', 'responsable_adultos_ss'], 'string', 'max' => 120],
            [['programa_piso'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_piso' => 'id']],
            [['programa_seguro_popular'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_seguro_popular' => 'id']],
            [['programa_3_15_escuela'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_3_15_escuela' => 'id']],
            [['programa_antes_1982_primaria'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_antes_1982_primaria' => 'id']],
            [['programa_despues_1982_secundaria'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_despues_1982_secundaria' => 'id']],
            [['programa_despensas'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_despensas' => 'id']],
            [['programa_ss'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_ss' => 'id']],
            [['programa_trabajadores_ss'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_trabajadores_ss' => 'id']],
            [['programa_adultos_ss'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_adultos_ss' => 'id']],
            [['programa_techo'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_techo' => 'id']],
            [['programa_muro'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_muro' => 'id']],
            [['programa_cuarto'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_cuarto' => 'id']],
            [['programa_agua_potable'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_agua_potable' => 'id']],
            [['programa_agua_interior'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_agua_interior' => 'id']],
            [['programa_drenaje'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_drenaje' => 'id']],
            [['programa_luz'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_luz' => 'id']],
            [['programa_estufa'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_estufa' => 'id']],
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
            'meta_piso' => 'Meta Piso',
            'acciones_piso' => 'Acciones Piso',
            'acciones_pendientes_piso' => 'Acciones Pendientes Piso',
            'inversion_piso' => 'Inversion Piso',
            'fecha_inicio_piso' => 'Fecha Inicio Piso',
            'fecha_entrega_piso' => 'Fecha Entrega Piso',
            'programa_piso' => 'Programa Piso',
            'responsable_piso' => 'Responsable Piso',
            'meta_techo' => 'Meta Techo',
            'acciones_techo' => 'Acciones Techo',
            'acciones_pendientes_techo' => 'Acciones Pendientes Techo',
            'inversion_techo' => 'Inversion Techo',
            'fecha_inicio_techo' => 'Fecha Inicio Techo',
            'fecha_entrega_techo' => 'Fecha Entrega Techo',
            'programa_techo' => 'Programa Techo',
            'responsable_techo' => 'Responsable Techo',
            'meta_muro' => 'Meta Muro',
            'acciones_muro' => 'Acciones Muro',
            'acciones_pendientes_muro' => 'Acciones Pendientes Muro',
            'inversion_muro' => 'Inversion Muro',
            'fecha_inicio_muro' => 'Fecha Inicio Muro',
            'fecha_entrega_muro' => 'Fecha Entrega Muro',
            'programa_muro' => 'Programa Muro',
            'responsable_muro' => 'Responsable Muro',
            'meta_cuarto' => 'Meta Cuarto',
            'acciones_cuarto' => 'Acciones Cuarto',
            'acciones_pendientes_cuarto' => 'Acciones Pendientes Cuarto',
            'inversion_cuarto' => 'Inversion Cuarto',
            'fecha_inicio_cuarto' => 'Fecha Inicio Cuarto',
            'fecha_entrega_cuarto' => 'Fecha Entrega Cuarto',
            'programa_cuarto' => 'Programa Cuarto',
            'responsable_cuarto' => 'Responsable Cuarto',
            'meta_calidad_espacios_vivienda' => 'Meta Calidad Espacios Vivienda',
            'acciones_calidad_espacios_vivienda' => 'Acciones Calidad Espacios Vivienda',
            'acciones_pendientez_calidad_espacios_vivienda' => 'Acciones Pendientez Calidad Espacios Vivienda',
            'meta_agua_potable' => 'Meta Agua Potable',
            'acciones_agua_potable' => 'Acciones Agua Potable',
            'acciones_pendientes_agua_potable' => 'Acciones Pendientes Agua Potable',
            'inversion_agua_potable' => 'Inversion Agua Potable',
            'fecha_inicio_agua_potable' => 'Fecha Inicio Agua Potable',
            'fecha_entrega_agua_potable' => 'Fecha Entrega Agua Potable',
            'programa_agua_potable' => 'Programa Agua Potable',
            'responsable_agua_potable' => 'Responsable Agua Potable',
            'meta_agua_interior' => 'Meta Agua Interior',
            'acciones_agua_interior' => 'Acciones Agua Interior',
            'acciones_pendientes_agua_interior' => 'Acciones Pendientes Agua Interior',
            'inversion_agua_interior' => 'Inversion Agua Interior',
            'fecha_inicio_agua_interior' => 'Fecha Inicio Agua Interior',
            'fecha_entrega_agua_interior' => 'Fecha Entrega Agua Interior',
            'programa_agua_interior' => 'Programa Agua Interior',
            'responsable_agua_interior' => 'Responsable Agua Interior',
            'meta_drenaje' => 'Meta Drenaje',
            'acciones_drenaje' => 'Acciones Drenaje',
            'acciones_pendientes_drenaje' => 'Acciones Pendientes Drenaje',
            'inversion_drenaje' => 'Inversion Drenaje',
            'fecha_inicio_drenaje' => 'Fecha Inicio Drenaje',
            'fecha_entrega_drenaje' => 'Fecha Entrega Drenaje',
            'programa_drenaje' => 'Programa Drenaje',
            'responsable_drenaje' => 'Responsable Drenaje',
            'meta_luz' => 'Meta Luz',
            'acciones_luz' => 'Acciones Luz',
            'acciones_pendientes_luz' => 'Acciones Pendientes Luz',
            'inversion_luz' => 'Inversion Luz',
            'fecha_inicio_luz' => 'Fecha Inicio Luz',
            'fecha_entrega_luz' => 'Fecha Entrega Luz',
            'programa_luz' => 'Programa Luz',
            'responsable_luz' => 'Responsable Luz',
            'meta_estufa' => 'Meta Estufa',
            'acciones_estufa' => 'Acciones Estufa',
            'acciones_pendientes_estufa' => 'Acciones Pendientes Estufa',
            'inversion_estufa' => 'Inversion Estufa',
            'fecha_inicio_estufa' => 'Fecha Inicio Estufa',
            'fecha_entrega_estufa' => 'Fecha Entrega Estufa',
            'programa_estufa' => 'Programa Estufa',
            'responsable_estufa' => 'Responsable Estufa',
            'meta_servicios_basicos' => 'Meta Servicios Basicos',
            'acciones_servicios_basicos' => 'Acciones Servicios Basicos',
            'acciones_pendientez_servicios_basicos' => 'Acciones Pendientez Servicios Basicos',
            'meta_seguro_popular' => 'Meta Seguro Popular',
            'acciones_seguro_popular' => 'Acciones Seguro Popular',
            'acciones_pendientes_seguro_popular' => 'Acciones Pendientes Seguro Popular',
            'inversion_seguro_popular' => 'Inversion Seguro Popular',
            'fecha_inicio_seguro_popular' => 'Fecha Inicio Seguro Popular',
            'fecha_entrega_seguro_popular' => 'Fecha Entrega Seguro Popular',
            'programa_seguro_popular' => 'Programa Seguro Popular',
            'responsable_seguro_popular' => 'Responsable Seguro Popular',
            'meta_3_15_escuela' => 'Meta 3 15 Escuela',
            'acciones_3_15_escuela' => 'Acciones 3 15 Escuela',
            'acciones_pendientes_3_15_escuela' => 'Acciones Pendientes 3 15 Escuela',
            'inversion_3_15_escuela' => 'Inversion 3 15 Escuela',
            'fecha_inicio_3_15_escuela' => 'Fecha Inicio 3 15 Escuela',
            'fecha_entrega_3_15_escuela' => 'Fecha Entrega 3 15 Escuela',
            'programa_3_15_escuela' => 'Programa 3 15 Escuela',
            'responsable_3_15_escuela' => 'Responsable 3 15 Escuela',
            'meta_antes_1982_primaria' => 'Meta Antes 1982 Primaria',
            'acciones_antes_1982_primaria' => 'Acciones Antes 1982 Primaria',
            'acciones_pendientes_antes_1982_primaria' => 'Acciones Pendientes Antes 1982 Primaria',
            'inversion_antes_1982_primaria' => 'Inversion Antes 1982 Primaria',
            'fecha_inicio_antes_1982_primaria' => 'Fecha Inicio Antes 1982 Primaria',
            'fecha_entrega_antes_1982_primaria' => 'Fecha Entrega Antes 1982 Primaria',
            'programa_antes_1982_primaria' => 'Programa Antes 1982 Primaria',
            'responsable_antes_1982_primaria' => 'Responsable Antes 1982 Primaria',
            'meta_despues_1982_secundaria' => 'Meta Despues 1982 Secundaria',
            'acciones_despues_1982_secundaria' => 'Acciones Despues 1982 Secundaria',
            'acciones_pendientes_despues_1982_secundaria' => 'Acciones Pendientes Despues 1982 Secundaria',
            'inversion_despues_1982_secundaria' => 'Inversion Despues 1982 Secundaria',
            'fecha_inicio_despues_1982_secundaria' => 'Fecha Inicio Despues 1982 Secundaria',
            'fecha_entrega_despues_1982_secundaria' => 'Fecha Entrega Despues 1982 Secundaria',
            'programa_despues_1982_secundaria' => 'Programa Despues 1982 Secundaria',
            'responsable_despues_1982_secundaria' => 'Responsable Despues 1982 Secundaria',
            'meta_educacion' => 'Meta Educacion',
            'acciones_educacion' => 'Acciones Educacion',
            'acciones_pendientez_educacion' => 'Acciones Pendientez Educacion',
            'meta_despensas' => 'Meta Despensas',
            'acciones_despensas' => 'Acciones Despensas',
            'acciones_pendientes_despensas' => 'Acciones Pendientes Despensas',
            'inversion_despensas' => 'Inversion Despensas',
            'fecha_inicio_despensas' => 'Fecha Inicio Despensas',
            'fecha_entrega_despensas' => 'Fecha Entrega Despensas',
            'programa_despensas' => 'Programa Despensas',
            'responsable_despensas' => 'Responsable Despensas',
            'meta_ss' => 'Meta Ss',
            'acciones_ss' => 'Acciones Ss',
            'acciones_pendientes_ss' => 'Acciones Pendientes Ss',
            'inversion_ss' => 'Inversion Ss',
            'fecha_inicio_ss' => 'Fecha Inicio Ss',
            'fecha_entrega_ss' => 'Fecha Entrega Ss',
            'programa_ss' => 'Programa Ss',
            'responsable_ss' => 'Responsable Ss',
            'meta_trabajadores_ss' => 'Meta Trabajadores Ss',
            'acciones_trabajadores_ss' => 'Acciones Trabajadores Ss',
            'acciones_pendientes_trabajadores_ss' => 'Acciones Pendientes Trabajadores Ss',
            'inversion_trabajadores_ss' => 'Inversion Trabajadores Ss',
            'fecha_inicio_trabajadores_ss' => 'Fecha Inicio Trabajadores Ss',
            'fecha_entrega_trabajadores_ss' => 'Fecha Entrega Trabajadores Ss',
            'programa_trabajadores_ss' => 'Programa Trabajadores Ss',
            'responsable_trabajadores_ss' => 'Responsable Trabajadores Ss',
            'meta_adultos_ss' => 'Meta Adultos Ss',
            'acciones_adultos_ss' => 'Acciones Adultos Ss',
            'acciones_pendientes_adultos_ss' => 'Acciones Pendientes Adultos Ss',
            'inversion_adultos_ss' => 'Inversion Adultos Ss',
            'fecha_inicio_adultos_ss' => 'Fecha Inicio Adultos Ss',
            'fecha_entrega_adultos_ss' => 'Fecha Entrega Adultos Ss',
            'programa_adultos_ss' => 'Programa Adultos Ss',
            'responsable_adultos_ss' => 'Responsable Adultos Ss',
            'meta_s_s' => 'Meta S S',
            'acciones_s_s' => 'Acciones S S',
            'acciones_pendientez_s_s' => 'Acciones Pendientez S S',
            'meta_vivienda' => 'Meta Vivienda',
            'acciones_vivienda' => 'Acciones Vivienda',
            'acciones_pendientez_vivienda' => 'Acciones Pendientez Vivienda',
            'inversion_vivienda' => 'Inversion Vivienda',
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
    public function getProgramaPiso()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_piso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaSeguroPopular()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_seguro_popular']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma315Escuela()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_3_15_escuela']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAntes1982Primaria()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_antes_1982_primaria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaDespues1982Secundaria()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_despues_1982_secundaria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaDespensas()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_despensas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaSs()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_ss']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaTrabajadoresSs()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_trabajadores_ss']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAdultosSs()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_adultos_ss']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaTecho()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_techo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaMuro()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_muro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaCuarto()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_cuarto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAguaPotable()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_agua_potable']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAguaInterior()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_agua_interior']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaDrenaje()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_drenaje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaLuz()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_luz']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaEstufa()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_estufa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
    }
}
