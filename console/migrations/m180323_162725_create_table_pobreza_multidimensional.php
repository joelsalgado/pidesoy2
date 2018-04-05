<?php

use yii\db\Migration;

/**
 * Class m180323_162725_create_table_pobreza_multidimensional
 */
class m180323_162725_create_table_pobreza_multidimensional extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('pobreza_multidimensional', [
            'id' => $this->primaryKey(),
            'solicitante_id' => $this->integer()->notNull(),
            'cedula_pobreza_id' => $this->integer()->notNull(),
            'periodo' => $this->integer(4),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'calidad_vivienda' => $this->smallInteger(),
            'calidad_vivienda_piso' => $this->smallInteger(),
            'calidad_vivienda_techo' => $this->smallInteger(),
            'calidad_vivienda_muros' => $this->smallInteger(),
            'calidad_vivienda_hacentamiento' => $this->smallInteger(),

            'serv_basicos' => $this->smallInteger(),
            'serv_basicos_agua' => $this->smallInteger(),
            'serv_basicos_drenaje' => $this->smallInteger(),
            'serv_basicos_electricidad' => $this->smallInteger(),
            'serv_basicos_chimenea' => $this->smallInteger(),
            'serv_basicos_excusado' => $this->smallInteger(),
            'serv_basicos_reefrigerador' => $this->smallInteger(),
            'serv_basicos_lavadora' => $this->smallInteger(),

            'educ' => $this->smallInteger(),
            'educ_trunca_3_15' => $this->smallInteger(),
            'educ_no_asiste_3_15' => $this->smallInteger(),
            'educ_no_prim_35' => $this->smallInteger(),
            'educ_sec_inc_16_35' => $this->smallInteger(),
            'educ_analfabeta_may_15' => $this->smallInteger(),
            'educ_prim_inc_may_15' => $this->smallInteger(),
            'educ_no_asiste_6_14' => $this->smallInteger(),

            'salud' => $this->smallInteger(),
            'salud_recibe' => $this->smallInteger(),

            'ss' => $this->smallInteger(),
            'ss_trabajo_formal' => $this->smallInteger(),
            'ss_trabajo_sin' => $this->smallInteger(),
            'ss_adultos_may_sin' => $this->smallInteger(),

            'alimentacion' => $this->smallInteger(),
            'alimentacion_val' => $this->smallInteger(),

            'vinc_prog_liconsa' => $this->smallInteger(),
            'vinc_prog_diconsa' => $this->smallInteger(),
            'vinc_prog_abastece_diconsa' => $this->smallInteger(),
            'vinc_prog_comedor' => $this->smallInteger(),
            'vinc_prog_asiste_comedor' => $this->smallInteger(),
            'vinc_prog_acceso' => $this->smallInteger(),
            'vinc_prog_prospera' => $this->smallInteger(),
            'vinc_prog_mujeres_solt' => $this->smallInteger(),
            'vinc_prog_adult_may' => $this->smallInteger(),

            'carencia_soc' => $this->smallInteger(),
            'carencia_soc_desc' => $this->smallInteger(),

            'indicador_ingresos' => $this->smallInteger(),
            'indicador_ingresos_desc' => $this->smallInteger(),

            'resultado' => $this->smallInteger(),
            'resultado_val' => $this->smallInteger(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),

        ]);

        $this->addForeignKey(
            'fk-pobreza-solicitante',
            'pobreza_multidimensional',
            'solicitante_id',
            'solicitantes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-ent-pobreza',
            'pobreza_multidimensional',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cedula-pobreza',
            'pobreza_multidimensional',
            'cedula_pobreza_id',
            'cedula_de_pobreza',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-pobreza-region',
            'pobreza_multidimensional',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-pobreza',
            'pobreza_multidimensional',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-pobreza',
            'pobreza_multidimensional',
            'loc_id',
            'cat_localidades',
            'localidad_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180323_162725_create_table_pobreza_multidimensional cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180323_162725_create_table_pobreza_multidimensional cannot be reverted.\n";

        return false;
    }
    */
}
