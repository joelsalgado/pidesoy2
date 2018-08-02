<?php

use yii\db\Migration;

/**
 * Class m180606_183735_add_column_cargo_to_activades_relevantes
 */
class m180606_183735_add_column_cargo_to_activades_relevantes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('actividades_relevantes', 'cargo', $this->string()->after('responsable'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180606_183735_add_column_cargo_to_activades_relevantes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180606_183735_add_column_cargo_to_activades_relevantes cannot be reverted.\n";

        return false;
    }
    */
}
