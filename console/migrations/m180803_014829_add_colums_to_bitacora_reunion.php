<?php

use yii\db\Migration;

/**
 * Class m180803_014829_add_colums_to_bitacora_reunion
 */
class m180803_014829_add_colums_to_bitacora_reunion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('bitacora_reunion', 'mes', $this->string(2)->after('fecha'));
        $this->addColumn('bitacora_reunion', 'periodo', $this->string(4)->after('mes'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180803_014829_add_colums_to_bitacora_reunion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180803_014829_add_colums_to_bitacora_reunion cannot be reverted.\n";

        return false;
    }
    */
}
