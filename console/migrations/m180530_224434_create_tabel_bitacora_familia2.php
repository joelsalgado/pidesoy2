<?php

use yii\db\Migration;

/**
 * Class m180530_224434_create_tabel_bitacora_familia2
 */
class m180530_224434_create_tabel_bitacora_familia2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('bitacora_familia2', [
            'id' => $this->primaryKey(),
            'bitacora_familia_id' => $this->integer()->notNull(),

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
            'fk-bitacora_familia2-bitacora_familia',
            'bitacora_familia2',
            'bitacora_familia_id',
            'bitacora_familia',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180530_224434_create_tabel_bitacora_familia2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180530_224434_create_tabel_bitacora_familia2 cannot be reverted.\n";

        return false;
    }
    */
}
