<?php

use yii\db\Migration;

/**
 * Class m180523_010251_add_column_to_acciones_adicionales
 */
class m180523_010251_add_column_to_acciones_adicionales extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('acciones_adicionales', 'fecha_termino', $this->date()->after('fecha_entrega'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180523_010251_add_column_to_acciones_adicionales cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180523_010251_add_column_to_acciones_adicionales cannot be reverted.\n";

        return false;
    }
    */
}
