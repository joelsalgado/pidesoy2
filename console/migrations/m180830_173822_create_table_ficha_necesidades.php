<?php

use yii\db\Migration;

/**
 * Class m180830_173822_create_table_ficha_necesidades
 */
class m180830_173822_create_table_ficha_necesidades extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('ficha_necesidades', [
            'id' => $this->primaryKey(),
            'ficha_id' => $this->integer()->notNull(),

            'piso_firme' => $this->integer(),
            'techo_firme' => $this->integer(),
            'muro_firme' => $this->integer(),
            'cuarto_adicional' => $this->integer(),
            'estufa' => $this->integer(),
            'agua_potable' => $this->integer(),
            'drenaje' => $this->integer(),
            'luz' => $this->integer(),
            'alumbrado' => $this->integer(),

            'menor_no_edu_basica' => $this->integer(),
            'estructuras_escolares' => $this->integer(),
            'escuelas_acondicionamiento' => $this->integer(),
            'adulto_no_edu_basica' => $this->integer(),

            'centros_medicos' => $this->integer(),
            'personal_medico' => $this->integer(),
            'medicamento' => $this->integer(),
            'jornada_de_salud' => $this->integer(),
            'seguro_popular' => $this->integer(),

            'trabajador_no_ss' => $this->integer(),
            'adulto_no_ss' => $this->integer(),

            'alimentan1o2' => $this->integer(),
            'menor_desayunos' => $this->integer(),
            'comedor_comunitario' => $this->integer(),
            'liconsa' => $this->integer(),
            'diconsa' => $this->integer(),

            'basura' => $this->integer(),
            'tramite' => $this->integer(),
            'ambulancia' => $this->integer(),
            'creditos' => $this->integer(),
            'policia' => $this->integer(),
            'parques' => $this->integer(),
            'iglesias' => $this->integer(),
            'documentos_personales' => $this->integer(),
            'aparatos_ortopedicos' => $this->integer(),
            'aparatos_auditivos' => $this->integer(),
            'lentes' => $this->integer(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ficha-tecnica-necesidades',
            'ficha_necesidades',
            'ficha_id',
            'ficha_tecnica',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180830_173822_create_table_ficha_necesidades cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180830_173822_create_table_ficha_necesidades cannot be reverted.\n";

        return false;
    }
    */
}
