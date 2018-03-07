<?php

use yii\db\Migration;

/**
 * Class m180305_230954_create_table_cat_ent_nacimiento
 */
class m180305_230954_create_table_cat_ent_nacimiento extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_ent_nacimiento', [
            'id' => $this->primaryKey(),
            'desc_ent_nac' => $this->string(50)->notNull(),
            'abrev_ent_nac' => $this->string(50)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180305_230954_create_table_cat_ent_nacimiento cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180305_230954_create_table_cat_ent_nacimiento cannot be reverted.\n";

        return false;
    }
    */
}
