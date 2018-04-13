<?php

use yii\db\Migration;

/**
 * Class m180412_234431_create_table_cabildo
 */
class m180412_234431_create_table_cabildo extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cabildo', [
            'id' => $this->primaryKey(),
            'formato_id' => $this->integer()->notNull(),

            'nombre_cabildo' => $this->string(),
            'domicilio_cabildo' => $this->string(),
            'contacto_cabildo' => $this->string(),

            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-cabildo-formato',
            'cabildo',
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
        echo "m180412_234431_create_table_cabildo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180412_234431_create_table_cabildo cannot be reverted.\n";

        return false;
    }
    */
}
