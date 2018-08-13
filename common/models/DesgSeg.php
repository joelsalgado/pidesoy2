<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "desg_seg".
 *
 * @property int $id
 * @property int $loc_id
 * @property int $num_personas
 * @property string $otra_referencia
 * @property int $meta_piso
 * @property int $acciones_piso
 * @property int $acciones_pendientes_piso
 * @property double $inversion_piso
 * @property string $fecha_inicio_piso
 * @property string $fecha_entrega_piso
 * @property string $fecha_termino_piso
 * @property string $programa_piso
 * @property string $responsable_piso
 * @property int $meta_techo
 * @property int $acciones_techo
 * @property int $acciones_pendientes_techo
 * @property double $inversion_techo
 * @property string $fecha_inicio_techo
 * @property string $fecha_entrega_techo
 * @property string $fecha_termino_techo
 * @property string $programa_techo
 * @property string $responsable_techo
 * @property int $meta_muro
 * @property int $acciones_muro
 * @property int $acciones_pendientes_muro
 * @property double $inversion_muro
 * @property string $fecha_inicio_muro
 * @property string $fecha_entrega_muro
 * @property string $fecha_termino_muro
 * @property string $programa_muro
 * @property string $responsable_muro
 * @property int $meta_cuarto
 * @property int $acciones_cuarto
 * @property int $acciones_pendientes_cuarto
 * @property double $inversion_cuarto
 * @property string $fecha_inicio_cuarto
 * @property string $fecha_entrega_cuarto
 * @property string $fecha_termino_cuarto
 * @property string $programa_cuarto
 * @property string $responsable_cuarto
 * @property int $meta_calidad_espacios_vivienda
 * @property int $acciones_calidad_espacios_vivienda
 * @property int $acciones_pendientez_calidad_espacios_vivienda
 * @property int $meta_agua_potable
 * @property int $acciones_agua_potable
 * @property int $acciones_pendientes_agua_potable
 * @property double $inversion_agua_potable
 * @property string $fecha_inicio_agua_potable
 * @property string $fecha_entrega_agua_potable
 * @property string $fecha_termino_agua_potable
 * @property string $programa_agua_potable
 * @property string $responsable_agua_potable
 * @property int $meta_agua_interior
 * @property int $acciones_agua_interior
 * @property int $acciones_pendientes_agua_interior
 * @property double $inversion_agua_interior
 * @property string $fecha_inicio_agua_interior
 * @property string $fecha_entrega_agua_interior
 * @property string $fecha_termino_agua_interior
 * @property string $programa_agua_interior
 * @property string $responsable_agua_interior
 * @property int $meta_drenaje
 * @property int $acciones_drenaje
 * @property int $acciones_pendientes_drenaje
 * @property double $inversion_drenaje
 * @property string $fecha_inicio_drenaje
 * @property string $fecha_entrega_drenaje
 * @property string $fecha_termino_drenaje
 * @property string $programa_drenaje
 * @property string $responsable_drenaje
 * @property int $meta_luz
 * @property int $acciones_luz
 * @property int $acciones_pendientes_luz
 * @property double $inversion_luz
 * @property string $fecha_inicio_luz
 * @property string $fecha_entrega_luz
 * @property string $fecha_termino_luz
 * @property string $programa_luz
 * @property string $responsable_luz
 * @property int $meta_estufa
 * @property int $acciones_estufa
 * @property int $acciones_pendientes_estufa
 * @property double $inversion_estufa
 * @property string $fecha_inicio_estufa
 * @property string $fecha_entrega_estufa
 * @property string $fecha_termino_estufa
 * @property string $programa_estufa
 * @property string $responsable_estufa
 * @property int $meta_servicios_basicos
 * @property int $acciones_servicios_basicos
 * @property int $acciones_pendientez_servicios_basicos
 * @property int $meta_seguro_popular
 * @property int $acciones_seguro_popular
 * @property int $acciones_pendientes_seguro_popular
 * @property double $inversion_seguro_popular
 * @property string $fecha_inicio_seguro_popular
 * @property string $fecha_entrega_seguro_popular
 * @property string $fecha_termino_seguro_popular
 * @property string $programa_seguro_popular
 * @property string $responsable_seguro_popular
 * @property int $meta_3_15_escuela
 * @property int $acciones_3_15_escuela
 * @property int $acciones_pendientes_3_15_escuela
 * @property double $inversion_3_15_escuela
 * @property string $fecha_inicio_3_15_escuela
 * @property string $fecha_entrega_3_15_escuela
 * @property string $fecha_termino_3_15_escuela
 * @property string $programa_3_15_escuela
 * @property string $responsable_3_15_escuela
 * @property int $meta_antes_1982_primaria
 * @property int $acciones_antes_1982_primaria
 * @property int $acciones_pendientes_antes_1982_primaria
 * @property double $inversion_antes_1982_primaria
 * @property string $fecha_inicio_antes_1982_primaria
 * @property string $fecha_entrega_antes_1982_primaria
 * @property string $fecha_termino_antes_1982_primaria
 * @property string $programa_antes_1982_primaria
 * @property string $responsable_antes_1982_primaria
 * @property int $meta_despues_1982_secundaria
 * @property int $acciones_despues_1982_secundaria
 * @property int $acciones_pendientes_despues_1982_secundaria
 * @property double $inversion_despues_1982_secundaria
 * @property string $fecha_inicio_despues_1982_secundaria
 * @property string $fecha_entrega_despues_1982_secundaria
 * @property string $fecha_termino_despues_1982_secundaria
 * @property string $programa_despues_1982_secundaria
 * @property string $responsable_despues_1982_secundaria
 * @property int $meta_educacion
 * @property int $acciones_educacion
 * @property int $acciones_pendientez_educacion
 * @property int $meta_despensas
 * @property int $acciones_despensas
 * @property int $acciones_pendientes_despensas
 * @property double $inversion_despensas
 * @property string $fecha_inicio_despensas
 * @property string $fecha_entrega_despensas
 * @property string $fecha_termino_despensas
 * @property string $programa_despensas
 * @property string $responsable_despensas
 * @property int $meta_ss
 * @property int $acciones_ss
 * @property int $acciones_pendientes_ss
 * @property double $inversion_ss
 * @property string $fecha_inicio_ss
 * @property string $fecha_entrega_ss
 * @property string $fecha_termino_ss
 * @property string $programa_ss
 * @property string $responsable_ss
 * @property int $meta_trabajadores_ss
 * @property int $acciones_trabajadores_ss
 * @property int $acciones_pendientes_trabajadores_ss
 * @property double $inversion_trabajadores_ss
 * @property string $fecha_inicio_trabajadores_ss
 * @property string $fecha_entrega_trabajadores_ss
 * @property string $fecha_termino_trabajadores_ss
 * @property string $programa_trabajadores_ss
 * @property string $responsable_trabajadores_ss
 * @property int $meta_adultos_ss
 * @property int $acciones_adultos_ss
 * @property int $acciones_pendientes_adultos_ss
 * @property double $inversion_adultos_ss
 * @property string $fecha_inicio_adultos_ss
 * @property string $fecha_entrega_adultos_ss
 * @property string $fecha_termino_adultos_ss
 * @property string $programa_adultos_ss
 * @property string $responsable_adultos_ss
 * @property int $meta_s_s
 * @property int $acciones_s_s
 * @property int $acciones_pendientez_s_s
 * @property int $meta_vivienda
 * @property int $acciones_vivienda
 * @property int $acciones_pendientez_vivienda
 * @property double $inversion_vivienda
 */
