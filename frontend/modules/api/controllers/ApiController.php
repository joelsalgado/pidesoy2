<?php


namespace frontend\modules\api\controllers;

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
                    'Mun' => $value->Mun,
                    'Region' => $value->Region,
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