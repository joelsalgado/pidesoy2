<?php

use yii\db\Migration;

/**
 * Class m180808_004719_add_columns_to_directorio
 */
class m180808_004719_add_columns_to_directorio extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('directorio_responsables', 'entidad_id', $this->integer()->after('fecha'));
        $this->addColumn('directorio_responsables', 'region_id', $this->integer()->after('entidad_id'));
        $this->addColumn('directorio_responsables', 'mun_id1', $this->integer()->after('region_id'));
        $this->addColumn('directorio_responsables', 'loc_id1', $this->integer()->after('mun_id1'));


        $this->addForeignKey(
            'fk-ent-directorio_responsables',
            'directorio_responsables',
            'entidad_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-region-directorio_responsables',
            'directorio_responsables',
            'region_id',
            'cat_regiones_fuertes',
            'id',
            'CASCADE'
        );


        $this->addForeignKey(
            'fk-mun-directorio_responsables1',
            'directorio_responsables',
            'mun_id1',
            'cat_municipios',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-loc-directorio_responsables1',
            'directorio_responsables',
            'loc_id1',
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
        echo "m180808_004719_add_columns_to_directorio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180808_004719_add_columns_to_directorio cannot be reverted.\n";

        return false;
    }
    */
}
