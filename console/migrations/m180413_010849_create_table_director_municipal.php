<?php

use yii\db\Migration;

/**
 * Class m180413_010849_create_table_director_municipal
 */
class m180413_010849_create_table_director_municipal extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('directores_municipales', [
            'id' => $this->primaryKey(),
            'formato_id' => $this->integer()->notNull(),

            'nombre_director' => $this->string(),
            'domicilio_director' => $this->string(),
            'contacto_director' => $this->string(),

            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-directores-formato',
            'directores_municipales',
            'formato_id',
            'formato_loc',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180413_010849_create_table_director_municipal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180413_010849_create_table_director_municipal cannot be reverted.\n";

        return false;
    }
    */
}
