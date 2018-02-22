<?php

use yii\db\Migration;

/**
 * Class m171109_202730_seeder_RBAC
 */
class m171109_202730_seeder_RBAC extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        if (!Yii::$app->authManager->getRole("UserController_1")) {
            $permissionsCollection = [
                "index",
                "create",
                "view",
                "update"
            ];
            $this->insert("auth_item", [
                "name" => "UserController_1",
                "type" => 1,
                "description" => "role_UserController_1",
                "rule_name" => null,
                "data" => null,
                "created_at" => time(),
                "updated_at" => time()
            ]);
            foreach ($permissionsCollection as $permission) {
                $this->insert("auth_item", [
                    "name" => $permission,
                    "type" => 2,
                    "description" => "permission_".$permission,
                    "rule_name" => null,
                    "data" => null,
                    "created_at" => time(),
                    "updated_at" => time()
                ]);
                $this->insert("auth_item_child", [
                    "parent" => "UserController_1",
                    "child" => $permission
                ]);
            }
            $this->insert("auth_assignment", [
                "item_name" => "UserController_1",
                "user_id" => 1,
                "created_at" => time(),
            ]);
        }
        return 0;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171109_202730_seeder_RBAC cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171109_202730_seeder_RBAC cannot be reverted.\n";

        return false;
    }
    */
}
