<?php

use yii\db\Migration;

/**
 * Class m180503_003604_add_column_responsable_to_cat_programas
 */
class m180503_003604_add_column_responsable_to_cat_programas extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('cat_programas', 'responsable', $this->string(120)->after('desc_programa'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180503_003604_add_column_responsable_to_cat_programas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_003604_add_column_responsable_to_cat_programas cannot be reverted.\n";

        return false;
    }
    */
}
