<?php

use yii\db\Migration;

/**
 * Class m180731_195951_add_column_to_directorio
 */
class m180731_195951_add_column_to_directorio extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('directorio_responsables', 'tipo_personal_id', $this->integer());

        $this->addForeignKey(
            'fk-directorio-personal',
            'directorio_responsables',
            'tipo_personal_id',
            'tipo_personal',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180731_195951_add_column_to_directorio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_195951_add_column_to_directorio cannot be reverted.\n";

        return false;
    }
    */
}
