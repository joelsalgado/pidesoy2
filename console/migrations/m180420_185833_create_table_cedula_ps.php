<?php

use yii\db\Migration;

/**
 * Class m180420_185833_create_table_cedula_ps
 */
class m180420_185833_create_table_cedula_ps extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cedula_ps', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer()->notNull(),

            'cual_programa' => $this->integer(),
            'nombre_recibe_programa' => $this->string(120),
            'titular' => $this->string(120),
            'parentesco_recibe_programa' => $this->integer(),

            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-cedula-ps',
            'cedula_ps',
            'cedula_id',
            'cedula_de_pobreza',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-ps-parentesco',
            'cedula_ps',
            'parentesco_recibe_programa',
            'cat_parentesco',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        echo "m180420_185833_create_table_cedula_ps cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180420_185833_create_table_cedula_ps cannot be reverted.\n";

        return false;
    }
    */
}
