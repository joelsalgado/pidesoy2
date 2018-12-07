<?php

use yii\db\Migration;

/**
 * Class m181207_010210_create_table_informes
 */
class m181207_010210_create_table_informes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('informes', [
            'id' => $this->primaryKey(),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),
            'fecha' => $this->date(),

            'cantidad' => $this->integer(),
            'actividad_id' => $this->integer()->notNull(),
            'descripcion' => $this->string(),
            'personas_beneficiadas' => $this->integer(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ent-informes',
            'informes',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-informes',
            'informes',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-informes',
            'informes',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-informes',
            'informes',
            'loc_id',
            'cat_localidades',
            'localidad_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-actividades-informes',
            'informes',
            'actividad_id',
            'cat_actividades',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m181207_010210_create_table_informes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181207_010210_create_table_informes cannot be reverted.\n";

        return false;
    }
    */
}
