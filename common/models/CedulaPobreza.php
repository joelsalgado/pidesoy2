<?php

namespace common\models;

use Yii;

class CedulaPobreza extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cedula_de_pobreza';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solicitante_id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'created_at', 'updated_at'], 'required'],
            [['solicitante_id', 'periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'num_personas', 'per_0_15', 'per_16_17', 'per_18_64', 'per_65_mas', 'tiempo_hab_anios', 'tiempo_hab_meses', 'vivienda_es_id', 'num_familias', 'piso_firme', 'techo_firme', 'muros_firme', 'num_habitaciones', 'agua_publica', 'agua_interior_viv', 'drenaje_puclico', 'drenaje_desemboque', 'energia_electrica', 'cocina_gas', 'cocina_electricidad', 'cocina_lena', 'cocina_carbon', 'cocina_otro', 'chimenea', 'excusado', 'refrigerador', 'lavadora', 'educ_trunca_3_15', 'no_asiste_esc_3_15', 'prim_icomp_35_mas', 'sec_icomp_16_35', 'analfabetas_may_15', 'analfabentas_num', 'prim_icomp_15_mas', 'num_15_mas', 'no_asiste_esc_6_14', 'num_6_14', 'tiene_serv_med', 'seguro_popular', 'issemyn', 'imss', 'marina_sedena', 'isste', 'pemex', 'otro_serv_med', 'num_miemb_recibe', 'cronico_degenerativa', 'trabaja_formalmente', 'seguridad_social', 'no_SS_65_mas', 'cuantos_ingresos', 'jefe_familia', 'jefa_familia', 'hijo', 'ingreso_total', 'autoingreso', 'monto_autoingreso', 'apoyo_gobierno', 'monto_apoyo', 'apoyo_extranjero', 'monto_extranjero', 'pension', 'monto_pension', 'madre_soltera_labora', 'menor_poca_variedad', 'menor_falta_alimentos', 'menor_menor_porcion', 'menor_hambre', 'menor_acosto_hambre', 'menor_sin_comer_dia', 'adulto_poca_variedad', 'adulto_falta_alimentos', 'adulto_menor_porcion', 'quedaron_sin_comida', 'adulto_hambre', 'adulto_sin_comer_dia', 'tarjeta_liconsa', 'acceso_tienda_diconsa', 'abastece_tienda_diconsa', 'comedor_comunitario', 'programa_desarrollo_social', 'cual_programa', 'parentesco_recibe_programa', 'prospera', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['piso_material', 'techo_material', 'muros_material', 'agua_obtenida', 'cocina_otro_esp', 'causa_trunca_3_15', 'causa_no_asiste_3_15', 'causa_6_14', 'especifique', 'cual_cronico_deg', 'actividad_autoingreso', 'cual_apoyo'], 'string', 'max' => 50],
            [['nombre_recibe_programa'], 'string', 'max' => 120],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            [['parentesco_recibe_programa'], 'exist', 'skipOnError' => true, 'targetClass' => Parentesco::className(), 'targetAttribute' => ['parentesco_recibe_programa' => 'id']],
            [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
            [['vivienda_es_id'], 'exist', 'skipOnError' => true, 'targetClass' => ViviendaEs::className(), 'targetAttribute' => ['vivienda_es_id' => 'id']],
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
            'entidad_id' => 'Entidad ID',
            'region_id' => 'Region ID',
            'mun_id' => 'Mun ID',
            'loc_id' => 'Loc ID',
            'num_personas' => 'Num Personas',
            'per_0_15' => 'Per 0 15',
            'per_16_17' => 'Per 16 17',
            'per_18_64' => 'Per 18 64',
            'per_65_mas' => 'Per 65 Mas',
            'tiempo_hab_anios' => 'Tiempo Hab Anios',
            'tiempo_hab_meses' => 'Tiempo Hab Meses',
            'vivienda_es_id' => 'Vivienda Es ID',
            'num_familias' => 'Num Familias',
            'piso_firme' => 'Piso Firme',
            'piso_material' => 'Piso Material',
            'techo_firme' => 'Techo Firme',
            'techo_material' => 'Techo Material',
            'muros_firme' => 'Muros Firme',
            'muros_material' => 'Muros Material',
            'num_habitaciones' => 'Num Habitaciones',
            'agua_publica' => 'Agua Publica',
            'agua_obtenida' => 'Agua Obtenida',
            'agua_interior_viv' => 'Agua Interior Viv',
            'drenaje_puclico' => 'Drenaje Puclico',
            'drenaje_desemboque' => 'Drenaje Desemboque',
            'energia_electrica' => 'Energia Electrica',
            'cocina_gas' => 'Cocina Gas',
            'cocina_electricidad' => 'Cocina Electricidad',
            'cocina_lena' => 'Cocina Lena',
            'cocina_carbon' => 'Cocina Carbon',
            'cocina_otro' => 'Cocina Otro',
            'cocina_otro_esp' => 'Cocina Otro Esp',
            'chimenea' => 'Chimenea',
            'excusado' => 'Excusado',
            'refrigerador' => 'Refrigerador',
            'lavadora' => 'Lavadora',
            'educ_trunca_3_15' => 'Educ Trunca 3 15',
            'causa_trunca_3_15' => 'Causa Trunca 3 15',
            'no_asiste_esc_3_15' => 'No Asiste Esc 3 15',
            'causa_no_asiste_3_15' => 'Causa No Asiste 3 15',
            'prim_icomp_35_mas' => 'Prim Icomp 35 Mas',
            'sec_icomp_16_35' => 'Sec Icomp 16 35',
            'analfabetas_may_15' => 'Analfabetas May 15',
            'analfabentas_num' => 'Analfabentas Num',
            'prim_icomp_15_mas' => 'Prim Icomp 15 Mas',
            'num_15_mas' => 'Num 15 Mas',
            'no_asiste_esc_6_14' => 'No Asiste Esc 6 14',
            'num_6_14' => 'Num 6 14',
            'causa_6_14' => 'Causa 6 14',
            'tiene_serv_med' => 'Tiene Serv Med',
            'seguro_popular' => 'Seguro Popular',
            'issemyn' => 'Issemyn',
            'imss' => 'Imss',
            'marina_sedena' => 'Marina Sedena',
            'isste' => 'Isste',
            'pemex' => 'Pemex',
            'otro_serv_med' => 'Otro Serv Med',
            'especifique' => 'Especifique',
            'num_miemb_recibe' => 'Num Miemb Recibe',
            'cronico_degenerativa' => 'Cronico Degenerativa',
            'cual_cronico_deg' => 'Cual Cronico Deg',
            'trabaja_formalmente' => 'Trabaja Formalmente',
            'seguridad_social' => 'Seguridad Social',
            'no_SS_65_mas' => 'No  Ss 65 Mas',
            'cuantos_ingresos' => 'Cuantos Ingresos',
            'jefe_familia' => 'Jefe Familia',
            'jefa_familia' => 'Jefa Familia',
            'hijo' => 'Hijo',
            'ingreso_total' => 'Ingreso Total',
            'autoingreso' => 'Autoingreso',
            'monto_autoingreso' => 'Monto Autoingreso',
            'actividad_autoingreso' => 'Actividad Autoingreso',
            'apoyo_gobierno' => 'Apoyo Gobierno',
            'cual_apoyo' => 'Cual Apoyo',
            'monto_apoyo' => 'Monto Apoyo',
            'apoyo_extranjero' => 'Apoyo Extranjero',
            'monto_extranjero' => 'Monto Extranjero',
            'pension' => 'Pension',
            'monto_pension' => 'Monto Pension',
            'madre_soltera_labora' => 'Madre Soltera Labora',
            'menor_poca_variedad' => 'Menor Poca Variedad',
            'menor_falta_alimentos' => 'Menor Falta Alimentos',
            'menor_menor_porcion' => 'Menor Menor Porcion',
            'menor_hambre' => 'Menor Hambre',
            'menor_acosto_hambre' => 'Menor Acosto Hambre',
            'menor_sin_comer_dia' => 'Menor Sin Comer Dia',
            'adulto_poca_variedad' => 'Adulto Poca Variedad',
            'adulto_falta_alimentos' => 'Adulto Falta Alimentos',
            'adulto_menor_porcion' => 'Adulto Menor Porcion',
            'quedaron_sin_comida' => 'Quedaron Sin Comida',
            'adulto_hambre' => 'Adulto Hambre',
            'adulto_sin_comer_dia' => 'Adulto Sin Comer Dia',
            'tarjeta_liconsa' => 'Tarjeta Liconsa',
            'acceso_tienda_diconsa' => 'Acceso Tienda Diconsa',
            'abastece_tienda_diconsa' => 'Abastece Tienda Diconsa',
            'comedor_comunitario' => 'Comedor Comunitario',
            'programa_desarrollo_social' => 'Programa Desarrollo Social',
            'cual_programa' => 'Cual Programa',
            'nombre_recibe_programa' => 'Nombre Recibe Programa',
            'parentesco_recibe_programa' => 'Parentesco Recibe Programa',
            'prospera' => 'Prospera',
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
    public function getRegion()
    {
        return $this->hasOne(Regiones::className(), ['id' => 'region_id']);
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
    public function getParentescoRecibePrograma()
    {
        return $this->hasOne(Parentesco::className(), ['id' => 'parentesco_recibe_programa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViviendaEs()
    {
        return $this->hasOne(ViviendaEs::className(), ['id' => 'vivienda_es_id']);
    }
}
