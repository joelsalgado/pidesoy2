<?php

namespace frontend\models;

use common\behaviors\AuthKeyBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email','password_hash', 'name'], 'required'],
            [['username', 'email'] ,'unique'],
            [['username'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 255],
            [['status', 'role'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'name' => 'Nombre',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Contraseña',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Correo Electronico',
            'role' => 'Rol',
            'status' => 'Estado',
            'created_by' => 'Editado Por',
            'updated_by' => 'Creado Por',
            'created_at' => 'Editado',
            'updated_at' => 'Creado',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => AuthKeyBehavior::className(),
            ],
            [
                'class' => BlameableBehavior::className(),
            ]
        ];
    }
}