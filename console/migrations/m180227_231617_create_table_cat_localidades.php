<?php

use yii\db\Migration;

/**
 * Class m180227_231617_create_table_cat_localidades
 */
class m180227_231617_create_table_cat_localidades extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_localidades', [
            'id' => $this->primaryKey(),
            'entidad_federativa_id' => $this->integer(),
            'mun_id' => $this->integer(),
            'localidad_id' => $this->integer()->unique(),
            'desc_loc' => $this->string(150)->notNull(),
            'nombre_loc' => $this->string(150)->notNull(),
            'tipo_loc' => $this->string(1)->notNull(),
            'latitud_loc' => $this->double(),
            'longitud_loc' => $this->double(),
            'regionalizacion_id' => $this->integer(),
            'loc_grandes_id' => $this->integer(),
            'loc_fuertes_id' => $this->integer(),
            'cieps_desc' => $this->string(50),
        ]);

        $this->addForeignKey(
            'fk-coord-municipios-localidades',
            'cat_localidades',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180227_231617_create_table_cat_localidades cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180227_231617_create_table_cat_localidades cannot be reverted.\n";

        return false;
    }
    */
}
