<?php

use yii\db\Migration;

/**
 * Class m180526_034829_create_table_bitacora_reunion2
 */
class m180526_034829_create_table_bitacora_reunion2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('bitacora_reunion2', [
            'id' => $this->primaryKey(),
            'bitacora_reunion_id' => $this->integer()->notNull(),

            'fechas' => $this->date(),
            'objetivo' => $this->string(),
            'autoridades_federales' => $this->integer(),
            'autoridades_estatales' => $this->integer(),
            'autoridades_municipales' => $this->integer(),
            'acuerdos' => $this->string(),
            'observaciones' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-bitacora_reunion_id2-bitacora_reunion',
            'bitacora_reunion2',
            'bitacora_reunion_id',
            'bitacora_reunion',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180526_034829_create_table_bitacora_reunion2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180526_034829_create_table_bitacora_reunion2 cannot be reverted.\n";

        return false;
    }
    */
}
