<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loc_segtotal".
 *
 * @property int $loc_id
 * @property string $desc_loc
 * @property string $total
 * @property string $num_personas
 * @property string $num_familias
 * @property string $meta_piso
 * @property string $acciones_piso
 * @property string $acciones_pendientes_piso
 * @property string $meta_techo
 * @property string $acciones_techo
 * @property string $acciones_pendientes_techo
 * @property string $meta_muro
 * @property string $acciones_muro
 * @property string $acciones_pendientes_muro
 * @property string $meta_cuarto
 * @property string $acciones_cuarto
 * @property string $acciones_pendientes_cuarto
 * @property string $meta_agua_potable
 * @property string $acciones_agua_potable
 * @property string $acciones_pendientes_agua_potable
 * @property string $meta_agua_interior
 * @property string $acciones_agua_interior
 * @property string $acciones_pendientes_agua_interior
 * @property string $meta_drenaje
 * @property string $acciones_drenaje
 * @property string $acciones_pendientes_drenaje
 * @property string $meta_luz
 * @property string $acciones_luz
 * @property string $acciones_pendientes_luz
 * @property string $meta_estufa
 * @property string $acciones_estufa
 * @property string $acciones_pendientes_estufa
 * @property string $meta_seguro_popular
 * @property string $acciones_seguro_popular
 * @property string $acciones_pendientes_seguro_popular
 * @property string $meta_3_15_escuela
 * @property string $acciones_3_15_escuela
 * @property string $acciones_pendientes_3_15_escuela
 * @property string $meta_antes_1982_primaria
 * @property string $acciones_antes_1982_primaria
 * @property string $acciones_pendientes_antes_1982_primaria
 * @property string $meta_despues_1982_secundaria
 * @property string $acciones_despues_1982_secundaria
 * @property string $acciones_pendientes_despues_1982_secundaria
 * @property string $meta_despensas
 * @property string $acciones_despensas
 * @property string $acciones_pendientes_despensas
 * @property string $meta_ss
 * @property string $acciones_ss
 * @property string $acciones_pendientes_ss
 * @property string $meta_trabajadores_ss
 * @property string $acciones_trabajadores_ss
 * @property string $acciones_pendientes_trabajadores_ss
 * @property string $meta_adultos_ss
 * @property string $acciones_adultos_ss
 * @property string $acciones_pendientes_adultos_ss
 * @property string $meta_vivienda
 * @property string $acciones_vivienda
 * @property string $acciones_pendientez_vivienda
 */
