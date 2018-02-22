<?php

namespace app\modules\users\controllers;
use backend\controllers\RbacValidationController;
use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
    
class UserController extends RbacValidationController {
    private $data;
    
    private function getAvailablePermissions() {
        $json = file_get_contents(Yii::$app->basePath."/permissions.json");
        return json_decode($json,true);
    }
    
    private function assingPermissions($permissions,$id) {
        if(isset($permissions["permissions"])) {
            foreach ($permissions['permissions'] as $key => $value) {
                $this->assingPermissionByUser([
                    "role" => $key . "_" . $id,
                    "user_id" => $id,
                    "permissions" => array_keys($value)
                ]);
            }
        }
    }
    
    private function removePermissions($currentPermissions,$id) {
        $availablepermissions = $this->getAvailablePermissions();
        $removedPermissions = [];
        foreach ($availablepermissions["permissions"] as $key => $value) {
            foreach ($value['actions'] as $permission) {
                if(isset($currentPermissions["permissions"][$key])){
                    if (!in_array($permission,$currentPermissions["permissions"][$key])) {
                        $removedPermissions[$key][] = $permission;
                    }
                } else {
                    $removedPermissions[$key][] = $permission;
                }
            }
        }
        if(!empty($removedPermissions)) {
            foreach ($removedPermissions as $role => $permission) {
                foreach ($permission as $action) {
                    $this->removePermissionByRole([
                        'role' => $role."_".$id,
                        'permission' => $action
                    ]);
                }
            }
        }
    }
    
    public function behaviors() {
        $this->setRole(get_class(),Yii::$app->user->id);
        return parent::behaviors();
    }
    
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'permissions' => $this->getPermissions()['actions']
        ]);
    }
    
    public function actionCreate() {
        $model = new User();
        $this->data = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post())) {
            $password = Yii::$app->request->post()['User']["password_hash"];
            $model->password_hash = Yii::$app
                ->security
                ->generatePasswordHash($password);
            $model->status = 10;
            if(!$model->save()) {
                return $this->render('create', [
                    'model' => $model,
                    'permissions' => $this->getAvailablePermissions()
                ]);
            }
            $this->assingPermissions($this->data,$model->id);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'permissions' => $this->getAvailablePermissions()
            ]);
        }
    }
    
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->data = Yii::$app->request->post();
        if ($model->load($this->data)) {
            $assignPermissions = [];
            $this->removePermissions($this->data,$id);
            $this->assingPermissions($this->data,$id);
            if(!empty($password)) {
                $model->password_hash = Yii::$app
                    ->security
                    ->generatePasswordHash($password);
            }
            else{
                $model->password_hash = $model->password_hash;
            }
            $model->save();
            return $this->redirect(['index']);
        } else {
            $permissionsByUser = $this->getPermissionsByUser($id);
            return $this->render('update', [
                'model' => $model,
                'permissions' => $this->getAvailablePermissions(),
                'permissionsByUser' => $permissionsByUser
            ]);
        }
    }
    
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}