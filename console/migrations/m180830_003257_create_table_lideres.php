<?php

use yii\db\Migration;

/**
 * Class m180830_003257_create_table_lideres
 */
class m180830_003257_create_table_lideres extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('lideres', [
            'id' => $this->primaryKey(),
            'ficha_id' => $this->integer()->notNull(),

            'nombre' => $this->string(),
            'cargo' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ficha-tecnica-lideres',
            'lideres',
            'ficha_id',
            'ficha_tecnica',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180830_003257_create_table_lideres cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180830_003257_create_table_lideres cannot be reverted.\n";

        return false;
    }
    */
}
