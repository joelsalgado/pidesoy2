<?php

use yii\db\Migration;

/**
 * Class m180307_185119_create_table_cat_parentesco
 */
class m180307_185119_create_table_cat_parentesco extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_parentesco', [
            'id' => $this->primaryKey(),
            'nomb_parentesco' => $this->string(40)->notNull(),
            'desc_parentesco' => $this->string(40)->notNull(),
            'status' => $this->smallInteger()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180307_185119_create_table_cat_parentesco cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180307_185119_create_table_cat_parentesco cannot be reverted.\n";

        return false;
    }
    */
}
