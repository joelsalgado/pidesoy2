<?php

use yii\db\Migration;

class m180305_232232_create_table_cat_edo_civil extends Migration
{

    public function safeUp()
    {
        $this->createTable('cat_estado_civil', [
            'id' => $this->primaryKey(),
            'nomb_edo_civil' => $this->string(40)->notNull(),
            'desc_edo_civil' => $this->string(40)->notNull(),
            'status' => $this->smallInteger()
        ]);
    }

    public function safeDown()
    {
        echo "m180305_232232_create_table_cat_edo_civil cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180305_232232_create_table_cat_edo_civil cannot be reverted.\n";

        return false;
    }
    */
}
