<?php

use yii\db\Migration;

/**
 * Class m171109_023949_insert_seder_to_user
 */
class m171109_023949_insert_seder_to_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('user',[
                'username' => 'admin',
                'name' => 'admin',
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password_hash' => Yii::$app->security->generatePasswordHash('12345'),
                'password_reset_token' => '',
                'email' => 'joelsalgado1302@gmail.com',
                'role' => 10,
                'status' => 10,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => time(),
                'updated_at' => time()
            ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171109_023949_insert_seder_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171109_023949_insert_seder_to_user cannot be reverted.\n";

        return false;
    }
    */
}
