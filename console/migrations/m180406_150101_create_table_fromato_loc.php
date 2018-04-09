<?php

use yii\db\Migration;

/**
 * Class m180406_150101_create_table_fromato_loc
 */
class m180406_150101_create_table_fromato_loc extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('formato_loc', [
            'id' => $this->primaryKey(),

            'region_id' => $this->integer()->notNull(),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull()->unique(),
            'num_habitantes' => $this->smallInteger(),
            'ocupantes_por_vivienda' => $this->smallInteger(),
            'indice_marginacion' => $this->string(),

            'indentificacion_hogares' => $this->string(),
            'calidad_vivienda' => $this->string(),
            'serv_basicos' => $this->string(),
            'acceso_edu' => $this->string(),
            'salud' => $this->string(),
            'preescolar' => $this->string(),
            'primaria' => $this->string(),
            'secundaria' => $this->string(),
            'seguridad_social' => $this->string(),
            'ingresos' => $this->string(),
            'alimentacion' => $this->string(),
            'vinculacion' => $this->string(),
            'liconsa' => $this->smallInteger(),
            'diconsa' => $this->smallInteger(),
            'acceso_terrestre' => $this->string(),

            'delegacion_municipal' => $this->string(),
            'copaci' => $this->string(),
            'comisariado' => $this->string(),
            'vigilancia' => $this->string(),
            'agua' => $this->string(),
            'comite_prospera' => $this->string(),

            'necesidades' => $this->string(),

            'nombre_presidente' => $this->string(),
            'domicilio_presidente' => $this->string(),
            'contacto_presidente' => $this->string(),

            'nombre_integrante' => $this->string(),
            'domicilio_integrante' => $this->string(),
            'contacto_integrante' => $this->string(),

            'nombre_director' => $this->string(),
            'domicilio_director' => $this->string(),
            'contacto_director' => $this->string(),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-formato-loc-region',
            'formato_loc',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-formato-loc',
            'formato_loc',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-formato_loc',
            'formato_loc',
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
        echo "m180406_150101_create_table_fromato_loc cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_150101_create_table_fromato_loc cannot be reverted.\n";

        return false;
    }
    */
}
