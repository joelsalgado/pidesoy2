<?php

use yii\db\Migration;

/**
 * Class m180827_235321_create_table_ficha_tecnica
 */
class m180827_235321_create_table_ficha_tecnica extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('ficha_tecnica', [
            'id' => $this->primaryKey(),
            'entidad_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),
            'fecha' => $this->date(),

            'indicaciones' => $this->string(),
            'tipo_acceso' => $this->string(20),
            'estado' => $this->string(20),
            'acceso_facil' => $this->smallInteger(),
            'tiempo' => $this->string(),

            'cedulas_aplicadas' => $this->integer(10),
            'habitantes' => $this->integer(10),
            'ocupantes' => $this->integer(10),
            'indice_marginacion' => $this->string(20),
            'indice_desarrollo_humano' => $this->string(20),

            'campesinos' => $this->integer(10),
            'obreros' => $this->integer(10),
            'albaniles' => $this->integer(10),
            'amas' => $this->integer(10),
            'empleados' => $this->integer(10),
            'otros' => $this->integer(10),
            'cual1' => $this->string(),

            'de1a3' => $this->integer(10),
            'de3a5' => $this->integer(10),
            'de5mas' => $this->integer(10),

            'catolica' => $this->integer(10),
            'testigos' => $this->integer(10),
            'evangelistas' => $this->integer(10),
            'cristiana' => $this->integer(10),
            'otra' => $this->integer(10),
            'cual2' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-ent-ficha-tecnica',
            'ficha_tecnica',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-ficha-tecnica',
            'ficha_tecnica',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-ficha-tecnica',
            'ficha_tecnica',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-ficha-tecnica',
            'ficha_tecnica',
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
        echo "m180827_235321_create_table_ficha_tecnica cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180827_235321_create_table_ficha_tecnica cannot be reverted.\n";

        return false;
    }
    */
}
