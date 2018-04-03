<?php

use yii\db\Migration;

/**
 * Class m180402_155447_create_table_documentos
 */
class m180402_155447_create_table_documentos extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('documentos', [
            'id' => $this->primaryKey(),
            'solicitante_id' => $this->integer()->notNull(),
            'periodo' => $this->integer(4),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'documento' => $this->string(),
            'foto' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);


        $this->addForeignKey(
            'fk-documentos-ent',
            'documentos',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-documentos-region',
            'documentos',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-documentos-mun',
            'documentos',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-documentos-loc',
            'documentos',
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
        echo "m180402_155447_create_table_documentos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_155447_create_table_documentos cannot be reverted.\n";

        return false;
    }
    */
}
