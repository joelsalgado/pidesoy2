<?php


namespace frontend\modules\api\controllers;

use common\models\Apilocalidades;
use common\models\Apiregiones;
use common\models\Localidades;
use Yii;
use yii\db\ActiveRecord;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class ApiController extends ActiveController
{

    public $modelClass = '';


    public function behaviors()
    {
        $result = ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'mapa1' => ['get'],
                    'mapa2' => ['get'],
                    'mapa3' => ['get'],
                    'cedis' => ['get'],

                ],
            ],
        ]);
        return $result;
    }

    public function actions()
    {
        return [];
    }

    

    public function actionMapa1(){
        $mapa = Apiregiones::find()->all();

        if (!is_null($mapa)) {
            $i =1;
            foreach ($mapa as $value){
                $array [] =  [
                    'GID' => $i++,
                    'Region' => $value->Region,
                    'Mun' => $value->Mun,
                    'pobreza_extrema' => $value->pobreza_extrema,
                    'pobreza_moderada' => $value->pobreza_moderada,
                    'vulnerable_por_ingresos' => $value->vulnerable_por_ingresos,
                    'vulnerable_por_carencias' => $value->vulnerable_por_carencias,
                    'no_vulnerable' => $value->no_vulnerable,
                ];
            }
            return array('status' => true, 'data'=> $array);
        } else {
            return new NotFoundHttpException();
        }
    }

    public function actionMapa2(){
        $mapa = Apilocalidades::find()->all();

        if (!is_null($mapa)) {
            $i =1;
            foreach ($mapa as $value){
                $array [] =  [
                    'GID' => $i++,
                    'Region' => $value->Region,
                    'Mun' => $value->Mun,
                    'Loc' => $value->Loc,
                    'localidad_id' => '15'.$value->localidad_id,
                    'pobreza_extrema' => $value->pobreza_extrema,
                    'pobreza_moderada' => $value->pobreza_moderada,
                    'vulnerable_por_ingresos' => $value->vulnerable_por_ingresos,
                    'vulnerable_por_carencias' => $value->vulnerable_por_carencias,
                    'no_vulnerable' => $value->no_vulnerable,
                ];
            }
            return array('status' => true, 'data'=> $array);
        } else {
            return new NotFoundHttpException();
        }
    }

    public function actionMapa3(){
        $mapa = Apilocalidades::find()->where(["localidad_id" => "380007"])
            ->orWhere(['localidad_id' => '510078'])
            ->orWhere(['localidad_id' => '560026'])
            ->orWhere(['localidad_id' => '780008'])
            ->orWhere(['localidad_id' => '800003'])
            ->orWhere(['localidad_id' => '900057'])
            ->orWhere(['localidad_id' => '1050224'])
            ->orWhere(['localidad_id' => '1180120'])
            ->orWhere(['localidad_id' => '1230065'])
            ->orWhere(['localidad_id' => '1240101'])
            ->all();
        if (!is_null($mapa)) {
            $i =1;
            foreach ($mapa as $value){
                $array [] =  [
                    'GID' => $i++,
                    'Region' => $value->Region,
                    'Mun' => $value->Mun,
                    'Loc' => $value->Loc,
                    'localidad_id' => '15'.$value->localidad_id,
                    'pobreza_extrema' => $value->pobreza_extrema,
                    'pobreza_moderada' => $value->pobreza_moderada,
                    'vulnerable_por_ingresos' => $value->vulnerable_por_ingresos,
                    'vulnerable_por_carencias' => $value->vulnerable_por_carencias,
                    'no_vulnerable' => $value->no_vulnerable,
                ];
            }
            return array('status' => true, 'data'=> $array);
        } else {
            return new NotFoundHttpException();
        }
    }


}