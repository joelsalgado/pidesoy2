<?php

use yii\db\Migration;

/**
 * Class m180227_200246_create_table_coordinaciones_regionales
 */
class m180227_200246_create_table_coordinaciones_regionales extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_coordinaciones_regionales', [
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
        echo "m180227_200246_create_table_coordinaciones_regionales cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180227_200246_create_table_coordinaciones_regionales cannot be reverted.\n";

        return false;
    }
    */
}
