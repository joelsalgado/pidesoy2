<?php

use yii\db\Migration;

/**
 * Class m180421_005856_add_column_apartado4_to_navegacion
 */
class m180421_005856_add_column_apartado4_to_navegacion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('navegacion', 'apartado4', $this->smallInteger()->after('apartado3'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180421_005856_add_column_apartado4_to_navegacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180421_005856_add_column_apartado4_to_navegacion cannot be reverted.\n";

        return false;
    }
    */
}
