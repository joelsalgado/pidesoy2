<?php

namespace frontend\models;

use common\behaviors\AuthKeyBehavior;
use common\models\Regiones;
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
            [['username', 'email','password_hash', 'name'], 'required', 'message' => 'Campo obligatorio'],
            [['username', 'email'] ,'unique', 'message' => 'Ya existe un registro con este valor'],
            [['username'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 255],
            [['status', 'role'],'safe'],
            [['region_id'],'integer'],
            ['status','validateRegion']
        ];
    }

    public function validateRegion(){
        //var_dump($this->role); die;
        if ($this->role != 30) {

            if ($this->region_id == null) {
                $this->addError('region_id', 'Campo Oblogatorio');
            }
        }

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
            'region_id' => 'Region',
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

    public function getRegion()
    {
        return $this->hasMany(Regiones::className(), ['id' => 'region_id']);
    }
}