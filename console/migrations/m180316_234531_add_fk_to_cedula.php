<?php

use yii\db\Migration;

/**
 * Class m180316_234531_add_fk_to_cedula
 */
class m180316_234531_add_fk_to_cedula extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-cedula-programas',
            'cedula_de_pobreza',
            'cual_programa',
            'cat_programas',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180316_234531_add_fk_to_cedula cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180316_234531_add_fk_to_cedula cannot be reverted.\n";

        return false;
    }
    */
}
