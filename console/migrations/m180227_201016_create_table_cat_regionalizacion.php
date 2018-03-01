<?php

use yii\db\Migration;

/**
 * Class m180227_201016_create_table_cat_regionalizacion
 */
class m180227_201016_create_table_cat_regionalizacion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_regionalizacion', [
            'id' => $this->primaryKey(),
            'desc_region' => $this->string(150)->notNull(),
            'nombre_region' => $this->string(150)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180227_201016_create_table_cat_regionalizacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180227_201016_create_table_cat_regionalizacion cannot be reverted.\n";

        return false;
    }
    */
}
