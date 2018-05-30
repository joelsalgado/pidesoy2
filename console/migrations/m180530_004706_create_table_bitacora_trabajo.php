<?php

use yii\db\Migration;

/**
 * Class m180530_004706_create_table_bitacora_trabajo
 */
class m180530_004706_create_table_bitacora_trabajo extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('bitacora_trabajo', [
            'id' => $this->primaryKey(),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'resp_institucional' => $this->string(),
            'resp_comunitario' => $this->string(),
            'fecha' => $this->date(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ent-bitacora_trabajo',
            'bitacora_trabajo',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-bitacora_trabajo',
            'bitacora_trabajo',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-bitacora_trabajo',
            'bitacora_trabajo',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-bitacora_trabajo',
            'bitacora_trabajo',
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
        echo "m180530_004706_create_table_bitacora_trabajo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180530_004706_create_table_bitacora_trabajo cannot be reverted.\n";

        return false;
    }
    */
}
