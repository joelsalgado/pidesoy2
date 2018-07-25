<?php

use yii\db\Migration;

/**
 * Class m180724_181540_create_table_censo
 */
class m180724_181540_create_table_censo extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('censo', [
            'id' => $this->primaryKey(),
            'solicitante_id' => $this->integer()->notNull(),
            'periodo' => $this->integer(4),

            'fecha' => $this->date(),

            'agua_potable' => $this->smallInteger(),
            'drenaje' => $this->smallInteger(),
            'basura' => $this->smallInteger(),
            'policias' => $this->smallInteger(),
            'parques' => $this->smallInteger(),
            'salones' => $this->smallInteger(),
            'iglesia' => $this->smallInteger(),
            'doctor' => $this->smallInteger(),
            'salud' => $this->smallInteger(),
            'medicamentos' => $this->smallInteger(),
            'lamparas' => $this->smallInteger(),
            'diconsa' => $this->smallInteger(),
            'liconsa' => $this->smallInteger(),
            'comunitario' => $this->smallInteger(),
            'ambulacia' => $this->smallInteger(),
            'otro1' => $this->smallInteger(),
            'cual1' => $this->string(100),

            'documentos' => $this->smallInteger(),
            'vacunacion' => $this->smallInteger(),
            'ortopedicos' => $this->smallInteger(),
            'seguro_popular' => $this->smallInteger(),
            'becas' => $this->smallInteger(),
            'papeles' => $this->smallInteger(),
            'terminar_esc' => $this->smallInteger(),
            'credito' => $this->smallInteger(),
            'luz' => $this->smallInteger(),
            'desayuno' => $this->smallInteger(),
            'otro2' => $this->smallInteger(),
            'cual2' => $this->string(100),

            'grupo_comunitario' => $this->smallInteger(),
            'cual3' => $this->string(100),

            'autoridades_estatales' => $this->smallInteger(),

            'acciones' => $this->smallInteger(),

            'observaciones' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ]);

        $this->addForeignKey(
            'fk-censo-solicitante',
            'censo',
            'solicitante_id',
            'solicitantes',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180724_181540_create_table_censo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180724_181540_create_table_censo cannot be reverted.\n";

        return false;
    }
    */
}
