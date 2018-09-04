<?php

use yii\db\Migration;

/**
 * Class m180903_173957_create_table_minuta_autoridades
 */
class m180903_173957_create_table_minuta_autoridades extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('minuta_autoridades', [
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
            'fk-ent-minuta-autoridades',
            'minuta_autoridades',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-minuta-autoridades',
            'minuta_autoridades',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-minuta-autoridades',
            'minuta_autoridades',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-minuta-autoridades',
            'minuta_autoridades',
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
        echo "m180903_173957_create_table_minuta_autoridades cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180903_173957_create_table_minuta_autoridades cannot be reverted.\n";

        return false;
    }
    */
}
