<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reg_desg".
 *
 * @property string $desc_region
 * @property int $id
 * @property string $num_personas
 * @property string $per_0_15
 * @property string $per_16_17
 * @property string $per_18_64
 * @property string $per_65_mas
 * @property string $vivienda_propia
 * @property string $vivienda_compartida
 * @property string $vivienda_prestada
 * @property string $vivienda_rentada
 * @property string $num_familias
 * @property string $sin_piso
 * @property string $sin_techo
 * @property string $sin_muro
 * @property string $hacentamiento
 * @property string $agua_interior
 * @property string $servicio_agua
 * @property string $falta_drenaje
 * @property string $falta_conectar
 * @property string $falta_luz
 * @property string $cocina_gas
 * @property string $cocina_luz
 * @property string $cocina_lena
 * @property string $cocina_carbon
 * @property string $cocina_otro
 * @property string $falta_chimenea
 * @property string $falta_excusado
 * @property string $falta_refrigerador
 * @property string $falta_lavadora
 * @property string $educ_trunca_3_15
 * @property string $educ_no_asiste_3_15
 * @property string $educ_no_prim_35
 * @property string $educ_sec_inc_16_35
 * @property string $educ_analfabeta_may_15
 * @property string $educ_prim_inc_may_15
 * @property string $educ_no_asiste_6_14
 * @property string $salud_recibe
 * @property string $seguro_popular
 * @property string $issemyn
 * @property string $imss
 * @property string $marina_sedena
 * @property string $isste
 * @property string $pemex
 * @property string $otro_serv_med
 * @property string $ss_trabajo_formal
 * @property string $ss_trabajo_sin
 * @property string $ss_adultos_may_sin
 * @property string $cuantos_ingresos
 * @property string $jefe_familia
 * @property string $jefa_familia
 * @property string $hijo
 * @property string $autoingreso
 * @property string $apoyo_gobierno
 * @property string $apoyo_extranjero
 * @property string $pension
 * @property string $madre_soltera_labora
 * @property string $menor_poca_variedad
 * @property string $menor_falta_alimentos
 * @property string $menor_menor_porcion
 * @property string $menor_hambre
 * @property string $menor_acosto_hambre
 * @property string $menor_sin_comer_dia
 * @property string $adulto_poca_variedad
 * @property string $adulto_falta_alimentos
 * @property string $adulto_menor_porcion
 * @property string $quedaron_sin_comida
 * @property string $adulto_hambre
 * @property string $adulto_sin_comer_dia
 * @property string $vinc_prog_liconsa
 * @property string $vinc_prog_diconsa
 * @property string $vinc_prog_abastece_diconsa
 * @property string $vinc_prog_comedor
 * @property string $vinc_prog_asiste_comedor
 * @property string $vinc_prog_acceso
 * @property string $vinc_prog_prospera
 */
