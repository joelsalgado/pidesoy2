<?php

use yii\db\Migration;

/**
 * Class m180517_013931_create_table_acciones_adicionales
 */
class m180517_013931_create_table_acciones_adicionales extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('acciones_adicionales', [
            'id' => $this->primaryKey(),
            'solicitante_id' => $this->integer()->notNull(),
            'periodo' => $this->integer(4),

            'nombre_accion' => $this->string(120),
            'meta' => $this->integer(),
            'acciones' => $this->integer(),
            'acciones_pendientes' => $this->integer(),
            'inversion' => $this->double(),
            'fecha_inicio' => $this->date(),
            'fecha_entrega' => $this->date(),
            'programa' => $this->string(120),
            'responsable' => $this->string(120),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ]);

        $this->addForeignKey(
            'fk-acciones-solicitante',
            'acciones_adicionales',
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
        echo "m180517_013931_create_table_acciones_adicionales cannot be reverted.\n";

        return false;
    }

}
