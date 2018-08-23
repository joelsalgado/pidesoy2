<?php

use yii\db\Migration;

/**
 * Class m180823_001640_create_table_programacion2
 */
class m180823_001640_create_table_programacion2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('programacion2', [
            'id' => $this->primaryKey(),
            'programacion_id' => $this->integer()->notNull(),

            'actividad' => $this->string(),
            'ubicacion' => $this->string(),
            'hora' => $this->string(),
            'fecha_inicio' => $this->date(),
            'fecha_termino' => $this->date(),
            'objetivos' => $this->string(),
            'asistentes' => $this->integer(),
            'responsable_actividad' => $this->string(),
            'responsable_vivienda' => $this->string(),
            'acuerdos' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-programacion-programacion2',
            'programacion2',
            'programacion_id',
            'programacion',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180823_001640_create_table_programacion2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180823_001640_create_table_programacion2 cannot be reverted.\n";

        return false;
    }
    */
}
