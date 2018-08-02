<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 06/06/2018
 * Time: 05:17 PM
 */
namespace frontend\controllers;

use common\models\User as Usuarios;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class DocsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'region', 'municipio', 'localidad', 'total'],
                'rules' => [
                    [
                        'actions' => ['index', 'region', 'municipio', 'localidad', 'total'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = [Usuarios::ROLE_ADMIN, Usuarios::ROLE_DEP];
                            return Usuarios::roleInArray($valid_roles);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}