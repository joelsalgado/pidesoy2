<?php

use yii\db\Migration;

/**
 * Class m180227_201158_create_table_cat_regiones_grandres
 */
class m180227_201158_create_table_cat_regiones_grandres extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_regiones_grandes', [
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
        echo "m180227_201158_create_table_cat_regiones_grandres cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180227_201158_create_table_cat_regiones_grandres cannot be reverted.\n";

        return false;
    }
    */
}