class RegDesg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reg_desg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_region'], 'required'],
            [['id'], 'integer'],
            [['num_personas', 'per_0_15', 'per_16_17', 'per_18_64', 'per_65_mas', 'vivienda_propia', 'vivienda_compartida', 'vivienda_prestada', 'vivienda_rentada', 'num_familias', 'sin_piso', 'sin_techo', 'sin_muro', 'hacentamiento', 'agua_interior', 'servicio_agua', 'falta_drenaje', 'falta_conectar', 'falta_luz', 'cocina_gas', 'cocina_luz', 'cocina_lena', 'cocina_carbon', 'cocina_otro', 'falta_chimenea', 'falta_excusado', 'falta_refrigerador', 'falta_lavadora', 'educ_trunca_3_15', 'educ_no_asiste_3_15', 'educ_no_prim_35', 'educ_sec_inc_16_35', 'educ_analfabeta_may_15', 'educ_prim_inc_may_15', 'educ_no_asiste_6_14', 'salud_recibe', 'seguro_popular', 'issemyn', 'imss', 'marina_sedena', 'isste', 'pemex', 'otro_serv_med', 'ss_trabajo_formal', 'ss_trabajo_sin', 'ss_adultos_may_sin', 'cuantos_ingresos', 'jefe_familia', 'jefa_familia', 'hijo', 'autoingreso', 'apoyo_gobierno', 'apoyo_extranjero', 'pension', 'madre_soltera_labora', 'menor_poca_variedad', 'menor_falta_alimentos', 'menor_menor_porcion', 'menor_hambre', 'menor_acosto_hambre', 'menor_sin_comer_dia', 'adulto_poca_variedad', 'adulto_falta_alimentos', 'adulto_menor_porcion', 'quedaron_sin_comida', 'adulto_hambre', 'adulto_sin_comer_dia', 'vinc_prog_liconsa', 'vinc_prog_diconsa', 'vinc_prog_abastece_diconsa', 'vinc_prog_comedor', 'vinc_prog_asiste_comedor', 'vinc_prog_acceso', 'vinc_prog_prospera'], 'number'],
            [['desc_region'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desc_region' => 'Region',
            'id' => 'ID',
            'num_personas' => 'Habitantes',
            'per_0_15' => 'Personas de 0 a 15',
            'per_16_17' => 'Personas de 16 a 17',
            'per_18_64' => 'Personas de 18 a 64',
            'per_65_mas' => 'Personas de 65 o más 	',
            'vivienda_propia' => 'Vivienda Propia',
            'vivienda_compartida' => 'Vivienda Compartida',
            'vivienda_prestada' => 'Vivienda Prestada',
            'vivienda_rentada' => 'Vivienda Rentada',
            'num_familias' => 'Número de Familias',
            'sin_piso' => 'Sin Piso Firme',
            'sin_techo' => 'Sin Techo Firme',
            'sin_muro' => 'Sin Muros Firmes',
            'hacentamiento' => 'Hacentamiento',
            'agua_interior' => 'Falta llevar toma de agua al interior',
            'servicio_agua' => 'Falta Servicio de Agua Potable',
            'falta_drenaje' => 'Falta Drenaje',
            'falta_conectar' => 'Falta conectar drenaje a red pública',
            'falta_luz' => 'Falta Electricidad',
            'cocina_gas' => 'CCocina con gas',
            'cocina_luz' => 'Cocina con electricidad',
            'cocina_lena' => 'Cocina con Lena',
            'cocina_carbon' => 'Cocina con Carbon',
            'cocina_otro' => 'Cocina con Otro',
            'falta_chimenea' => 'Falta Chimenea',
            'falta_excusado' => 'Falta Excusado',
            'falta_refrigerador' => 'Falta Refrigerador',
            'falta_lavadora' => 'Falta Lavadora',
            'educ_trunca_3_15' => 'Menor con estudios truncados',
            'educ_no_asiste_3_15' => 'Menor que no asiste a estudiar',
            'educ_no_prim_35' => 'Mayor a 35 sin educación básica',
            'educ_sec_inc_16_35' => 'Habitante entre 16 y 35 sin educación básica',
            'educ_analfabeta_may_15' => 'Mayor a 15 con analfabetismo',
            'educ_prim_inc_may_15' => 'Mayor a 15 con primaria incompleta',
            'educ_no_asiste_6_14' => 'Habitante entre 6 y 14 que no asiste a estudiar',
            'salud_recibe' => 'Sin Servicio de Salud',
            'seguro_popular' => 'Tiene Seguro Popular',
            'issemyn' => 'Tiene ISSEMYN',
            'imss' => 'Tiene IMSS',
            'marina_sedena' => 'Tiene Marina Sedena',
            'isste' => 'Tiene ISSTE',
            'pemex' => 'Tiene PEMEX',
            'otro_serv_med' => 'Tiene Otro Servicio',
            'ss_trabajo_formal' => 'No hay Trabajo Formal',
            'ss_trabajo_sin' => 'Hay trabajo sin seguridad social',
            'ss_adultos_may_sin' => 'Adultos Mayores sin Seguridad Social',
            'cuantos_ingresos' => 'Integrantes que reciben ingresos por su trabajo',
            'jefe_familia' => 'Jefe de familia recibe ingresos por su trabajo',
            'jefa_familia' => 'Jefa de familia recibe ingresos por su trabajo',
            'hijo' => 'Hijos recibe ingresos por su trabajo',
            'autoingreso' => 'Tiene AutoIngreso',
            'apoyo_gobierno' => 'Tiene Apoyo gobierno',
            'apoyo_extranjero' => 'Tiene Apoyo extranjero',
            'pension' => 'Tiene pension',
            'madre_soltera_labora' => 'Son Madres solteras trabajadoras',
            'menor_poca_variedad' => 'Menor con Poca Variedad de Alimentos<',
            'menor_falta_alimentos' => 'Menor dejo de comer por falta de Alimentos',
            'menor_menor_porcion' => 'Menor se disminuyo los alimentos',
            'menor_hambre' => 'Menor sintio hambre y no comio',
            'menor_acosto_hambre' => 'Menor se acosto con hambre',
            'menor_sin_comer_dia' => 'Menor sin comer todo el día',
            'adulto_poca_variedad' => 'Adulto con Poca Variedad de Alimentos',
            'adulto_falta_alimentos' => 'Adulto dejo de comer por falta de Alimentos',
            'adulto_menor_porcion' => 'Adulto se disminuyo los alimentos',
            'quedaron_sin_comida' => 'Se quedaron sin alimentos',
            'adulto_hambre' => 'Adulto sintio hambre y no comio',
            'adulto_sin_comer_dia' => 'Adulto sin comer todo el día',
            'vinc_prog_liconsa' => 'No cuentan con LICONSA',
            'vinc_prog_diconsa' => 'No cuentan con DICONSA',
            'vinc_prog_abastece_diconsa' => 'No abastece en tiendas DICONSA',
            'vinc_prog_comedor' => 'No Existe Comedor Comunitario',
            'vinc_prog_asiste_comedor' => 'Asiste al Comedor Comunitario',
            'vinc_prog_acceso' => 'No cuenta con programas sociales',
            'vinc_prog_prospera' => 'No es beneficiario PROSPERA',
        ];
    }
}
