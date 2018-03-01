<?php

use yii\db\Migration;

/**
 * Class m180227_201255_create_table_cat_regiones_fuertes
 */
class m180227_201255_create_table_cat_regiones_fuertes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_regiones_fuertes', [
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
        echo "m180227_201255_create_table_cat_regiones_fuertes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180227_201255_create_table_cat_regiones_fuertes cannot be reverted.\n";

        return false;
    }
    */
}
