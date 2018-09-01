<?php

use yii\db\Migration;

/**
 * Class m180831_001944_create_table_acciones_comunitarias
 */
class m180831_001944_create_table_acciones_comunitarias extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('acciones_comunitarias', [
            'id' => $this->primaryKey(),
            'ficha_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'nombre_accion' => $this->string(120),
            'meta' => $this->integer(),
            'acciones' => $this->integer(),
            'acciones_pendientes' => $this->integer(),
            'inversion' => $this->double(),
            'fecha_inicio' => $this->date(),
            'fecha_entrega' => $this->date(),
            'fecha_termino' => $this->date(),
            'programa' => $this->string(120),
            'responsable' => $this->string(120),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-acciones-comunitarias-lideres',
            'acciones_comunitarias',
            'ficha_id',
            'ficha_tecnica',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-acciones-comunitarias',
            'acciones_comunitarias',
            'loc_id',
            'cat_localidades',
            'localidad_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180831_001944_create_table_acciones_comunitarias cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180831_001944_create_table_acciones_comunitarias cannot be reverted.\n";

        return false;
    }
    */
}
