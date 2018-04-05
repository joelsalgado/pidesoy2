<?php

use yii\db\Migration;

/**
 * Class m180316_225117_add_column_comedor_to_cedula
 */
class m180316_225117_add_column_comedor_to_cedula extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('cedula_de_pobreza', 'asiste_comedor_comunitario', $this->smallInteger()->after('comedor_comunitario'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180316_225117_add_column_comedor_to_cedula cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180316_225117_add_column_comedor_to_cedula cannot be reverted.\n";

        return false;
    }
    */
}
