<?php

use yii\db\Migration;

/**
 * Class m180530_151150_create_table_bitacora_trabajo2
 */
class m180530_151150_create_table_bitacora_trabajo2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('bitacora_trabajo2', [
            'id' => $this->primaryKey(),
            'bitacora_trabajo_id' => $this->integer()->notNull(),

            'fechas' => $this->date(),
            'objetivo' => $this->string(),
            'acciones' => $this->string(),
            'cumplio' => $this->smallInteger(),
            'observaciones' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-bitacora_trabajo_2-bitacora_trabajo',
            'bitacora_trabajo2',
            'bitacora_trabajo_id',
            'bitacora_trabajo',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180530_151150_create_table_bitacora_trabajo2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180530_151150_create_table_bitacora_trabajo2 cannot be reverted.\n";

        return false;
    }
    */
}
