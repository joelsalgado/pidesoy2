<?php
namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            Yii::$app->session["permissions"] = $this->getMenu($this->getUser()->id);
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    private function getMenu($user_id) {
        $auth = Yii::$app->authManager;
        $rolesAuth = $auth->getRolesByUser($user_id);
        $permissions = [];
        $json = file_get_contents(Yii::$app->basePath."/permissions.json");

        $menu = json_decode($json,true);
        $roles = $this->orderRoles($rolesAuth, $menu, $user_id);
        foreach ($roles as $role => $values) {
            foreach ($auth->getPermissionsByRole($role) as $permission => $values) {
                $role = str_replace('_'.$user_id,'',$role);
                if($permission == "index") {

                    if(isset($menu["menu"][$role])) {
                        $permissions[] = [
                            "label" => $menu["menu"][$role]["label"],
                            "url" => Yii::$app->homeUrl.$menu["menu"][$role]["url"],
                            "icon" => $menu["menu"][$role]["icon"]
                        ];
                    }
                }
            }
        }
        return $permissions;
    }

    private  function orderRoles($roles, $menu, $userId) {
        $permissionsOrders = [];
        $controllers = array_keys($menu['permissions']);
        foreach ($controllers as $controller) {
            if (isset($roles[$controller.'_'.$userId])) {
                $permissionsOrders[$controller.'_'.$userId] = $roles[$controller.'_'.$userId];
            }
        }
        return $permissionsOrders;
    }
}