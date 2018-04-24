<?php

namespace common\models;

use Yii;

class Localidades extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'cat_localidades';
    }

    public function rules()
    {
        return [
            [['entidad_federativa_id', 'mun_id', 'region_id', 'localidad_id', 'regionalizacion_id', 'loc_grandes_id', 'loc_fuertes_id'], 'integer'],
            [['desc_loc', 'nombre_loc', 'tipo_loc'], 'required'],
            [['latitud_loc', 'longitud_loc'], 'number'],
            [['desc_loc', 'nombre_loc'], 'string', 'max' => 150],
            [['tipo_loc'], 'string', 'max' => 1],
            [['cieps_desc'], 'string', 'max' => 50],
            [['localidad_id'], 'unique'],
            [['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad_federativa_id' => 'Entidad Federativa ID',
            'mun_id' => 'Mun ID',
            'region_id' => 'Region',
            'localidad_id' => 'Localidad ID',
            'desc_loc' => 'Desc Loc',
            'nombre_loc' => 'Nombre Loc',
            'tipo_loc' => 'Tipo Loc',
            'latitud_loc' => 'Latitud Loc',
            'longitud_loc' => 'Longitud Loc',
            'regionalizacion_id' => 'Regionalizacion ID',
            'loc_grandes_id' => 'Loc Grandes ID',
            'loc_fuertes_id' => 'Loc Fuertes ID',
            'cieps_desc' => 'Cieps Desc',
        ];
    }

    public function getMun()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id']);
    }


    public static function getLoc($cat_id)
    {
        $sections = self::find()
            ->select(['localidad_id', 'desc_loc'])
            ->where(['mun_id'=> $cat_id])
            ->andWhere('loc_fuertes_id > 0 ')
            ->asArray()
            ->all();
        $sec = [];
        foreach ($sections as $value){
            $sec[] = ["id"=> $value['localidad_id'], "name"=>$value['desc_loc']];
        }

        return $sec;
    }

    public static function getLocIndex($cat_id)
    {
        if($cat_id){
            $sections = self::find()
                ->select(['localidad_id', 'desc_loc'])
                ->where(['mun_id'=> $cat_id])
                ->andWhere('loc_fuertes_id > 0 ')
                ->all();
            return $sections;
        }
        else{
            return [];
        }

    }

    public static function getLocOk(){
        if(Yii::$app->user->identity->role == 30){
            $loc = self::find()
                ->select(['localidad_id', 'desc_loc'])
                ->where(['>','loc_fuertes_id',0])
                ->orderBy('desc_loc')
                ->all();
        }else{
            $loc = self::find()
                ->select(['localidad_id', 'desc_loc'])
                ->andWhere(['region_id' => Yii::$app->user->identity->region_id ])
                ->orderBy(['desc_loc' => 'DESC'])
                ->all();
        }

        return $loc;
    }
}
