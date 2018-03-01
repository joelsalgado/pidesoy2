<?php

use yii\db\Migration;

/**
 * Class m180301_202104_add_column_region_id_to_users
 */
class m180301_202104_add_column_region_id_to_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('user', 'region_id', $this->integer()->after('role'));

        $this->addForeignKey(
            'fk-region_user',
            'user',
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
        $this->dropColumn('user', 'region_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180301_202104_add_column_region_id_to_users cannot be reverted.\n";

        return false;
    }
    */
}
