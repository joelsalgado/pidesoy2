<?php

use yii\db\Migration;

/**
 * Class m180731_180806_create_table_tipo_personal
 */
class m180731_180806_create_table_tipo_personal extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('tipo_personal', [
            'id' => $this->primaryKey(),
            'desc_personal' => $this->string(150)->notNull(),
            'status' => $this->smallInteger()
        ]);

        $this->insert("tipo_personal", [
            "desc_personal" => "Responsable Institucional",
            "status" => 1,
        ]);

        $this->insert("tipo_personal", [
            "desc_personal" => "Responsable Comunitario",
            "status" => 1,
        ]);

        $this->insert("tipo_personal", [
            "desc_personal" => "Suplente del Responsable Institucional",
            "status" => 1,
        ]);

        $this->insert("tipo_personal", [
            "desc_personal" => "Suplente del Responsable Comunitario",
            "status" => 1,
        ]);

        $this->insert("tipo_personal", [
            "desc_personal" => "Enlace del Responsable Institucional",
            "status" => 1,
        ]);

        $this->insert("tipo_personal", [
            "desc_personal" => "Persona para dejar recados al Responsable Comunitario",
            "status" => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180731_180806_create_table_tipo_personal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_180806_create_table_tipo_personal cannot be reverted.\n";

        return false;
    }
    */
}
