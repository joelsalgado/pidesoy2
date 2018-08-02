<?php

use yii\db\Migration;

/**
 * Class m180522_194717_add_column_to_actividades_relevantes
 */
class m180522_194717_add_column_to_actividades_relevantes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('actividades_relevantes', 'inversion', $this->double()->after('descripcion'));
        $this->addColumn('actividades_relevantes', 'dependencia', $this->string()->after('inversion'));
        $this->addColumn('actividades_relevantes', 'responsable', $this->string()->after('dependencia'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180522_194717_add_column_to_actividades_relevantes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180522_194717_add_column_to_actividades_relevantes cannot be reverted.\n";

        return false;
    }
    */
}
