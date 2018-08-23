<?php

use yii\db\Migration;

/**
 * Class m180822_162632_create_table_programacion
 */
class m180822_162632_create_table_programacion extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('programacion', [
            'id' => $this->primaryKey(),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),

            'mes' => $this->string(2),
            'periodo' => $this->string(4),
            'fecha' => $this->date(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ent-programacion',
            'programacion',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-programacion',
            'programacion',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-programacion',
            'programacion',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-programacion',
            'programacion',
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
        echo "m180822_162632_create_table_programacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180822_162632_create_table_programacion cannot be reverted.\n";

        return false;
    }
    */
}
