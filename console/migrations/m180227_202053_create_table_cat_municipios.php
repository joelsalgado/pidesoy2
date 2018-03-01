<?php

use yii\db\Migration;

/**
 * Class m180227_202053_create_table_cat_municipios
 */
class m180227_202053_create_table_cat_municipios extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_municipios', [
            'id' => $this->primaryKey(),
            'cve_esp' => $this->integer(),
            'nombre_mun' => $this->string(60)->notNull(),
            'desc_mun' => $this->string(60)->notNull(),
            'coord_reg_id' => $this->integer(),
            'regionalizacion_id' => $this->integer(),
            'reg_fuertes_id' => $this->integer(),
            'reg_grandes_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-coord-reg-municipios',
            'cat_municipios',
            'coord_reg_id',
            'cat_coordinaciones_regionales',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-municipios-regionalizacion',
            'cat_municipios',
            'regionalizacion_id',
            'cat_regionalizacion',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-municipios-reg_grande',
            'cat_municipios',
            'reg_grandes_id',
            'cat_regiones_grandes',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-municipios-reg_fuerte',
            'cat_municipios',
            'reg_fuertes_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180227_202053_create_table_cat_municipios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180227_202053_create_table_cat_municipios cannot be reverted.\n";

        return false;
    }
    */
}
