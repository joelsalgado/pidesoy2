<?php

use yii\db\Migration;

/**
 * Class m180821_164230_add_columns_to_bitacora_familia
 */
class m180821_164230_add_columns_to_bitacora_familia extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('bitacora_familia', 'mes', $this->string(2)->after('fecha'));
        $this->addColumn('bitacora_familia', 'periodo', $this->string(4)->after('mes'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180821_164230_add_columns_to_bitacora_familia cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180821_164230_add_columns_to_bitacora_familia cannot be reverted.\n";

        return false;
    }
    */
}
