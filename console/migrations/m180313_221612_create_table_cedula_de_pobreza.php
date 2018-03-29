<?php

use yii\db\Migration;

/**
 * Class m180313_221612_create_table_cedula_de_pobreza
 */
class m180313_221612_create_table_cedula_de_pobreza extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cedula_de_pobreza', [
            'id' => $this->primaryKey(),
            'solicitante_id' => $this->integer()->notNull(),
            'periodo' => $this->integer(4),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'num_personas' => $this->smallInteger(),
            'per_0_15' => $this->smallInteger(),
            'per_16_17' => $this->smallInteger(),
            'per_18_64' => $this->smallInteger(),
            'per_65_mas' => $this->smallInteger(),
            'tiempo_hab_anios' => $this->smallInteger(),
            'tiempo_hab_meses' => $this->smallInteger(),
            'vivienda_es_id' => $this->integer(),
            'num_familias' => $this->smallInteger(),

            'piso_firme' => $this->smallInteger(),
            'piso_material' => $this->string(50),
            'techo_firme' => $this->smallInteger(),
            'techo_material' => $this->string(50),
            'muros_firme' => $this->smallInteger(),
            'muros_material' => $this->string(50),
            'num_habitaciones' => $this->smallInteger(),

            'agua_publica' => $this->smallInteger(),
            'agua_obtenida' => $this->string(50),
            'agua_interior_viv' => $this->smallInteger(),
            'drenaje_puclico' => $this->smallInteger(),
            'drenaje_desemboque' => $this->smallInteger(),
            'energia_electrica' => $this->smallInteger(),
            'cocina_gas' => $this->smallInteger(),
            'cocina_electricidad' => $this->smallInteger(),
            'cocina_lena' => $this->smallInteger(),
            'cocina_carbon' => $this->smallInteger(),
            'cocina_otro' => $this->smallInteger(),
            'cocina_otro_esp' => $this->string(50),
            'chimenea' => $this->smallInteger(),
            'excusado' => $this->smallInteger(),
            'refrigerador' => $this->smallInteger(),
            'lavadora' => $this->smallInteger(),

            'educ_trunca_3_15' => $this->smallInteger(),
            'causa_trunca_3_15' => $this->string(50),
            'no_asiste_esc_3_15' => $this->smallInteger(),
            'causa_no_asiste_3_15' => $this->string(50),
            'prim_icomp_35_mas' => $this->smallInteger(),
            'sec_icomp_16_35' => $this->smallInteger(),
            'analfabetas_may_15' => $this->smallInteger(),
            'analfabentas_num' => $this->smallInteger(),
            'prim_icomp_15_mas' => $this->smallInteger(),
            'num_15_mas' => $this->smallInteger(),
            'no_asiste_esc_6_14' => $this->smallInteger(),
            'num_6_14' => $this->smallInteger(),
            'causa_6_14' => $this->string(50),

            'tiene_serv_med' => $this->smallInteger(),
            'seguro_popular' => $this->smallInteger(),
            'issemyn' => $this->smallInteger(),
            'imss' => $this->smallInteger(),
            'marina_sedena' => $this->smallInteger(),
            'isste' => $this->smallInteger(),
            'pemex' => $this->smallInteger(),
            'otro_serv_med' => $this->smallInteger(),
            'especifique' => $this->string(50),
            'num_miemb_recibe' => $this->smallInteger(),
            'cronico_degenerativa' => $this->smallInteger(),
            'cual_cronico_deg' => $this->string(50),

            'trabaja_formalmente' => $this->smallInteger(),
            'seguridad_social' => $this->smallInteger(),
            'no_SS_65_mas' => $this->smallInteger(),

            'cuantos_ingresos' => $this->smallInteger(),
            'jefe_familia' => $this->smallInteger(),
            'jefa_familia' => $this->smallInteger(),
            'hijo' => $this->smallInteger(),
            'ingreso_total' => $this->integer(),
            'autoingreso' => $this->smallInteger(),
            'monto_autoingreso' => $this->integer(),
            'actividad_autoingreso' => $this->string(50),
            'apoyo_gobierno' => $this->smallInteger(),
            'cual_apoyo' => $this->string(50),
            'monto_apoyo' => $this->integer(),
            'apoyo_extranjero' => $this->smallInteger(),
            'monto_extranjero' => $this->integer(),
            'pension' => $this->smallInteger(),
            'monto_pension' => $this->integer(),
            'madre_soltera_labora' => $this->smallInteger(),

            'menor_poca_variedad' => $this->smallInteger(),
            'menor_falta_alimentos' => $this->smallInteger(),
            'menor_menor_porcion' => $this->smallInteger(),
            'menor_hambre' => $this->smallInteger(),
            'menor_acosto_hambre' => $this->smallInteger(),
            'menor_sin_comer_dia' => $this->smallInteger(),
            'adulto_poca_variedad' => $this->smallInteger(),
            'adulto_falta_alimentos' => $this->smallInteger(),
            'adulto_menor_porcion' => $this->smallInteger(),
            'quedaron_sin_comida' => $this->smallInteger(),
            'adulto_hambre' => $this->smallInteger(),
            'adulto_sin_comer_dia' => $this->smallInteger(),

            'tarjeta_liconsa' => $this->smallInteger(),
            'acceso_tienda_diconsa' => $this->smallInteger(),
            'abastece_tienda_diconsa' => $this->smallInteger(),
            'comedor_comunitario' => $this->smallInteger(),
            'programa_desarrollo_social' => $this->smallInteger(),
            'cual_programa' => $this->integer(),
            'nombre_recibe_programa' => $this->string(120),
            'parentesco_recibe_programa' => $this->integer(),
            'prospera' => $this->smallInteger(),


            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),

        ]);

        $this->addForeignKey(
            'fk-cedula-solicitante',
            'cedula_de_pobreza',
            'solicitante_id',
            'solicitantes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cedula-ent',
            'cedula_de_pobreza',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cecula-region',
            'cedula_de_pobreza',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cedula-mun',
            'cedula_de_pobreza',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cedula-loc',
            'cedula_de_pobreza',
            'loc_id',
            'cat_localidades',
            'localidad_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cedula-vivienda',
            'cedula_de_pobreza',
            'vivienda_es_id',
            'cat_vivienda_es',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cedula-parentesco',
            'cedula_de_pobreza',
            'parentesco_recibe_programa',
            'cat_parentesco',
            'id',
            'CASCADE'
        );


    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180313_221612_create_table_cedula_de_pobreza cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180313_221612_create_table_cedula_de_pobreza cannot be reverted.\n";

        return false;
    }
    */
}
