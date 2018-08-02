<?php

use yii\db\Migration;

/**
 * Class m180514_033610_add_column_apartado5_to_navegacion
 */
class m180514_033610_add_column_apartado5_to_navegacion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('navegacion', 'apartado5', $this->smallInteger()->after('apartado4'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180514_033610_add_column_apartado5_to_navegacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_033610_add_column_apartado5_to_navegacion cannot be reverted.\n";

        return false;
    }
    */
}
