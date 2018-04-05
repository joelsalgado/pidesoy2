<?php

use yii\db\Migration;

/**
 * Class m180316_230435_create_table_cat_programas_sedesem
 */
class m180316_230435_create_table_cat_programas_sedesem extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_programas', [
            'id' => $this->primaryKey(),
            'nomb_programa' => $this->string(80)->notNull(),
            'desc_programa' => $this->string(80)->notNull(),
            'status' => $this->smallInteger()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180316_230435_create_table_cat_programas_sedesem cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180316_230435_create_table_cat_programas_sedesem cannot be reverted.\n";

        return false;
    }
    */
}
