<?php

use yii\db\Migration;

/**
 * Class m180503_223639_create_table_seguimiento
 */
class m180503_223639_create_table_seguimiento extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('seguimiento', [
            'id' => $this->primaryKey(),
            'solicitante_id' => $this->integer()->notNull(),
            'periodo' => $this->integer(4),

            'meta_piso' => $this->integer(),
            'acciones_piso' => $this->integer(),
            'acciones_pendientes_piso' => $this->integer(),
            'inversion_piso' => $this->double(),
            'fecha_inicio_piso' => $this->date(),
            'fecha_entrega_piso' => $this->date(),
            'programa_piso' => $this->integer(),
            'responsable_piso' => $this->string(120),

            'meta_techo' => $this->integer(),
            'acciones_techo' => $this->integer(),
            'acciones_pendientes_techo' => $this->integer(),
            'inversion_techo' => $this->double(),
            'fecha_inicio_techo' => $this->date(),
            'fecha_entrega_techo' => $this->date(),
            'programa_techo' => $this->integer(),
            'responsable_techo' => $this->string(120),

            'meta_muro' => $this->integer(),
            'acciones_muro' => $this->integer(),
            'acciones_pendientes_muro' => $this->integer(),
            'inversion_muro' => $this->double(),
            'fecha_inicio_muro' => $this->date(),
            'fecha_entrega_muro' => $this->date(),
            'programa_muro' => $this->integer(),
            'responsable_muro' => $this->string(120),

            'meta_cuarto' => $this->integer(),
            'acciones_cuarto' => $this->integer(),
            'acciones_pendientes_cuarto' => $this->integer(),
            'inversion_cuarto' => $this->double(),
            'fecha_inicio_cuarto' => $this->date(),
            'fecha_entrega_cuarto' => $this->date(),
            'programa_cuarto' => $this->integer(),
            'responsable_cuarto' => $this->string(120),

            'meta_calidad_espacios_vivienda' => $this->integer(),
            'acciones_calidad_espacios_vivienda' => $this->integer(),
            'acciones_pendientez_calidad_espacios_vivienda' => $this->integer(),

            'meta_agua_potable' => $this->integer(),
            'acciones_agua_potable' => $this->integer(),
            'acciones_pendientes_agua_potable' => $this->integer(),
            'inversion_agua_potable' => $this->double(),
            'fecha_inicio_agua_potable' => $this->date(),
            'fecha_entrega_agua_potable' => $this->date(),
            'programa_agua_potable' => $this->integer(),
            'responsable_agua_potable' => $this->string(120),

            'meta_agua_interior' => $this->integer(),
            'acciones_agua_interior' => $this->integer(),
            'acciones_pendientes_agua_interior' => $this->integer(),
            'inversion_agua_interior' => $this->double(),
            'fecha_inicio_agua_interior' => $this->date(),
            'fecha_entrega_agua_interior' => $this->date(),
            'programa_agua_interior' => $this->integer(),
            'responsable_agua_interior' => $this->string(120),

            'meta_drenaje' => $this->integer(),
            'acciones_drenaje' => $this->integer(),
            'acciones_pendientes_drenaje' => $this->integer(),
            'inversion_drenaje' => $this->double(),
            'fecha_inicio_drenaje' => $this->date(),
            'fecha_entrega_drenaje' => $this->date(),
            'programa_drenaje' => $this->integer(),
            'responsable_drenaje' => $this->string(120),

            'meta_luz' => $this->integer(),
            'acciones_luz' => $this->integer(),
            'acciones_pendientes_luz' => $this->integer(),
            'inversion_luz' => $this->double(),
            'fecha_inicio_luz' => $this->date(),
            'fecha_entrega_luz' => $this->date(),
            'programa_luz' => $this->integer(),
            'responsable_luz' => $this->string(120),

            'meta_estufa' => $this->integer(),
            'acciones_estufa' => $this->integer(),
            'acciones_pendientes_estufa' => $this->integer(),
            'inversion_estufa' => $this->double(),
            'fecha_inicio_estufa' => $this->date(),
            'fecha_entrega_estufa' => $this->date(),
            'programa_estufa' => $this->integer(),
            'responsable_estufa' => $this->string(120),

            'meta_servicios_basicos' => $this->integer(),
            'acciones_servicios_basicos' => $this->integer(),
            'acciones_pendientez_servicios_basicos' => $this->integer(),

            'meta_seguro_popular' => $this->integer(),
            'acciones_seguro_popular' => $this->integer(),
            'acciones_pendientes_seguro_popular' => $this->integer(),
            'inversion_seguro_popular' => $this->double(),
            'fecha_inicio_seguro_popular' => $this->date(),
            'fecha_entrega_seguro_popular' => $this->date(),
            'programa_seguro_popular' => $this->integer(),
            'responsable_seguro_popular' => $this->string(120),

            'meta_3_15_escuela' => $this->integer(),
            'acciones_3_15_escuela' => $this->integer(),
            'acciones_pendientes_3_15_escuela' => $this->integer(),
            'inversion_3_15_escuela' => $this->double(),
            'fecha_inicio_3_15_escuela' => $this->date(),
            'fecha_entrega_3_15_escuela' => $this->date(),
            'programa_3_15_escuela' => $this->integer(),
            'responsable_3_15_escuela' => $this->string(120),

            'meta_antes_1982_primaria' => $this->integer(),
            'acciones_antes_1982_primaria' => $this->integer(),
            'acciones_pendientes_antes_1982_primaria' => $this->integer(),
            'inversion_antes_1982_primaria' => $this->double(),
            'fecha_inicio_antes_1982_primaria' => $this->date(),
            'fecha_entrega_antes_1982_primaria' => $this->date(),
            'programa_antes_1982_primaria' => $this->integer(),
            'responsable_antes_1982_primaria' => $this->string(120),

            'meta_despues_1982_secundaria' => $this->integer(),
            'acciones_despues_1982_secundaria' => $this->integer(),
            'acciones_pendientes_despues_1982_secundaria' => $this->integer(),
            'inversion_despues_1982_secundaria' => $this->double(),
            'fecha_inicio_despues_1982_secundaria' => $this->date(),
            'fecha_entrega_despues_1982_secundaria' => $this->date(),
            'programa_despues_1982_secundaria' => $this->integer(),
            'responsable_despues_1982_secundaria' => $this->string(120),

            'meta_educacion' => $this->integer(),
            'acciones_educacion' => $this->integer(),
            'acciones_pendientez_educacion' => $this->integer(),

            'meta_despensas' => $this->integer(),
            'acciones_despensas' => $this->integer(),
            'acciones_pendientes_despensas' => $this->integer(),
            'inversion_despensas' => $this->double(),
            'fecha_inicio_despensas' => $this->date(),
            'fecha_entrega_despensas' => $this->date(),
            'programa_despensas' => $this->integer(),
            'responsable_despensas' => $this->string(120),

            'meta_ss' => $this->integer(),
            'acciones_ss' => $this->integer(),
            'acciones_pendientes_ss' => $this->integer(),
            'inversion_ss' => $this->double(),
            'fecha_inicio_ss' => $this->date(),
            'fecha_entrega_ss' => $this->date(),
            'programa_ss' => $this->integer(),
            'responsable_ss' => $this->string(120),

            'meta_trabajadores_ss' => $this->integer(),
            'acciones_trabajadores_ss' => $this->integer(),
            'acciones_pendientes_trabajadores_ss' => $this->integer(),
            'inversion_trabajadores_ss' => $this->double(),
            'fecha_inicio_trabajadores_ss' => $this->date(),
            'fecha_entrega_trabajadores_ss' => $this->date(),
            'programa_trabajadores_ss' => $this->integer(),
            'responsable_trabajadores_ss' => $this->string(120),

            'meta_adultos_ss' => $this->integer(),
            'acciones_adultos_ss' => $this->integer(),
            'acciones_pendientes_adultos_ss' => $this->integer(),
            'inversion_adultos_ss' => $this->double(),
            'fecha_inicio_adultos_ss' => $this->date(),
            'fecha_entrega_adultos_ss' => $this->date(),
            'programa_adultos_ss' => $this->integer(),
            'responsable_adultos_ss' => $this->string(120),

            'meta_s_s' => $this->integer(),
            'acciones_s_s' => $this->integer(),
            'acciones_pendientez_s_s' => $this->integer(),

            'meta_vivienda' => $this->integer(),
            'acciones_vivienda' => $this->integer(),
            'acciones_pendientez_vivienda' => $this->integer(),
            'inversion_vivienda' => $this->double(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ]);

        $this->addForeignKey(
            'fk-seguimiento-solicitante',
            'seguimiento',
            'solicitante_id',
            'solicitantes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas1-seguimiento',
            'seguimiento',
            'programa_piso',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas2-seguimiento',
            'seguimiento',
            'programa_techo',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas3-seguimiento',
            'seguimiento',
            'programa_muro',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas4-seguimiento',
            'seguimiento',
            'programa_cuarto',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas5-seguimiento',
            'seguimiento',
            'programa_agua_potable',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas6-seguimiento',
            'seguimiento',
            'programa_agua_interior',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas7-seguimiento',
            'seguimiento',
            'programa_drenaje',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas8-seguimiento',
            'seguimiento',
            'programa_luz',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas9-seguimiento',
            'seguimiento',
            'programa_estufa',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas10-seguimiento',
            'seguimiento',
            'programa_seguro_popular',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas11-seguimiento',
            'seguimiento',
            'programa_3_15_escuela',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas12-seguimiento',
            'seguimiento',
            'programa_antes_1982_primaria',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas13-seguimiento',
            'seguimiento',
            'programa_despues_1982_secundaria',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas14-seguimiento',
            'seguimiento',
            'programa_despensas',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas15-seguimiento',
            'seguimiento',
            'programa_ss',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas16-seguimiento',
            'seguimiento',
            'programa_trabajadores_ss',
            'cat_programas',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programas17-seguimiento',
            'seguimiento',
            'programa_adultos_ss',
            'cat_programas',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180503_223639_create_table_seguimiento cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_223639_create_table_seguimiento cannot be reverted.\n";

        return false;
    }
    */
}
