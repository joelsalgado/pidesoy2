<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;

class CedulaPobreza extends \yii\db\ActiveRecord
{
    const SCENARIO_P = 'PARTICIPANTES';
    public $scenario = 'web';

    public static function tableName()
    {
        return 'cedula_de_pobreza';
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
        if ($this->scenario == self::SCENARIO_P) {
            return [
                [['solicitante_id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'created_at', 'updated_at'], 'required'],
            ];
        }
        else{
            return [
                [['solicitante_id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'created_at', 'updated_at',
                    'num_personas', 'piso_firme', 'techo_firme', 'muros_firme', 'num_habitaciones','agua_publica',
                    'agua_interior_viv','drenaje_puclico','drenaje_desemboque','energia_electrica', 'educ_trunca_3_15',
                    'no_asiste_esc_3_15','prim_icomp_35_mas','sec_icomp_16_35', 'tiene_serv_med','trabaja_formalmente',
                    'no_SS_65_mas', 'madre_soltera_labora','menor_poca_variedad',
                    'menor_falta_alimentos', 'menor_menor_porcion','menor_hambre','menor_acosto_hambre',
                    'menor_sin_comer_dia','adulto_poca_variedad','adulto_falta_alimentos','adulto_menor_porcion',
                    'quedaron_sin_comida','adulto_hambre','adulto_sin_comer_dia', 'tarjeta_liconsa',
                    'acceso_tienda_diconsa','abastece_tienda_diconsa','comedor_comunitario','asiste_comedor_comunitario',
                    'programa_desarrollo_social','prospera',
                    ], 'required', 'message' => '{attribute} Es un campo Requerido'],
                [['solicitante_id', 'periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'num_personas', 'per_0_15', 'per_16_17', 'per_18_64', 'per_65_mas', 'tiempo_hab_anios', 'tiempo_hab_meses', 'vivienda_es_id', 'num_familias', 'piso_firme', 'techo_firme', 'muros_firme', 'num_habitaciones', 'agua_publica', 'agua_interior_viv', 'drenaje_puclico', 'drenaje_desemboque', 'energia_electrica', 'cocina_gas', 'cocina_electricidad', 'cocina_lena', 'cocina_carbon', 'cocina_otro', 'chimenea', 'excusado', 'refrigerador', 'lavadora', 'educ_trunca_3_15', 'no_asiste_esc_3_15', 'prim_icomp_35_mas', 'sec_icomp_16_35', 'analfabetas_may_15', 'analfabentas_num', 'prim_icomp_15_mas', 'num_15_mas', 'no_asiste_esc_6_14', 'num_6_14', 'tiene_serv_med', 'seguro_popular', 'issemyn', 'imss', 'marina_sedena', 'isste', 'pemex', 'otro_serv_med', 'num_miemb_recibe', 'cronico_degenerativa', 'trabaja_formalmente', 'seguridad_social', 'no_SS_65_mas', 'cuantos_ingresos', 'jefe_familia', 'jefa_familia', 'hijo', 'ingreso_total', 'autoingreso', 'monto_autoingreso', 'apoyo_gobierno', 'monto_apoyo', 'apoyo_extranjero', 'monto_extranjero', 'pension', 'monto_pension', 'madre_soltera_labora', 'menor_poca_variedad', 'menor_falta_alimentos', 'menor_menor_porcion', 'menor_hambre', 'menor_acosto_hambre', 'menor_sin_comer_dia', 'adulto_poca_variedad', 'adulto_falta_alimentos', 'adulto_menor_porcion', 'quedaron_sin_comida', 'adulto_hambre', 'adulto_sin_comer_dia', 'tarjeta_liconsa', 'acceso_tienda_diconsa', 'abastece_tienda_diconsa', 'comedor_comunitario','asiste_comedor_comunitario', 'programa_desarrollo_social', 'cual_programa', 'parentesco_recibe_programa', 'prospera', 'status', 'created_by', 'updated_by'], 'integer', 'message' => '{attribute} Debe ser númerico'],
                [['created_at', 'updated_at'], 'safe'],
                [['piso_material', 'techo_material', 'muros_material', 'agua_obtenida', 'cocina_otro_esp', 'causa_trunca_3_15', 'causa_no_asiste_3_15', 'causa_6_14', 'especifique', 'cual_cronico_deg', 'actividad_autoingreso', 'cual_apoyo'], 'string', 'max' => 50],
                [['nombre_recibe_programa'], 'string', 'max' => 120],
                [['tiempo_hab_meses'], 'integer', 'max' => 11, 'tooBig' => '{attribute} no debe ser mayor a 11'],
                [['tiempo_hab_anios'], 'integer', 'max' => 200, 'tooBig' => '{attribute} no debe ser mayor a 200'],
                [['num_personas','per_0_15', 'per_16_17', 'per_18_64', 'per_65_mas', 'num_habitaciones',
                    'cuantos_ingresos'], 'integer', 'max' => 90000, 'tooBig' => '{attribute} es demasiado grande'],
                ['num_personas', 'validateSuma'],
                ['cuantos_ingresos', 'validateIngresos'],
                ['num_miemb_recibe', 'validateSalud'],
                [['ingreso_total', 'monto_autoingreso', 'monto_apoyo', 'monto_extranjero', 'monto_pension'], 'integer', 'max' => 10000000, 'tooBig' => '{attribute} es demasiado grande'],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
                [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
                [['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
                [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
                [['parentesco_recibe_programa'], 'exist', 'skipOnError' => true, 'targetClass' => Parentesco::className(), 'targetAttribute' => ['parentesco_recibe_programa' => 'id']],
                [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
                [['vivienda_es_id'], 'exist', 'skipOnError' => true, 'targetClass' => ViviendaEs::className(), 'targetAttribute' => ['vivienda_es_id' => 'id']],
            ];
        }
    }

    public function  validateIngresos(){
        if($this->cuantos_ingresos > $this->num_personas){
            $this->addError('cuantos_ingresos', 'No corresponde con el numero de habitantes');
        }
    }

    public function  validateSalud(){
        if($this->num_miemb_recibe > $this->num_personas){
            $this->addError('num_miemb_recibe', 'No corresponde con el numero de habitantes');
        }
    }

    public function validateSuma()
    {
        $total = $this->num_personas;
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $num4 = 0;


        if ($this->per_0_15 == "" || $this->per_0_15 == null) {
            $num1 = 0;
        }else{
            $num1 = $this->per_0_15;
        }

        if ($this->per_16_17 == "" || $this->per_16_17 == null) {
            $num2 = 0;
        }else{
            $num2 = $this->per_16_17;
        }

        if ($this->per_18_64 == "" || $this->per_18_64 == null) {
            $num3 = 0;
        }else{
            $num3 = $this->per_18_64;
        }

        if ($this->per_65_mas == "" || $this->per_65_mas == null) {
            $num4 = 0;
        }else{
            $num4 = $this->per_65_mas;
        }


        $suma = $num1 + $num2 + $num3 + $num4;

        if ($total != $suma){
            $this->addError('num_personas', 'La suma de los integrantes no corresponde al numero de personas que indico');
        }
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

            'num_personas' => '¿Cuántas personas habitan regularmente en esta vivienda?',
            'per_0_15' => 'Entre 0 y 15 años',
            'per_16_17' => 'Entre 16 y 17 años',
            'per_18_64' => 'Entre 18 y 64 años',
            'per_65_mas' => '65 o más años de edad',
            'tiempo_hab_anios' => 'Años',
            'tiempo_hab_meses' => 'Meses',
            'vivienda_es_id' => 'La Vivienda es:',
            'num_familias' => '¿Cuántas familias conviven al interior de la vivienda?',

            'piso_firme' => '¿El material de los pisos de la vivienda es firme?',
            'piso_material' => 'Material de los pisos',
            'techo_firme' => '¿El material de los techos de la vivienda es firme?',
            'techo_material' => 'Material de los techos',
            'muros_firme' => '¿El material de los muros de la vivienda es block, tabique o tabicón?',
            'muros_material' => 'Material de los muros',
            'num_habitaciones' => '¿Cuántas habitaciones tiene la vivienda?',

            'agua_publica' => '¿El agua que se consume la toma de la red pública?',
            'agua_obtenida' => '¿De dónde obtiene el agua?',
            'agua_interior_viv' => '¿Su toma de agua llega al interior de su vivienda?',
            'drenaje_puclico' => ' ¿Cuenta con servicio de drenaje público en su hogar?',
            'drenaje_desemboque' => '¿El desagüe desemboca en un rio, lago, barranca o grieta?',
            'energia_electrica' => '¿Cuenta la vivienda con energía eléctrica?',
            'cocina_gas' => 'Gas',
            'cocina_electricidad' => 'Electricidad',
            'cocina_lena' => 'Leña',
            'cocina_carbon' => 'Carbón',
            'cocina_otro' => 'Otro',
            'cocina_otro_esp' => 'Especifica',
            'chimenea' => '¿Cuenta con chimenea en el hogar?',
            'excusado' => '¿La vivienda donde habita cuenta con excusado?',
            'refrigerador' => '¿En su vivienda cuenta con refrigerador?',
            'lavadora' => '¿En su vivienda cuenta con lavadora?',

            'educ_trunca_3_15' => '¿En el hogar algún integrante de 3 a 15 años trunco su educación primaria o secundaria?',
            'causa_trunca_3_15' => 'Indique la Causa',
            'no_asiste_esc_3_15' => '¿En el hogar algún integrante de 3 a 15 años no asiste a la escuela?',
            'causa_no_asiste_3_15' => 'Indique la causa',
            'prim_icomp_35_mas' => '¿Algún integrante del hogar es mayor a 35 años y no cuenta con educación primaria completa?',
            'sec_icomp_16_35' => '¿Algún integrante del hogar tiene entre 16 y 35 años y no cuenta con educación secundaria completa?',
            'analfabetas_may_15' => '¿En el hogar hay personas mayores de 15 que sean analfabetas?',
            'analfabentas_num' => 'Indique el número de personas en esta condición',
            'prim_icomp_15_mas' => '¿En el hogar hay personas mayores de 15 años con primaria incompleta?',
            'num_15_mas' => 'Indique el número de personas en esta condición',
            'no_asiste_esc_6_14' => '¿En su hogar hay menores entre 6 y 14 años de edad que no asiste a la escuela?',
            'num_6_14' => 'Indique el número de personas en esta condición',
            'causa_6_14' => 'Indique la causa',


            'tiene_serv_med' => '¿Los integrantes del hogar cuenta con adscripción o derecho a recibir servicios médicos de alguna institución?',
            'seguro_popular' => 'Seguro Popular',
            'issemyn' => 'ISSEMYM',
            'imss' => 'IMSS',
            'marina_sedena' => 'Marina/SEDENA',
            'isste' => 'ISSSTE',
            'pemex' => 'Pemex',
            'otro_serv_med' => 'Otro',
            'especifique' => 'Especifique',
            'num_miemb_recibe' => 'Número de integrantes del hogar que no reciben servicios médicos',
            'cronico_degenerativa' => '¿Algún o algunos Integrante del hogar padecen de una enfermedad crónico degenerativa o alguna discapacidad?',
            'cual_cronico_deg' => 'Cual o Cuales?',

            'trabaja_formalmente' => '¿Algún integrante de la familia trabaja formalmente?',
            'seguridad_social' => '¿Recibe seguridad social por su actividad laboral?l',
            'no_SS_65_mas' => '¿En el hogar hay personas de 65 años o más que no cuenten con seguridad social?',

            'cuantos_ingresos' => '¿Cuántos integrantes al interior del hogar reciben ingresos por su trabajo?',
            'jefe_familia' => 'Jefe de Familia',
            'jefa_familia' => 'Jefa de Familia',
            'hijo' => 'Hijo',
            'ingreso_total' => 'El ingreso total mensual de esta/s persona/s que recibe/n por su/s actividad/es de:',
            'autoingreso' => '¿Algún miembro del hogar genera auto ingreso por actividades propias?',
            'monto_autoingreso' => 'Monto Mensual',
            'actividad_autoingreso' => 'Indica la Actividad',
            'apoyo_gobierno' => '¿En su hogar reciben apoyos monetarios de gobierno (federal, estatal y/o municipal)?',
            'monto_apoyo' => 'Monto Mensual',
            'cual_apoyo' => 'Indica el Apoyo',
            'apoyo_extranjero' => '¿En su hogar reciben apoyo de familiares radicando en el extranjero?',
            'monto_extranjero' => 'Monto Mensual',
            'pension' => '¿Algún integrante del hogar recibe pensión?',
            'monto_pension' => 'Monto Mensual',
            'madre_soltera_labora' => '¿Algún integrante en el hogar es madre soltera y labora para sostener a sus hijos?',

            'menor_poca_variedad' => '¿Algún menor de 18 años en su hogar tuvo una alimentación basada en muy poca variedad de alimentos?',
            'menor_falta_alimentos' => '¿Algún menor de 18 años en su hogar dejó de desayunar, comer o cenar por falta de alimentos?',
            'menor_menor_porcion' => '¿Alguna vez a un menor de 18 años del hogar le tuvieron que disminuir la cantidad servida en las comidas?',
            'menor_hambre' => '¿Alguna vez algún menor de 18 años del hogar sintió hambre, pero no comió por falta de alimentos?',
            'menor_acosto_hambre' => '¿Alguna vez algún menor de 18 años del hogar se acostó con hambre por falta de alimentos?',
            'menor_sin_comer_dia' => '¿Alguna vez algún menor de 18 años del hogar comió solo una vez al día o dejo de comer todo un día por falta de alimentos?',
            'adulto_poca_variedad' => '¿Alguna vez usted o algún adulto en su hogar tuvo una alimentación basada en muy poca variedad de alimentos?',
            'adulto_falta_alimentos' => '¿Alguna vez usted o algún adulto en su hogar dejó de desayunar, comer o cenar por falta de alimentos?',
            'adulto_menor_porcion' => '¿Alguna vez usted o algún adulto en su hogar comió menos de lo que usted piensa debía comer por falta de alimentos?',
            'quedaron_sin_comida' => '¿Alguna vez se quedaron sin comida?',
            'adulto_hambre' => '¿Alguna vez usted o algún adulto de este hogar sintió hambre, pero no comió por falta de alimentos?',
            'adulto_sin_comer_dia' => '¿Alguna vez usted o algún adulto en su hogar sólo comió una vez al día o dejó de comer todo un día por falta de alimentos?',

            'tarjeta_liconsa' => '¿Dentro de su familia algún integrante cuenta con la tarjeta de LICONSA (Leche)?',
            'acceso_tienda_diconsa' => '¿Su familia tiene acceso a la tienda fija o móvil (vehículos) DICONSA?',
            'abastece_tienda_diconsa' => '¿Dentro de su familia algún miembro se abastece en las tiendas DICONSA?',
            'comedor_comunitario' => '¿Existe en su comunidad un Comedor Comunitario?',
            'asiste_comedor_comunitario' => '¿Algún miembro de la familia asiste al Comedor Comunitario?',
            'programa_desarrollo_social' => 'En el hogar algún o algunos miembros tienen acceso a Programas de Desarrollo Social:',
            'cual_programa' => 'Cual Programa?',
            'nombre_recibe_programa' => 'Nombre del beneficiario de dicho programa?',
            'parentesco_recibe_programa' => 'Parentesco:',
            'prospera' => '¿La familia es beneficiaria del Programa de Inclusión Social PROSPERA?',

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

    public function getPrograma()
    {
        return $this->hasOne(Programas::className(), ['id' => 'cual_programa']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if($changedAttributes) {
            $piso = ($this->piso_firme == 0) ? 1 : 0;
            $techo = ($this->techo_firme == 0) ? 1 : 0;
            $muros = ($this->muros_firme == 0) ? 1 : 0;
            if ($this->num_habitaciones == 0) {
                $hacinamiento = 1;
            } else {
                $cal_hac = $this->num_personas / $this->num_habitaciones;
                $hacinamiento = ($cal_hac >= 2.5) ? 1 : 0;
            }
            $sum_calidad = $piso + $techo + $muros + $hacinamiento;
            $calidad = ($sum_calidad >= 1) ? 1 : 0;

            $agua_pub = ($this->agua_publica == 0) ? 1 : 0;
            $agua_int = ($this->agua_interior_viv == 0) ? 1 : 0;
            $suma_agua = $agua_int + $agua_pub;
            $drenaje_pub = ($this->drenaje_puclico == 0) ? 1 : 0;
            if ($drenaje_pub == 0) {
                $drenaje_desem = 0;
            } else {
                $drenaje_desem = ($this->drenaje_desemboque == 0) ? 0 : 1;
            }
            $suma_drenaje = $drenaje_desem + $drenaje_pub + $drenaje_desem;
            $luz = ($this->energia_electrica == 0) ? 1 : 0;
            if (is_null($this->chimenea)) {
                $chimenea = 0;
            } else {
                $chimenea = ($this->chimenea == 0) ? 1 : 0;
            }

            $sum_serv_basicos = $suma_agua + $suma_drenaje + $luz + $chimenea;
            $serv_basicos = ($sum_serv_basicos >= 1) ? 1 : 0;

            $excusado = ($this->excusado == 0) ? 1 : 0;
            $refrigerador = ($this->refrigerador == 0) ? 1 : 0;
            $lavadora = ($this->lavadora == 0) ? 1 : 0;

            $edu_trunca_3_15 = ($this->educ_trunca_3_15 == 1) ? 1 : 0;
            $edu_no_asiste_esc_3_15 = ($this->no_asiste_esc_3_15 == 1) ? 1 : 0;
            $edu_prim_icomp_35_mas = ($this->prim_icomp_35_mas == 1) ? 1 : 0;
            $edu_sec_icomp_16_35 = ($this->sec_icomp_16_35 == 1) ? 1 : 0;
            $suma_educ = $edu_trunca_3_15 + $edu_no_asiste_esc_3_15 + $edu_prim_icomp_35_mas + $edu_sec_icomp_16_35;
            $educacion = ($suma_educ >= 1) ? 1 : 0;

            $edu_analfabetas_may_15 = ($this->analfabetas_may_15 == 1) ? 1 : 0;
            $edu_prim_icomp_15_mas = ($this->prim_icomp_15_mas == 1) ? 1 : 0;
            $edu_no_asiste_esc_6_14 = ($this->no_asiste_esc_6_14 == 1) ? 1 : 0;

            $recibe_salud = ($this->tiene_serv_med == 0) ? 1 : 0;
            $salud = ($recibe_salud >= 1) ? 1 : 0;

            $seguridad_social_formal = ($this->trabaja_formalmente == 0) ? 1 : 0;
            if($seguridad_social_formal == 1){
                $seguridad_social_sin = 0;
            }else{
                $seguridad_social_sin = ($this->seguridad_social == 0) ? 1 : 0;
            }

            $seguridad_social_may_sin = ($this->no_SS_65_mas == 1) ? 1 : 0;
            $sum_ss = $seguridad_social_formal + $seguridad_social_sin + $seguridad_social_may_sin;
            $seguridad_social = ($sum_ss >= 1) ? 1 : 0;

            $al_menor_poca_variedad = ($this->menor_poca_variedad == 1) ? 1 : 0;
            $al_menor_falta_alimentos = ($this->menor_falta_alimentos == 1) ? 1 : 0;
            $al_menor_menor_porcion = ($this->menor_menor_porcion == 1) ? 1 : 0;
            $al_menor_hambre = ($this->menor_hambre == 1) ? 1 : 0;
            $al_menor_acosto_hambre = ($this->menor_acosto_hambre == 1) ? 1 : 0;
            $al_menor_sin_comer_dia = ($this->menor_sin_comer_dia == 1) ? 1 : 0;
            $al_adulto_poca_variedad = ($this->adulto_poca_variedad == 1) ? 1 : 0;
            $al_adulto_falta_alimentos = ($this->adulto_falta_alimentos == 1) ? 1 : 0;
            $al_adulto_menor_porcion = ($this->adulto_menor_porcion == 1) ? 1 : 0;
            $al_quedaron_sin_comida = ($this->quedaron_sin_comida == 1) ? 1 : 0;
            $al_adulto_hambre = ($this->adulto_hambre == 1) ? 1 : 0;
            $al_adulto_sin_comer_dia = ($this->adulto_sin_comer_dia == 1) ? 1 : 0;
            $suma_al = $al_menor_poca_variedad + $al_menor_falta_alimentos + $al_menor_menor_porcion + $al_menor_hambre + $al_menor_acosto_hambre + $al_menor_sin_comer_dia + $al_adulto_poca_variedad + $al_adulto_falta_alimentos + $al_adulto_menor_porcion + $al_quedaron_sin_comida + $al_adulto_hambre + $al_adulto_sin_comer_dia;
            $alimentacion = ($suma_al >= 1) ? 1 : 0;

            $suma_carencias = $alimentacion + $seguridad_social + $salud + $educacion + $serv_basicos + $calidad;

            if ($suma_carencias == 0) {
                $carencias_desc = 'No pobre por carencia';
                $carencia_val = 0;
            } elseif ($suma_carencias >= 1 && $suma_carencias < 3) {
                $carencias_desc = 'Vulnerable por carencias';
                $carencia_val = 1;
            } elseif ($suma_carencias >= 3) {
                $carencias_desc = 'Pobre por carencia';
                $carencia_val = 2;
            }


            $canasta_alimentaria = 0;
            $canasta_al_mas_no_aliemantaria = 0;

            if ($this->loc->tipo_loc == 'R') {
                $canasta_alimentaria = 1041.97;
                $canasta_al_mas_no_aliemantaria = 1915.01;
            } else {
                $canasta_alimentaria = 1472.94;
                $canasta_al_mas_no_aliemantaria = 2974.46;
            }

            $ingreso_total = ($this->ingreso_total == 0) ? 0 : $this->ingreso_total;
            $ingreso_auto = ($this->monto_autoingreso == 0) ? 0 : $this->monto_autoingreso;
            $ingreso_apoyo = ($this->monto_apoyo == 0) ? 0 : $this->monto_apoyo;
            $ingreso_extranjero = ($this->monto_extranjero == 0) ? 0 : $this->monto_extranjero;
            $ingreso_pension = ($this->monto_pension == 0) ? 0 : $this->monto_pension;

            $suma_ingresos = $ingreso_total + $ingreso_auto + $ingreso_apoyo + $ingreso_extranjero + $ingreso_pension;

            if ($this->num_personas) {
                $ingreso = $suma_ingresos / $this->num_personas;
            } else {
                $ingreso = 0;
            }

            if ($ingreso >= $canasta_al_mas_no_aliemantaria) {
                $indicador_ingresos_desc = "No Pobre por Ingresos";
                $indicador_ingresos_val = 0;
            } elseif ($ingreso >= $canasta_alimentaria) {
                $indicador_ingresos_desc = "Vulnerable por Ingresos";
                $indicador_ingresos_val = 1;
            } elseif ($ingreso < $canasta_alimentaria) {
                $indicador_ingresos_desc = "Pobreza por Ingresos";
                $indicador_ingresos_val = 2;
            }


            if ($carencia_val == 0 && $indicador_ingresos_val == 0) {
                $resultado = "NO POBRE NO VULNERABLE";
                $resultado_val = 0;
            } elseif ($carencia_val == 1 && $indicador_ingresos_val == 0) {
                $resultado = "VULNERABLE POR CARENCIAS SOCIALES";
                $resultado_val = 1;
            } elseif ($carencia_val == 2 && $indicador_ingresos_val == 0) {
                $resultado = "VULNERABLE POR CARENCIAS SOCIALES";
                $resultado_val = 1;
            } elseif ($carencia_val == 0 && $indicador_ingresos_val == 1) {
                $resultado = "VULNERABLE POR INGRESOS";
                $resultado_val = 2;
            } elseif ($carencia_val == 1 && $indicador_ingresos_val == 1) {
                $resultado = "POBREZA MODERADA";
                $resultado_val = 3;
            } elseif ($carencia_val == 2 && $indicador_ingresos_val == 1) {
                $resultado = "POBREZA MODERADA";
                $resultado_val = 3;
            } elseif ($carencia_val == 0 && $indicador_ingresos_val == 2) {
                $resultado = "POBREZA MODERADA";
                $resultado_val = 3;
            } elseif ($carencia_val == 2 && $indicador_ingresos_val == 2) {
                $resultado = "POBREZA EXTREMA";
                $resultado_val = 4;
            } elseif ($carencia_val == 1 && $indicador_ingresos_val == 2) {
                $resultado = "POBREZA MODERADA";
                $resultado_val = 3;
            }

            $pobreza = PobrezaMultidimensional::find()->where(['solicitante_id' => $this->solicitante_id])->one();
            $seg = Seguimiento::find()->where(['solicitante_id' => $this->solicitante_id])->one();

            if ($pobreza) {
                $model = $pobreza;
            } else {
                $model = new PobrezaMultidimensional();
            }

            if ($seg) {
                $seguimiento = $seg;
            } else {
                $seguimiento = new Seguimiento();
            }


            $seguimiento->solicitante_id = $this->solicitante_id;
            $seguimiento->periodo = 2018;
            $seguimiento->meta_piso = $piso;
            $seguimiento->meta_techo = $techo;
            $seguimiento->meta_muro = $muros;
            $seguimiento->meta_cuarto = $hacinamiento;
            $suma_vivienda = $piso + $techo + $muros + $hacinamiento;

            $seguimiento->meta_calidad_espacios_vivienda = $suma_vivienda;

            $seguimiento->meta_agua_potable = $agua_pub;
            $seguimiento->meta_agua_interior = $agua_int;
            $seguimiento->meta_drenaje = $drenaje_pub;
            $seguimiento->meta_luz = $luz;
            $seguimiento->meta_estufa = $chimenea;
            $suma_serv_basicos = $agua_pub + $agua_int + $drenaje_pub + $luz + $chimenea;

            $seguimiento->meta_servicios_basicos = $suma_serv_basicos;

            $suma_salud  = ($this->seguro_popular == 1 ) ? 1 : 0;
            $seguimiento->meta_seguro_popular = $suma_salud;

            $sum_edu = $edu_trunca_3_15 + $edu_no_asiste_esc_3_15;
            $meta_3_15_escuela = ($sum_edu > 0) ? 1 : 0;

            $seguimiento->meta_3_15_escuela = $meta_3_15_escuela;
            $seguimiento->meta_antes_1982_primaria = $edu_prim_icomp_35_mas;
            $seguimiento->meta_despues_1982_secundaria = $edu_sec_icomp_16_35;

            $suma_edu = $meta_3_15_escuela + $edu_prim_icomp_35_mas + $edu_sec_icomp_16_35;
            $seguimiento->meta_educacion = $suma_edu;

            $seguimiento->meta_despensas = $alimentacion;

            $seguimiento->meta_ss = $seguridad_social_formal;
            $seguimiento->meta_trabajadores_ss = $seguridad_social_sin;
            $seguimiento->meta_adultos_ss = $seguridad_social_may_sin;

            $suma_s_s = $seguridad_social_formal + $seguridad_social_sin + $seguridad_social_may_sin;
            $seguimiento->meta_s_s = $suma_s_s;

            $suma_result = $suma_s_s + $alimentacion + $suma_edu + $suma_salud + $suma_serv_basicos + $suma_vivienda;
            $seguimiento->meta_vivienda = $suma_result;
            $seguimiento->status = 1;


            $model->solicitante_id = $this->solicitante_id;
            $model->cedula_pobreza_id = $this->id;
            $model->periodo = $this->periodo;
            $model->entidad_id = $this->entidad_id;
            $model->region_id = $this->region_id;
            $model->region_id = $this->region_id;
            $model->mun_id = $this->mun_id;
            $model->loc_id = $this->loc_id;
            $model->created_at = $this->created_at;
            $model->updated_at = $this->updated_at;

            $model->calidad_vivienda = $calidad;
            $model->calidad_vivienda_piso = $piso;
            $model->calidad_vivienda_techo = $techo;
            $model->calidad_vivienda_muros = $muros;
            $model->calidad_vivienda_hacentamiento = $hacinamiento;

            $model->serv_basicos = $serv_basicos;
            $model->serv_basicos_agua = $suma_agua;
            $model->serv_basicos_drenaje = $suma_drenaje;
            $model->serv_basicos_electricidad = $luz;
            $model->serv_basicos_chimenea = $chimenea;
            $model->serv_basicos_excusado = $excusado;
            $model->serv_basicos_reefrigerador = $refrigerador;
            $model->serv_basicos_lavadora = $lavadora;

            $model->educ =$educacion;
            $model->educ_trunca_3_15 = $edu_trunca_3_15;
            $model->educ_no_asiste_3_15 = $edu_no_asiste_esc_3_15;
            $model->educ_no_prim_35 = $edu_prim_icomp_35_mas;
            $model->educ_sec_inc_16_35 =$edu_sec_icomp_16_35 ;
            $model->educ_analfabeta_may_15 = $edu_analfabetas_may_15;
            $model->educ_prim_inc_may_15 = $edu_prim_icomp_15_mas;
            $model->educ_no_asiste_6_14 = $edu_no_asiste_esc_6_14;

            $model->salud = $salud;
            $model->salud_recibe = $recibe_salud;

            $model->ss = $seguridad_social;
            $model->ss_trabajo_formal = $seguridad_social_formal;
            $model->ss_trabajo_sin = $seguridad_social_sin;
            $model->ss_adultos_may_sin = $seguridad_social_may_sin;

            $model->alimentacion = $alimentacion;
            $model->alimentacion_val = $suma_al;

            $model->vinc_prog_liconsa = ($this->tarjeta_liconsa == 0) ? 0 : 1;;
            $model->vinc_prog_diconsa = ($this->acceso_tienda_diconsa == 0) ? 0 : 1;;
            $model->vinc_prog_abastece_diconsa = ($this->abastece_tienda_diconsa == 0) ? 0 : 1;;
            $model->vinc_prog_comedor = ($this->comedor_comunitario == 0) ? 0 : 1;;
            $model->vinc_prog_asiste_comedor = ($this->asiste_comedor_comunitario == 0) ? 0 : 1;;
            $model->vinc_prog_acceso = ($this->programa_desarrollo_social == 0) ? 0 : 1;;
            $model->vinc_prog_prospera = ($this->prospera == 0) ? 0 : 1;;
            $model->vinc_prog_mujeres_solt = ($this->madre_soltera_labora == 0) ? 0 : 1;;
            $model->vinc_prog_adult_may = ($this->per_65_mas >= 0) ? 0 : 1;

            $model->carencia_soc = $suma_carencias;
            $model->carencia_soc_desc = $carencia_val;
            $model->indicador_ingresos = $indicador_ingresos_val;
            $model->indicador_ingresos_desc = $indicador_ingresos_val;
            $model->resultado = $resultado_val;
            $model->resultado_val = $resultado_val;
            $model->status = 1;

            if($model->save() && $seguimiento->save())
            {
                echo "bien";
            }else{
                echo "mal";
            }




        }
    }

}
