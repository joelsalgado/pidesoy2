<?php

use yii\db\Migration;

/**
 * Class m180905_005457_create_table_minuta_localidades
 */
class m180905_005457_create_table_minuta_localidades extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('minuta_localidades', [
            'id' => $this->primaryKey(),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'mes' => $this->string(2),
            'periodo' => $this->string(4),
            'fecha' => $this->date(),
            'minuta' => $this->string(),
            'lista' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ent-minuta-localidades',
            'minuta_localidades',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-minuta-localidades',
            'minuta_localidades',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-minuta-localidades',
            'minuta_localidades',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-minuta-localidades',
            'minuta_localidades',
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
        echo "m180905_005457_create_table_minuta_localidades cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180905_005457_create_table_minuta_localidades cannot be reverted.\n";

        return false;
    }
    */
}
