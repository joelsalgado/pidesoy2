<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adicionales_primero".
 *
 * @property int $loc_id
 * @property string $desc_loc
 * @property string $nombre_accion
 */
class AdicionalesPrimero extends \yii\db\ActiveRecord
{
    public  $total;

    public static function tableName()
    {
        return 'adicionales_primero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_id', 'desc_loc'], 'required'],
            [['loc_id','acciones'], 'integer'],
            [['desc_loc'], 'string', 'max' => 150],
            [['programa'], 'string', 'max' => 250],
            [['nombre_accion'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loc_id' => 'Loc ID',
            'desc_loc' => 'Desc Loc',
            'nombre_accion' => 'Nombre Accion',
            'programa' => 'Programa',
        ];
    }
}
