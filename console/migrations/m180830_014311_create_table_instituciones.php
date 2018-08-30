<?php

use yii\db\Migration;

/**
 * Class m180830_014311_create_table_instituciones
 */
class m180830_014311_create_table_instituciones extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('instituciones', [
            'id' => $this->primaryKey(),
            'ficha_id' => $this->integer()->notNull(),

            'grado_id' => $this->integer(),
            'nombre_escuela' => $this->string(),
            'total_alumnos' => $this->integer(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-instituciones-lideres',
            'instituciones',
            'ficha_id',
            'ficha_tecnica',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-instituciones-grado-estudios',
            'instituciones',
            'grado_id',
            'cat_grado_estudios',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180830_014311_create_table_instituciones cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180830_014311_create_table_instituciones cannot be reverted.\n";

        return false;
    }
    */
}
