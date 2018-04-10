<?php

use yii\db\Migration;

/**
 * Class m180410_015647_add_colum_region_id_to_localidades
 */
class m180410_015647_add_colum_region_id_to_localidades extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('cat_localidades', 'region_id', $this->integer());

        $this->addForeignKey(
            'fk-region_localidades',
            'cat_localidades',
            'region_id',
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
        echo "m180410_015647_add_colum_region_id_to_localidades cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180410_015647_add_colum_region_id_to_localidades cannot be reverted.\n";

        return false;
    }
    */
}
