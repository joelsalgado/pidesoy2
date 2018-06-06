<?php

use yii\db\Migration;

/**
 * Class m180531_221134_create_table_directorio_responsables
 */
class m180531_221134_create_table_directorio_responsables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('directorio_responsables', [
            'id' => $this->primaryKey(),

            'fecha' => $this->date(),
            'imagen' => $this->string(),
            'resp_institucional' => $this->smallInteger(),
            'resp_comunitario' => $this->smallInteger(),
            'otro' => $this->smallInteger(),
            'especifique' => $this->string(),
            'funcion' => $this->string(),
            'apellido_paterno' => $this->string(60)->notNull(),
            'apellido_materno' => $this->string(60)->notNull(),
            'nombre' => $this->string(60)->notNull(),
            'sexo' =>$this->string(1)->notNull(),
            'fecha_nacimiento' => $this->date()->notNull(),

            'calle' =>$this->string(80),
            'num_ext' =>$this->string(40),
            'num_int' =>$this->string(40),
            'colonia' =>$this->string(80),
            'codigo_posta' =>$this->integer(5),
            'tel_local' =>$this->string(15),
            'tel_cel' =>$this->string(15),
            'mun_id' => $this->integer()->notNull(),
            'loc_id' => $this->integer()->notNull(),
            'referencia' =>$this->string(100),
            'correo' =>$this->string(100),
            'redes_sociales' =>$this->string(150),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);

        $this->addForeignKey(
            'fk-mun-directorio_responsables',
            'directorio_responsables',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-directorio_responsables',
            'directorio_responsables',
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
        echo "m180531_221134_create_table_directorio_responsables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180531_221134_create_table_directorio_responsables cannot be reverted.\n";

        return false;
    }
    */
}
