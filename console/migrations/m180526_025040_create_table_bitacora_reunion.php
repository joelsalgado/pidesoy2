<?php

use yii\db\Migration;

/**
 * Class m180526_025040_create_table_bitacora_reunion
 */
class m180526_025040_create_table_bitacora_reunion extends Migration
{
    public function safeUp()
    {
        $this->createTable('bitacora_reunion', [
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
            'fk-ent-bitacora_reunion',
            'bitacora_reunion',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-bitacora_reunion',
            'bitacora_reunion',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-bitacora_reunion',
            'bitacora_reunion',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-bitacora_reunion',
            'bitacora_reunion',
            'loc_id',
            'cat_localidades',
            'localidad_id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        echo "m180526_025040_create_table_bitacora_reunion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180526_025040_create_table_bitacora_reunion cannot be reverted.\n";

        return false;
    }
    */
}
