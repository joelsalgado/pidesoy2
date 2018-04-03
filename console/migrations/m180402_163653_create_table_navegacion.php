<?php

use yii\db\Migration;

/**
 * Class m180402_163653_create_table_navegacion
 */
class m180402_163653_create_table_navegacion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('navegacion', [
            'id' => $this->primaryKey(),
            'solicitante_id' => $this->integer()->notNull(),
            'periodo' => $this->integer(4),

            'apartado1' => $this->smallInteger(),
            'apartado2' => $this->smallInteger(),
            'apartado3' => $this->smallInteger(),

            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-navegacion-solicitante',
            'navegacion',
            'solicitante_id',
            'solicitantes',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180402_163653_create_table_navegacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_163653_create_table_navegacion cannot be reverted.\n";

        return false;
    }
    */
}
