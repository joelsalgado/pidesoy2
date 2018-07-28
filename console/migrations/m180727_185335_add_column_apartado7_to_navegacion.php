<?php

use yii\db\Migration;

/**
 * Class m180727_185335_add_column_apartado7_to_navegacion
 */
class m180727_185335_add_column_apartado7_to_navegacion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('navegacion', 'apartado7', $this->smallInteger()->after('apartado6'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180727_185335_add_column_apartado7_to_navegacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_185335_add_column_apartado7_to_navegacion cannot be reverted.\n";

        return false;
    }
    */
}
