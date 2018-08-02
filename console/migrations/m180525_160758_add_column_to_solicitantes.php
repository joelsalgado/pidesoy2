<?php

use yii\db\Migration;

/**
 * Class m180525_160758_add_column_to_solicitantes
 */
class m180525_160758_add_column_to_solicitantes extends Migration
{
    public function safeUp()
    {
        $this->addColumn('solicitantes', 'check', $this->smallInteger()->after('otra_referencia'));
    }

    public function safeDown()
    {
        echo "m180525_160758_add_column_to_solicitantes cannot be reverted.\n";

        return false;
    }
}
