<?php

use yii\db\Migration;

/**
 * Class m180307_191618_create_table_solicitantes
 */
class m180307_191618_create_table_solicitantes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('solicitantes', [
            'id' => $this->primaryKey(),
            'periodo' => $this->integer(4),
            'entidad_id' => $this->integer(),
            'region_id' => $this->integer(),
            'mun_id' => $this->integer(),
            'loc_id' => $this->integer(),
            'nombre' => $this->string(60)->notNull(),
            'apellido_paterno' => $this->string(60)->notNull(),
            'apellido_materno' => $this->string(60)->notNull(),
            'edo_civil_id' => $this->integer()->notNull(),
            'fecha_nacimiento' => $this->date()->notNull(),
            'edad' => $this->smallInteger()->notNull(),
            'sexo' =>$this->string(1)->notNull(),
            'telefono' =>$this->string(15)->notNull(),
            'calle' =>$this->string(80)->notNull(),
            'colonia' =>$this->string(80)->notNull(),
            'num_ext' =>$this->string(40)->notNull(),
            'num_int' =>$this->string(40)->notNull(),
            'codigo_postal' =>$this->integer(5)->notNull(),
            'otra_referencia' =>$this->integer(100)->notNull(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),

        ]);

        $this->addForeignKey(
            'fk-ent-solicitantes',
            'solicitantes',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-solicitantes',
            'solicitantes',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-mun-solicitantes',
            'solicitantes',
            'mun_id',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-solicitantes',
            'solicitantes',
            'loc_id',
            'cat_localidades',
            'localidad_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-edo-civil-solicitantes',
            'solicitantes',
            'edo_civil_id',
            'cat_estado_civil',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180307_191618_create_table_solicitantes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180307_191618_create_table_solicitantes cannot be reverted.\n";

        return false;
    }
    */
}
