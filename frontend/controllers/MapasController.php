<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:17 AM
 */

namespace frontend\controllers;

use common\models\LocDesg;
use common\models\LocTot;
use common\models\MunDesg;
use common\models\MunTot;
use common\models\RegDesg;
use common\models\RegTot;
use common\models\TotalReg;
use kartik\mpdf\Pdf;
use Yii;
use common\models\User as Usuarios;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class MapasController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'region', 'municipio', 'localidad', 'prioritarias', 'dinamico'],
                'rules' => [
                    [
                        'actions' => ['index', 'region', 'municipio', 'localidad', 'prioritarias', 'dinamico'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegion()
    {
        return $this->render('region');
    }

    public function actionMunicipio()
    {
        return $this->render('municipio');
    }

    public function actionLocalidad()
    {
        return $this->render('localidad');
    }

    public function actionPrioritarias()
    {
        return $this->render('prioritarias');
    }

    public function actionDinamico()
    {
        return $this->render('dinamico');
    }


}