class DesgSeg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desg_seg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'loc_id', 'num_personas', 'meta_piso', 'acciones_piso', 'acciones_pendientes_piso', 'meta_techo', 'acciones_techo', 'acciones_pendientes_techo', 'meta_muro', 'acciones_muro', 'acciones_pendientes_muro', 'meta_cuarto', 'acciones_cuarto', 'acciones_pendientes_cuarto', 'meta_calidad_espacios_vivienda', 'acciones_calidad_espacios_vivienda', 'acciones_pendientez_calidad_espacios_vivienda', 'meta_agua_potable', 'acciones_agua_potable', 'acciones_pendientes_agua_potable', 'meta_agua_interior', 'acciones_agua_interior', 'acciones_pendientes_agua_interior', 'meta_drenaje', 'acciones_drenaje', 'acciones_pendientes_drenaje', 'meta_luz', 'acciones_luz', 'acciones_pendientes_luz', 'meta_estufa', 'acciones_estufa', 'acciones_pendientes_estufa', 'meta_servicios_basicos', 'acciones_servicios_basicos', 'acciones_pendientez_servicios_basicos', 'meta_seguro_popular', 'acciones_seguro_popular', 'acciones_pendientes_seguro_popular', 'meta_3_15_escuela', 'acciones_3_15_escuela', 'acciones_pendientes_3_15_escuela', 'meta_antes_1982_primaria', 'acciones_antes_1982_primaria', 'acciones_pendientes_antes_1982_primaria', 'meta_despues_1982_secundaria', 'acciones_despues_1982_secundaria', 'acciones_pendientes_despues_1982_secundaria', 'meta_educacion', 'acciones_educacion', 'acciones_pendientez_educacion', 'meta_despensas', 'acciones_despensas', 'acciones_pendientes_despensas', 'meta_ss', 'acciones_ss', 'acciones_pendientes_ss', 'meta_trabajadores_ss', 'acciones_trabajadores_ss', 'acciones_pendientes_trabajadores_ss', 'meta_adultos_ss', 'acciones_adultos_ss', 'acciones_pendientes_adultos_ss', 'meta_s_s', 'acciones_s_s', 'acciones_pendientez_s_s', 'meta_vivienda', 'acciones_vivienda', 'acciones_pendientez_vivienda'], 'integer'],
            [['loc_id', 'otra_referencia'], 'required'],
            [['inversion_piso', 'inversion_techo', 'inversion_muro', 'inversion_cuarto', 'inversion_agua_potable', 'inversion_agua_interior', 'inversion_drenaje', 'inversion_luz', 'inversion_estufa', 'inversion_seguro_popular', 'inversion_3_15_escuela', 'inversion_antes_1982_primaria', 'inversion_despues_1982_secundaria', 'inversion_despensas', 'inversion_ss', 'inversion_trabajadores_ss', 'inversion_adultos_ss', 'inversion_vivienda'], 'number'],
            [['fecha_inicio_piso', 'fecha_entrega_piso', 'fecha_termino_piso', 'fecha_inicio_techo', 'fecha_entrega_techo', 'fecha_termino_techo', 'fecha_inicio_muro', 'fecha_entrega_muro', 'fecha_termino_muro', 'fecha_inicio_cuarto', 'fecha_entrega_cuarto', 'fecha_termino_cuarto', 'fecha_inicio_agua_potable', 'fecha_entrega_agua_potable', 'fecha_termino_agua_potable', 'fecha_inicio_agua_interior', 'fecha_entrega_agua_interior', 'fecha_termino_agua_interior', 'fecha_inicio_drenaje', 'fecha_entrega_drenaje', 'fecha_termino_drenaje', 'fecha_inicio_luz', 'fecha_entrega_luz', 'fecha_termino_luz', 'fecha_inicio_estufa', 'fecha_entrega_estufa', 'fecha_termino_estufa', 'fecha_inicio_seguro_popular', 'fecha_entrega_seguro_popular', 'fecha_termino_seguro_popular', 'fecha_inicio_3_15_escuela', 'fecha_entrega_3_15_escuela', 'fecha_termino_3_15_escuela', 'fecha_inicio_antes_1982_primaria', 'fecha_entrega_antes_1982_primaria', 'fecha_termino_antes_1982_primaria', 'fecha_inicio_despues_1982_secundaria', 'fecha_entrega_despues_1982_secundaria', 'fecha_termino_despues_1982_secundaria', 'fecha_inicio_despensas', 'fecha_entrega_despensas', 'fecha_termino_despensas', 'fecha_inicio_ss', 'fecha_entrega_ss', 'fecha_termino_ss', 'fecha_inicio_trabajadores_ss', 'fecha_entrega_trabajadores_ss', 'fecha_termino_trabajadores_ss', 'fecha_inicio_adultos_ss', 'fecha_entrega_adultos_ss', 'fecha_termino_adultos_ss'], 'safe'],
            [['otra_referencia'], 'string', 'max' => 100],
            [['programa_piso', 'programa_techo', 'programa_muro', 'programa_cuarto', 'programa_agua_potable', 'programa_agua_interior', 'programa_drenaje', 'programa_luz', 'programa_estufa', 'programa_seguro_popular', 'programa_3_15_escuela', 'programa_antes_1982_primaria', 'programa_despues_1982_secundaria', 'programa_despensas', 'programa_ss', 'programa_trabajadores_ss', 'programa_adultos_ss'], 'string', 'max' => 80],
            [['responsable_piso', 'responsable_techo', 'responsable_muro', 'responsable_cuarto', 'responsable_agua_potable', 'responsable_agua_interior', 'responsable_drenaje', 'responsable_luz', 'responsable_estufa', 'responsable_seguro_popular', 'responsable_3_15_escuela', 'responsable_antes_1982_primaria', 'responsable_despues_1982_secundaria', 'responsable_despensas', 'responsable_ss', 'responsable_trabajadores_ss', 'responsable_adultos_ss'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Vivienda',
            'loc_id' => 'Loc ID',
            'num_personas' => 'Habitantes',
            'otra_referencia' => 'Referencia',

            'meta_piso' => 'Acciones A Realizar (Meta)',
            'acciones_piso' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_piso' => 'Acciones Pendientes Por Realizar',
            'inversion_piso' => 'Inversión (Costo)',
            'fecha_inicio_piso' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_piso' => 'Fecha De Entrega Programada',
            'fecha_termino_piso' => 'Fecha De Término Real De La Acción',
            'programa_piso' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_piso' => 'Responsable Designado Del Programa De Atención',

            'meta_techo' => 'Acciones A Realizar (Meta)',
            'acciones_techo' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_techo' => 'Acciones Pendientes Por Realizar',
            'inversion_techo' => 'Inversión (Costo)',
            'fecha_inicio_techo' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_techo' => 'Fecha De Entrega Programada',
            'fecha_termino_techo' => 'Fecha De Término Real De La Acción',
            'programa_techo' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_techo' => 'Responsable Designado Del Programa De Atención',

            'meta_muro' => 'Acciones A Realizar (Meta)',
            'acciones_muro' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_muro' => 'Acciones Pendientes Por Realizar',
            'inversion_muro' => 'Inversión (Costo)',
            'fecha_inicio_muro' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_muro' => 'Fecha De Entrega Programada',
            'fecha_termino_muro' => 'Fecha De Término Real De La Acción',
            'programa_muro' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_muro' => 'Responsable Designado Del Programa De Atención',

            'meta_cuarto' => 'Acciones A Realizar (Meta)',
            'acciones_cuarto' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_cuarto' => 'Acciones Pendientes Por Realizar',
            'inversion_cuarto' => 'Inversión (Costo)',
            'fecha_inicio_cuarto' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_cuarto' => 'Fecha De Entrega Programada',
            'fecha_termino_cuarto' => 'Fecha De Término Real De La Acción',
            'programa_cuarto' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_cuarto' => 'Responsable Designado Del Programa De Atención',

            'meta_calidad_espacios_vivienda' => 'Meta Subtotal',
            'acciones_calidad_espacios_vivienda' => 'Avance Subtotal',
            'acciones_pendientez_calidad_espacios_vivienda' => 'Pendiente Subtotal',

            'meta_agua_potable' => 'Acciones A Realizar (Meta)',
            'acciones_agua_potable' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_agua_potable' => 'Acciones Pendientes Por Realizar',
            'inversion_agua_potable' => 'Inversión (Costo)',
            'fecha_inicio_agua_potable' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_agua_potable' => 'Fecha De Entrega Programada',
            'fecha_termino_agua_potable' => 'Fecha De Término Real De La Acción',
            'programa_agua_potable' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_agua_potable' => 'Responsable Designado Del Programa De Atención',

            'meta_agua_interior' => 'Acciones A Realizar (Meta)',
            'acciones_agua_interior' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_agua_interior' => 'Acciones Pendientes Por Realizar',
            'inversion_agua_interior' => 'Inversión (Costo)',
            'fecha_inicio_agua_interior' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_agua_interior' => 'Fecha De Entrega Programada',
            'fecha_termino_agua_interior' => 'Fecha De Término Real De La Acción',
            'programa_agua_interior' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_agua_interior' => 'Responsable Designado Del Programa De Atención',

            'meta_drenaje' => 'Acciones A Realizar (Meta)',
            'acciones_drenaje' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_drenaje' => 'Acciones Pendientes Por Realizar',
            'inversion_drenaje' => 'Inversión (Costo)',
            'fecha_inicio_drenaje' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_drenaje' => 'Fecha De Entrega Programada',
            'fecha_termino_drenaje' => 'Fecha De Término Real De La Acción',
            'programa_drenaje' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_drenaje' => 'Responsable Designado Del Programa De Atención',

            'meta_luz' => 'Acciones A Realizar (Meta)',
            'acciones_luz' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_luz' => 'Acciones Pendientes Por Realizar',
            'inversion_luz' => 'Inversión (Costo)',
            'fecha_inicio_luz' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_luz' => 'Fecha De Entrega Programada',
            'fecha_termino_luz' => 'Fecha De Término Real De La Acción',
            'programa_luz' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_luz' => 'Responsable Designado Del Programa De Atención',

            'meta_estufa' => 'Acciones A Realizar (Meta)',
            'acciones_estufa' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_estufa' => 'Acciones Pendientes Por Realizar',
            'inversion_estufa' => 'Inversión (Costo)',
            'fecha_inicio_estufa' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_estufa' => 'Fecha De Entrega Programada',
            'fecha_termino_estufa' => 'Fecha De Término Real De La Acción',
            'programa_estufa' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_estufa' => 'Responsable Designado Del Programa De Atención',

            'meta_servicios_basicos' => 'Subtotal Meta',
            'acciones_servicios_basicos' => 'Subtotal De Acciones',
            'acciones_pendientez_servicios_basicos' => 'Subtotal Pendiente',

            'meta_seguro_popular' => 'Acciones A Realizar (Meta)',
            'acciones_seguro_popular' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_seguro_popular' => 'Acciones Pendientes Por Realizar',
            'inversion_seguro_popular' => 'Inversión (Costo)',
            'fecha_inicio_seguro_popular' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_seguro_popular' => 'Fecha De Entrega Programada',
            'fecha_termino_seguro_popular' => 'Fecha De Término Real De La Acción',
            'programa_seguro_popular' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_seguro_popular' => 'Responsable Designado Del Programa De Atención',

            'meta_3_15_escuela' => 'Acciones A Realizar (Meta)',
            'acciones_3_15_escuela' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_3_15_escuela' => 'Acciones Pendientes Por Realizar',
            'inversion_3_15_escuela' => 'Inversión (Costo)',
            'fecha_inicio_3_15_escuela' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_3_15_escuela' => 'Fecha De Entrega Programada',
            'fecha_termino_3_15_escuela' => 'Fecha De Término Real De La Acción',
            'programa_3_15_escuela' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_3_15_escuela' => 'Responsable Designado Del Programa De Atención',

            'meta_antes_1982_primaria' => 'Acciones A Realizar (Meta)',
            'acciones_antes_1982_primaria' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_antes_1982_primaria' => 'Acciones Pendientes Por Realizar',
            'inversion_antes_1982_primaria' => 'Inversión (Costo)',
            'fecha_inicio_antes_1982_primaria' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_antes_1982_primaria' => 'Fecha De Entrega Programada',
            'fecha_termino_antes_1982_primaria' => 'Fecha De Término Real De La Acción',
            'programa_antes_1982_primaria' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_antes_1982_primaria' => 'Responsable Designado Del Programa De Atención',

            'meta_despues_1982_secundaria' => 'Acciones A Realizar (Meta)',
            'acciones_despues_1982_secundaria' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_despues_1982_secundaria' => 'Acciones Pendientes Por Realizar',
            'inversion_despues_1982_secundaria' => 'Inversión (Costo)',
            'fecha_inicio_despues_1982_secundaria' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_despues_1982_secundaria' => 'Fecha De Entrega Programada',
            'fecha_termino_despues_1982_secundaria' => 'Fecha De Término Real De La Acción',
            'programa_despues_1982_secundaria' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_despues_1982_secundaria' => 'Responsable Designado Del Programa De Atención',

            'meta_educacion' => 'Subtotal Meta',
            'acciones_educacion' => 'Subtotal De Acciones',
            'acciones_pendientez_educacion' => 'Subtotal Pendiente',

            'meta_despensas' => 'Acciones A Realizar (Meta)',
            'acciones_despensas' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_despensas' => 'Acciones Pendientes Por Realizar',
            'inversion_despensas' => 'Inversión (Costo)',
            'fecha_inicio_despensas' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_despensas' => 'Fecha De Entrega Programada',
            'fecha_termino_despensas' => 'Fecha De Término Real De La Acción',
            'programa_despensas' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_despensas' => 'Responsable Designado Del Programa De Atención',

            'meta_ss' => 'Acciones A Realizar (Meta)',
            'acciones_ss' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_ss' => 'Acciones Pendientes Por Realizar',
            'inversion_ss' => 'Inversión (Costo)',
            'fecha_inicio_ss' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_ss' => 'Fecha De Entrega Programada',
            'fecha_termino_ss' => 'Fecha De Término Real De La Acción',
            'programa_ss' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_ss' => 'Responsable Designado Del Programa De Atención',

            'meta_trabajadores_ss' => 'Acciones A Realizar (Meta)',
            'acciones_trabajadores_ss' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_trabajadores_ss' => 'Acciones Pendientes Por Realizar',
            'inversion_trabajadores_ss' => 'Inversión (Costo)',
            'fecha_inicio_trabajadores_ss' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_trabajadores_ss' => 'Fecha De Entrega Programada',
            'fecha_termino_trabajadores_ss' => 'Fecha De Término Real De La Acción',
            'programa_trabajadores_ss' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_trabajadores_ss' => 'Responsable Designado Del Programa De Atención',

            'meta_adultos_ss' => 'Acciones A Realizar (Meta)',
            'acciones_adultos_ss' => 'Acciones Realizadas (Avance)',
            'acciones_pendientes_adultos_ss' => 'Acciones Pendientes Por Realizar',
            'inversion_adultos_ss' => 'Inversión (Costo)',
            'fecha_inicio_adultos_ss' => 'Fecha De Inicio De La Acción',
            'fecha_entrega_adultos_ss' => 'Fecha De Entrega Programada',
            'fecha_termino_adultos_ss' => 'Fecha De Término Real De La Acción',
            'programa_adultos_ss' => 'Programa Mediante El Cual Se Realiza La Acción',
            'responsable_adultos_ss' => 'Responsable Designado Del Programa De Atención',

            'meta_s_s' => 'Subtotal Meta',
            'acciones_s_s' => 'Subtotal De Acciones',
            'acciones_pendientez_s_s' => 'Subtotal Pendiente',

            'meta_vivienda' => 'Meta De Acciones Por Vivienda',
            'acciones_vivienda' => 'Acciones Realizadas Por Vivienda',
            'acciones_pendientez_vivienda' => 'Acciones Pendientes Por Vivienda',
            'inversion_vivienda' => 'Inversión Por Vivienda',
        ];
    }
}
