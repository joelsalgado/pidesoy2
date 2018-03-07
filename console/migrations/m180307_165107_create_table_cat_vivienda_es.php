<?php

use yii\db\Migration;

/**
 * Class m180307_165107_create_table_cat_vivienda_es
 */
class m180307_165107_create_table_cat_vivienda_es extends Migration
{
    public function safeUp()
    {
        $this->createTable('cat_vivienda_es', [
            'id' => $this->primaryKey(),
            'nomb_vivienda_es' => $this->string(40)->notNull(),
            'desc_vivienda_es' => $this->string(40)->notNull()
        ]);
    }

    public function safeDown()
    {
        echo "m180307_165107_create_table_cat_vivienda_es cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180307_165107_create_table_cat_vivienda_es cannot be reverted.\n";

        return false;
    }
    */
}
