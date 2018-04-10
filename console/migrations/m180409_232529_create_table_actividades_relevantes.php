<?php

use yii\db\Migration;

/**
 * Class m180409_232529_create_table_actividades_relevantes
 */
class m180409_232529_create_table_actividades_relevantes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('actividades_relevantes', [
            'id' => $this->primaryKey(),

            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),
            'obra_comunitaria' => $this->smallInteger(),
            'fecha' => $this->date(),
            'descripcion' => $this->string(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-actividades-region',
            'actividades_relevantes',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-actividades-mun',
            'actividades_relevantes',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-actividades-loc',
            'actividades_relevantes',
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
        echo "m180409_232529_create_table_actividades_relevantes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180409_232529_create_table_actividades_relevantes cannot be reverted.\n";

        return false;
    }
    */
}