class LocSegtotal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loc_segtotal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_id', 'desc_loc'], 'required'],
            [['loc_id'], 'integer'],
            [['total', 'num_personas', 'num_familias', 'meta_piso', 'acciones_piso', 'acciones_pendientes_piso', 'meta_techo', 'acciones_techo', 'acciones_pendientes_techo', 'meta_muro', 'acciones_muro', 'acciones_pendientes_muro', 'meta_cuarto', 'acciones_cuarto', 'acciones_pendientes_cuarto', 'meta_agua_potable', 'acciones_agua_potable', 'acciones_pendientes_agua_potable', 'meta_agua_interior', 'acciones_agua_interior', 'acciones_pendientes_agua_interior', 'meta_drenaje', 'acciones_drenaje', 'acciones_pendientes_drenaje', 'meta_luz', 'acciones_luz', 'acciones_pendientes_luz', 'meta_estufa', 'acciones_estufa', 'acciones_pendientes_estufa', 'meta_seguro_popular', 'acciones_seguro_popular', 'acciones_pendientes_seguro_popular', 'meta_3_15_escuela', 'acciones_3_15_escuela', 'acciones_pendientes_3_15_escuela', 'meta_antes_1982_primaria', 'acciones_antes_1982_primaria', 'acciones_pendientes_antes_1982_primaria', 'meta_despues_1982_secundaria', 'acciones_despues_1982_secundaria', 'acciones_pendientes_despues_1982_secundaria', 'meta_despensas', 'acciones_despensas', 'acciones_pendientes_despensas', 'meta_ss', 'acciones_ss', 'acciones_pendientes_ss', 'meta_trabajadores_ss', 'acciones_trabajadores_ss', 'acciones_pendientes_trabajadores_ss', 'meta_adultos_ss', 'acciones_adultos_ss', 'acciones_pendientes_adultos_ss', 'meta_vivienda', 'acciones_vivienda', 'acciones_pendientez_vivienda'], 'number'],
            [['desc_loc'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loc_id' => 'Loc ID',
            'desc_loc' => 'Desc Loc',
            'total' => 'Total',
            'num_personas' => 'Num Personas',
            'num_familias' => 'Num Familias',
            'meta_piso' => 'Meta Piso',
            'acciones_piso' => 'Acciones Piso',
            'acciones_pendientes_piso' => 'Acciones Pendientes Piso',
            'meta_techo' => 'Meta Techo',
            'acciones_techo' => 'Acciones Techo',
            'acciones_pendientes_techo' => 'Acciones Pendientes Techo',
            'meta_muro' => 'Meta Muro',
            'acciones_muro' => 'Acciones Muro',
            'acciones_pendientes_muro' => 'Acciones Pendientes Muro',
            'meta_cuarto' => 'Meta Cuarto',
            'acciones_cuarto' => 'Acciones Cuarto',
            'acciones_pendientes_cuarto' => 'Acciones Pendientes Cuarto',
            'meta_agua_potable' => 'Meta Agua Potable',
            'acciones_agua_potable' => 'Acciones Agua Potable',
            'acciones_pendientes_agua_potable' => 'Acciones Pendientes Agua Potable',
            'meta_agua_interior' => 'Meta Agua Interior',
            'acciones_agua_interior' => 'Acciones Agua Interior',
            'acciones_pendientes_agua_interior' => 'Acciones Pendientes Agua Interior',
            'meta_drenaje' => 'Meta Drenaje',
            'acciones_drenaje' => 'Acciones Drenaje',
            'acciones_pendientes_drenaje' => 'Acciones Pendientes Drenaje',
            'meta_luz' => 'Meta Luz',
            'acciones_luz' => 'Acciones Luz',
            'acciones_pendientes_luz' => 'Acciones Pendientes Luz',
            'meta_estufa' => 'Meta Estufa',
            'acciones_estufa' => 'Acciones Estufa',
            'acciones_pendientes_estufa' => 'Acciones Pendientes Estufa',
            'meta_seguro_popular' => 'Meta Seguro Popular',
            'acciones_seguro_popular' => 'Acciones Seguro Popular',
            'acciones_pendientes_seguro_popular' => 'Acciones Pendientes Seguro Popular',
            'meta_3_15_escuela' => 'Meta 3 15 Escuela',
            'acciones_3_15_escuela' => 'Acciones 3 15 Escuela',
            'acciones_pendientes_3_15_escuela' => 'Acciones Pendientes 3 15 Escuela',
            'meta_antes_1982_primaria' => 'Meta Antes 1982 Primaria',
            'acciones_antes_1982_primaria' => 'Acciones Antes 1982 Primaria',
            'acciones_pendientes_antes_1982_primaria' => 'Acciones Pendientes Antes 1982 Primaria',
            'meta_despues_1982_secundaria' => 'Meta Despues 1982 Secundaria',
            'acciones_despues_1982_secundaria' => 'Acciones Despues 1982 Secundaria',
            'acciones_pendientes_despues_1982_secundaria' => 'Acciones Pendientes Despues 1982 Secundaria',
            'meta_despensas' => 'Meta Despensas',
            'acciones_despensas' => 'Acciones Despensas',
            'acciones_pendientes_despensas' => 'Acciones Pendientes Despensas',
            'meta_ss' => 'Meta Ss',
            'acciones_ss' => 'Acciones Ss',
            'acciones_pendientes_ss' => 'Acciones Pendientes Ss',
            'meta_trabajadores_ss' => 'Meta Trabajadores Ss',
            'acciones_trabajadores_ss' => 'Acciones Trabajadores Ss',
            'acciones_pendientes_trabajadores_ss' => 'Acciones Pendientes Trabajadores Ss',
            'meta_adultos_ss' => 'Meta Adultos Ss',
            'acciones_adultos_ss' => 'Acciones Adultos Ss',
            'acciones_pendientes_adultos_ss' => 'Acciones Pendientes Adultos Ss',
            'meta_vivienda' => 'Meta Vivienda',
            'acciones_vivienda' => 'Acciones Vivienda',
            'acciones_pendientez_vivienda' => 'Acciones Pendientez Vivienda',
        ];
    }
}
