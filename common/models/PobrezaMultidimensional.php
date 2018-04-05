<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;

class PobrezaMultidimensional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pobreza_multidimensional';
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solicitante_id', 'cedula_pobreza_id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'created_at', 'updated_at'], 'required'],
            [['solicitante_id', 'cedula_pobreza_id', 'periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'calidad_vivienda', 'calidad_vivienda_piso', 'calidad_vivienda_techo', 'calidad_vivienda_muros', 'calidad_vivienda_hacentamiento', 'serv_basicos', 'serv_basicos_agua', 'serv_basicos_drenaje', 'serv_basicos_electricidad', 'serv_basicos_chimenea', 'serv_basicos_excusado', 'serv_basicos_reefrigerador', 'serv_basicos_lavadora', 'educ', 'educ_trunca_3_15', 'educ_no_asiste_3_15', 'educ_no_prim_35', 'educ_sec_inc_16_35', 'educ_analfabeta_may_15', 'educ_prim_inc_may_15', 'educ_no_asiste_6_14', 'salud', 'salud_recibe', 'ss', 'ss_trabajo_formal', 'ss_trabajo_sin', 'ss_adultos_may_sin', 'alimentacion', 'alimentacion_val', 'vinc_prog_liconsa', 'vinc_prog_diconsa', 'vinc_prog_abastece_diconsa', 'vinc_prog_comedor', 'vinc_prog_asiste_comedor', 'vinc_prog_acceso', 'vinc_prog_prospera', 'vinc_prog_mujeres_solt', 'vinc_prog_adult_may', 'carencia_soc', 'carencia_soc_desc', 'indicador_ingresos', 'indicador_ingresos_desc', 'resultado', 'resultado_val', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['cedula_pobreza_id'], 'exist', 'skipOnError' => true, 'targetClass' => CedulaPobreza::className(), 'targetAttribute' => ['cedula_pobreza_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
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
            'cedula_pobreza_id' => 'Cedula Pobreza ID',
            'periodo' => 'Periodo',
            'entidad_id' => 'Entidad ID',
            'region_id' => 'Region ID',
            'mun_id' => 'Mun ID',
            'loc_id' => 'Loc ID',
            'calidad_vivienda' => 'Calidad Vivienda',
            'calidad_vivienda_piso' => 'Calidad Vivienda Piso',
            'calidad_vivienda_techo' => 'Calidad Vivienda Techo',
            'calidad_vivienda_muros' => 'Calidad Vivienda Muros',
            'calidad_vivienda_hacentamiento' => 'Calidad Vivienda Hacentamiento',
            'serv_basicos' => 'Serv Basicos',
            'serv_basicos_agua' => 'Serv Basicos Agua',
            'serv_basicos_drenaje' => 'Serv Basicos Drenaje',
            'serv_basicos_electricidad' => 'Serv Basicos Electricidad',
            'serv_basicos_chimenea' => 'Serv Basicos Chimenea',
            'serv_basicos_excusado' => 'Serv Basicos Excusado',
            'serv_basicos_reefrigerador' => 'Serv Basicos Reefrigerador',
            'serv_basicos_lavadora' => 'Serv Basicos Lavadora',
            'educ' => 'Educ',
            'educ_trunca_3_15' => 'Educ Trunca 3 15',
            'educ_no_asiste_3_15' => 'Educ No Asiste 3 15',
            'educ_no_prim_35' => 'Educ No Prim 35',
            'educ_sec_inc_16_35' => 'Educ Sec Inc 16 35',
            'educ_analfabeta_may_15' => 'Educ Analfabeta May 15',
            'educ_prim_inc_may_15' => 'Educ Prim Inc May 15',
            'educ_no_asiste_6_14' => 'Educ No Asiste 6 14',
            'salud' => 'Salud',
            'salud_recibe' => 'Salud Recibe',
            'ss' => 'Ss',
            'ss_trabajo_formal' => 'Ss Trabajo Formal',
            'ss_trabajo_sin' => 'Ss Trabajo Sin',
            'ss_adultos_may_sin' => 'Ss Adultos May Sin',
            'alimentacion' => 'Alimentacion',
            'alimentacion_val' => 'Alimentacion Val',

            'vinc_prog_liconsa' => 'Vinc Prog Liconsa',
            'vinc_prog_diconsa' => 'Vinc Prog Diconsa',
            'vinc_prog_abastece_diconsa' => 'Vinc Prog Abastece Diconsa',
            'vinc_prog_comedor' => 'Vinc Prog Comedor',
            'vinc_prog_asiste_comedor' => 'Vinc Prog Asiste Comedor',
            'vinc_prog_acceso' => 'Vinc Prog Acceso',
            'vinc_prog_prospera' => 'Vinc Prog Prospera',
            'vinc_prog_mujeres_solt' => 'Vinc Prog Mujeres Solt',
            'vinc_prog_adult_may' => 'Vinc Prog Adult May',
            'carencia_soc' => 'Carencia Soc',
            'carencia_soc_desc' => 'Carencia Soc Desc',
            'indicador_ingresos' => 'Indicador Ingresos',
            'indicador_ingresos_desc' => 'Indicador Ingresos Desc',
            'resultado' => 'Resultado',
            'resultado_val' => 'Resultado Val',
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
    public function getCedulaPobreza()
    {
        return $this->hasOne(CedulaPobreza::className(), ['id' => 'cedula_pobreza_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidad()
    {
        return $this->hasOne(EntidadNacimiento::className(), ['id' => 'entidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoc()
    {
        return $this->hasOne(Localidades::className(), ['localidad_id' => 'loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMun()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regiones::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
    }
}
