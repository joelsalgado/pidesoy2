<?php

use yii\db\Migration;

/**
 * Class m180524_004731_add_column_to_navegacion
 */
class m180524_004731_add_column_to_navegacion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('navegacion', 'apartado6', $this->smallInteger()->after('apartado5'));

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180524_004731_add_column_to_navegacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180524_004731_add_column_to_navegacion cannot be reverted.\n";

        return false;
    }
    */
}
