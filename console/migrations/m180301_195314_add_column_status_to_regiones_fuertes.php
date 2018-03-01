<?php

use yii\db\Migration;

/**
 * Class m180301_195314_add_column_status_to_regiones_fuertes
 */
class m180301_195314_add_column_status_to_regiones_fuertes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('cat_regiones_fuertes', 'status', $this->smallInteger()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180301_195314_add_column_status_to_regiones_fuertes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180301_195314_add_column_status_to_regiones_fuertes cannot be reverted.\n";

        return false;
    }
    */
}
