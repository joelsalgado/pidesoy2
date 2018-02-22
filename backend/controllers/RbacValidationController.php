<?php

namespace backend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class RbacValidationController extends Controller
{
    /**
     * @var array
     */
    private $permissionsList = [];
    private $roleName;
    private $additionalBehavior;
    private $excludedActions = [];

    /**
     * @return array
     */
    public function behaviors() {
        $permissions = $this->getPermissions();
        $behaviors = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        "allow" => $permissions['allow'],
                        'actions' => $permissions['actions'],
                        'roles' => $permissions['roles']
                    ],
                    $this->excludedActions
                ]
            ],
        ];
        if(is_array($this->additionalBehavior)){
            $behaviors = array_merge($behaviors,$this->additionalBehavior);
        }
        return $behaviors;
    }

    /**
     * @param $rules
     * @return array
     */
    public function setExcludedActions($rules) {
        if(is_array($rules) && (isset($rules['allow']) && isset($rules['actions'])) ) {
            $this->excludedActions = $rules;
            return $this->excludedActions;
        }
        return $this->excludedActions = [
            'actions' =>['index'],
            'roles' => ['@'],
            'allow' => false,
        ];
    }

    /**
     * @return array
     */
    public function setRole($role,$user_id){
        if( (!empty($role)) && (is_numeric($user_id)) ) {
            $explode = explode('\\', $role);
            $role_name = sprintf('%s_%d',$explode[count($explode) - 1],$user_id);
            $this->roleName = $role_name;
        } else {
            $this->roleName = "@";
        }
        return $this->roleName;
    }

    /**
     * @param $behavior
     * @return array
     */
    public function setAdditional($behavior){
        if(is_array($behavior) && !empty($behavior)) {
            $this->additionalBehavior = $behavior;
        }
        return $this->additionalBehavior;
    }

    /**
     * @param $user_id
     * @return array
     */
    public function getPermissionsByUser($user_id) {
        $auth = \Yii::$app->authManager;
        $permissions = [];
        try{
            $roles = $auth->getRolesByUser($user_id);
        } catch (\Exception $e) {
            $auth->revokeAll($user_id);
            return [];
        }
        foreach ($roles as $key => $role) {
            $permission = $auth->getPermissionsByRole($key);
            foreach ($permission as $action => $permissionObj) {
                $permissions[$key][$action] = 1;
            }
        }
        return $permissions;
    }

    /**
     * @return array
     */
    public function getPermissions() {
        $auth = \Yii::$app->authManager;
        $permissions = $auth->getPermissionsByRole($this->roleName);
        $this->permissionsList = [];
        if($permissions) {
            foreach ($permissions as $key => $permission) {
                $this->permissionsList['actions'][] = $key;
            }
            $this->permissionsList['roles'] = [$this->roleName];
            $this->permissionsList['allow'] = true;
        } else {
            $this->permissionsList['roles'] = [];
            $this->permissionsList['allow'] = false;
            $this->permissionsList['actions'] = [];
        }

        return $this->permissionsList;
    }

    /**
     * @param $permissions
     * @return bool|int
     */
    public function removePermissionByRole($permissions){
        if(!empty($permissions) && is_array($permissions)) {
            $auth = \Yii::$app->authManager;
            $permissionsOnRole = $auth->getPermissionsByRole($permissions['role']);
            if(isset($permissionsOnRole[$permissions['permission']])) {
                $role = $auth->getRole($permissions['role']);
                if ($role) {
                    $permission = $auth->getPermission($permissions['permission']);
                    return $auth->removeChild($role, $permission);
                }
            }
            return 0;
        }else {
            return 0;
        }
    }

    /**
     * @param $permissions
     * @return int
     */
    public function assingPermissionByUser($permissions) {
        if(!is_array($permissions)) {
            return 0;
        }
        $auth = \Yii::$app->authManager;
        $userRole = $auth->getRole($permissions['role']);

        if(!$userRole) {
            $userRole = $auth->createRole($permissions['role']);
            $auth->add($userRole);
        }

        foreach ($permissions['permissions'] as $permission) {
            $permissionExist = $auth->getPermission($permission);
            if($permissionExist) {
                if(!in_array($permissionExist,$auth->getPermissionsByRole($userRole->name))) {
                    $auth->addChild($userRole, $permissionExist);
                }
            } else {
                $newPermission = $auth->createPermission($permission);
                $newPermission->description = $permission;
                $auth->add($newPermission);
                $auth->addChild($userRole,$newPermission);

            }
        }
        if(!$auth->getAssignment($userRole->name,$permissions['user_id'])) {
            $auth->assign($userRole, $permissions['user_id']);
        }
        return 1;
    }
}