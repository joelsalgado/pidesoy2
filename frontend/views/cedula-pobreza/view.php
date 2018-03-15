<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CedulaPobreza */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedula Pobrezas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedula-pobreza-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'solicitante_id',
            'periodo',
            'entidad_id',
            'region_id',
            'mun_id',
            'loc_id',
            'num_personas',
            'per_0_15',
            'per_16_17',
            'per_18_64',
            'per_65_mas',
            'tiempo_hab_anios',
            'tiempo_hab_meses',
            'vivienda_es_id',
            'num_familias',
            'piso_firme',
            'piso_material',
            'techo_firme',
            'techo_material',
            'muros_firme',
            'muros_material',
            'num_habitaciones',
            'agua_publica',
            'agua_obtenida',
            'agua_interior_viv',
            'drenaje_puclico',
            'drenaje_desemboque',
            'energia_electrica',
            'cocina_gas',
            'cocina_electricidad',
            'cocina_lena',
            'cocina_carbon',
            'cocina_otro',
            'cocina_otro_esp',
            'chimenea',
            'excusado',
            'refrigerador',
            'lavadora',
            'educ_trunca_3_15',
            'causa_trunca_3_15',
            'no_asiste_esc_3_15',
            'causa_no_asiste_3_15',
            'prim_icomp_35_mas',
            'sec_icomp_16_35',
            'analfabetas_may_15',
            'analfabentas_num',
            'prim_icomp_15_mas',
            'num_15_mas',
            'no_asiste_esc_6_14',
            'num_6_14',
            'causa_6_14',
            'tiene_serv_med',
            'seguro_popular',
            'issemyn',
            'imss',
            'marina_sedena',
            'isste',
            'pemex',
            'otro_serv_med',
            'especifique',
            'num_miemb_recibe',
            'cronico_degenerativa',
            'cual_cronico_deg',
            'trabaja_formalmente',
            'seguridad_social',
            'no_SS_65_mas',
            'cuantos_ingresos',
            'jefe_familia',
            'jefa_familia',
            'hijo',
            'ingreso_total',
            'autoingreso',
            'monto_autoingreso',
            'actividad_autoingreso',
            'apoyo_gobierno',
            'cual_apoyo',
            'monto_apoyo',
            'apoyo_extranjero',
            'monto_extranjero',
            'pension',
            'monto_pension',
            'madre_soltera_labora',
            'menor_poca_variedad',
            'menor_falta_alimentos',
            'menor_menor_porcion',
            'menor_hambre',
            'menor_acosto_hambre',
            'menor_sin_comer_dia',
            'adulto_poca_variedad',
            'adulto_falta_alimentos',
            'adulto_menor_porcion',
            'quedaron_sin_comida',
            'adulto_hambre',
            'adulto_sin_comer_dia',
            'tarjeta_liconsa',
            'acceso_tienda_diconsa',
            'abastece_tienda_diconsa',
            'comedor_comunitario',
            'programa_desarrollo_social',
            'cual_programa',
            'nombre_recibe_programa',
            'parentesco_recibe_programa',
            'prospera',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
