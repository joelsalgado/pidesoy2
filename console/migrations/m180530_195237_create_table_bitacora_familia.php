<?php

use yii\db\Migration;

/**
 * Class m180530_195237_create_table_bitacora_familia
 */
class m180530_195237_create_table_bitacora_familia extends Migration
{

    public function safeUp()
    {
        $this->createTable('bitacora_familia', [
            'id' => $this->primaryKey(),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'familia' => $this->string(),
            'resp_institucional' => $this->string(),
            'resp_comunitario' => $this->string(),
            'fecha' => $this->date(),
            'domicilio' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ent-bitacora_familia',
            'bitacora_familia',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-bitacora_familia',
            'bitacora_familia',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-bitacora_familia',
            'bitacora_familia',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-bitacora_familia',
            'bitacora_familia',
            'loc_id',
            'cat_localidades',
            'localidad_id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        echo "m180530_195237_create_table_bitacora_familia cannot be reverted.\n";

        return false;
    }

}
