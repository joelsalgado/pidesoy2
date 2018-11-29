<?php

use yii\db\Migration;

/**
 * Class m181129_015934_add_fields_to_solicitantes2
 */
class m181129_015934_add_fields_to_solicitantes2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('solicitantes', 'red_id', $this->integer()->after('correo'));
        $this->addColumn('solicitantes', 'red_social', $this->string()->after('red_id'));

        $this->addForeignKey(
            'fk-entidad-solicitante',
            'solicitantes',
            'ent_nac_id',
            'cat_ent_nacimiento',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-red-solicitante',
            'solicitantes',
            'red_id',
            'cat_red_social',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m181129_015934_add_fields_to_solicitantes2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181129_015934_add_fields_to_solicitantes2 cannot be reverted.\n";

        return false;
    }
    */
}
