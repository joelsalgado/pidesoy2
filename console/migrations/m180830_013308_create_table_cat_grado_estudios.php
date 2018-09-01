<?php

use yii\db\Migration;

/**
 * Class m180830_013308_create_table_cat_grado_estudios
 */
class m180830_013308_create_table_cat_grado_estudios extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_grado_estudios', [
            'id' => $this->primaryKey(),
            'desc_grado' => $this->string(150)->notNull(),
            'status' => $this->smallInteger()
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "PRIMARIA",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "SECUNDARIA",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "BACHILLERATO, PREPARATORIA O EQUIVALENTE",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "LICENCIATURA O EQUIVALENTE",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "NINGUNO(A)",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "TECNICO",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "MAESTRIA",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "DOCTORADO",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "PREESCOLAR",
            "status" => 1,
        ]);

        $this->insert("cat_grado_estudios", [
            "desc_grado" => "EDUCACION ESPECIAL",
            "status" => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180830_013308_create_table_cat_grado_estudios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180830_013308_create_table_cat_grado_estudios cannot be reverted.\n";

        return false;
    }
    */
}
