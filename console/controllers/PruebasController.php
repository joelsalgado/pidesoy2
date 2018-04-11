<?php

/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 02/04/2018
 * Time: 06:24 PM
 */

namespace console\controllers;

ini_set('max_execution_time', "0");
ini_set("memory_limit", "-1");

use common\models\CedulaPobreza;
use Yii;
use yii\console\Controller;
use yii\helpers\Json;


class PruebasController extends Controller
{
    public function actionIndex()
    {
        DIE;
        $cedulas = CedulaPobreza::find()->all();

        foreach ($cedulas as $data){
            $data->excusado = null;
            if($data->save(false)){
                echo "bien ".$data->id;
            }
        }die;
    }
}