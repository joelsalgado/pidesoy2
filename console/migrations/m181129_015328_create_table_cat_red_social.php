<?php

use yii\db\Migration;

/**
 * Class m181129_015328_create_table_cat_red_social
 */
class m181129_015328_create_table_cat_red_social extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_red_social', [
            'id' => $this->primaryKey(),
            'desc_redes' => $this->string(150)->notNull(),
            'status' => $this->smallInteger()
        ]);

        $this->insert("cat_red_social", [
            "desc_redes" => "FACEBOOK",
            "status" => 1,
        ]);

        $this->insert("cat_red_social", [
            "desc_redes" => "TWITTER",
            "status" => 1,
        ]);

        $this->insert("cat_red_social", [
            "desc_redes" => "GOOGLE",
            "status" => 1,
        ]);

        $this->insert("cat_red_social", [
            "desc_redes" => "LINKEDIN",
            "status" => 1,
        ]);

        $this->insert("cat_red_social", [
            "desc_redes" => "YAHOO!",
            "status" => 1,
        ]);


    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m181129_015328_create_table_cat_red_social cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181129_015328_create_table_cat_red_social cannot be reverted.\n";

        return false;
    }
    */
}
