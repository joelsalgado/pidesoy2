<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reg_desg".
 *
 * @property string $desc_region
 * @property int $id
 * @property string $sin_piso
 * @property string $sin_techo
 * @property string $sin_muro
 * @property string $hacentamiento
 * @property string $agua_interior
 * @property string $servicio_agua
 * @property string $falta_drenaje
 * @property string $falta_conectar
 * @property string $falta_luz
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
 * @property string $ss_trabajo_formal
 * @property string $ss_trabajo_sin
 * @property string $ss_adultos_may_sin
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
            [['sin_piso', 'sin_techo', 'sin_muro', 'hacentamiento', 'agua_interior', 'servicio_agua', 'falta_drenaje', 'falta_conectar', 'falta_luz', 'falta_chimenea', 'falta_excusado', 'falta_refrigerador', 'falta_lavadora', 'educ_trunca_3_15', 'educ_no_asiste_3_15', 'educ_no_prim_35', 'educ_sec_inc_16_35', 'educ_analfabeta_may_15', 'educ_prim_inc_may_15', 'educ_no_asiste_6_14', 'salud_recibe', 'ss_trabajo_formal', 'ss_trabajo_sin', 'ss_adultos_may_sin', 'menor_poca_variedad', 'menor_falta_alimentos', 'menor_menor_porcion', 'menor_hambre', 'menor_acosto_hambre', 'menor_sin_comer_dia', 'adulto_poca_variedad', 'adulto_falta_alimentos', 'adulto_menor_porcion', 'quedaron_sin_comida', 'adulto_hambre', 'adulto_sin_comer_dia', 'vinc_prog_liconsa', 'vinc_prog_diconsa', 'vinc_prog_abastece_diconsa', 'vinc_prog_comedor', 'vinc_prog_asiste_comedor', 'vinc_prog_acceso', 'vinc_prog_prospera'], 'number'],
            [['desc_region'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desc_region' => 'Desc Region',
            'id' => 'ID',
            'sin_piso' => 'Sin Piso',
            'sin_techo' => 'Sin Techo',
            'sin_muro' => 'Sin Muro',
            'hacentamiento' => 'Hacentamiento',
            'agua_interior' => 'Agua Interior',
            'servicio_agua' => 'Servicio Agua',
            'falta_drenaje' => 'Falta Drenaje',
            'falta_conectar' => 'Falta Conectar',
            'falta_luz' => 'Falta Luz',
            'falta_chimenea' => 'Falta Chimenea',
            'falta_excusado' => 'Falta Excusado',
            'falta_refrigerador' => 'Falta Refrigerador',
            'falta_lavadora' => 'Falta Lavadora',
            'educ_trunca_3_15' => 'Educ Trunca 3 15',
            'educ_no_asiste_3_15' => 'Educ No Asiste 3 15',
            'educ_no_prim_35' => 'Educ No Prim 35',
            'educ_sec_inc_16_35' => 'Educ Sec Inc 16 35',
            'educ_analfabeta_may_15' => 'Educ Analfabeta May 15',
            'educ_prim_inc_may_15' => 'Educ Prim Inc May 15',
            'educ_no_asiste_6_14' => 'Educ No Asiste 6 14',
            'salud_recibe' => 'Salud Recibe',
            'ss_trabajo_formal' => 'Ss Trabajo Formal',
            'ss_trabajo_sin' => 'Ss Trabajo Sin',
            'ss_adultos_may_sin' => 'Ss Adultos May Sin',
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
            'vinc_prog_liconsa' => 'Vinc Prog Liconsa',
            'vinc_prog_diconsa' => 'Vinc Prog Diconsa',
            'vinc_prog_abastece_diconsa' => 'Vinc Prog Abastece Diconsa',
            'vinc_prog_comedor' => 'Vinc Prog Comedor',
            'vinc_prog_asiste_comedor' => 'Vinc Prog Asiste Comedor',
            'vinc_prog_acceso' => 'Vinc Prog Acceso',
            'vinc_prog_prospera' => 'Vinc Prog Prospera',
        ];
    }
}