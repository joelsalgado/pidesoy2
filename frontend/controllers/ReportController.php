<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:17 AM
 */

namespace frontend\controllers;

use common\models\LocDesg;
use common\models\MunDesg;
use common\models\RegDesg;
use common\models\TotalReg;
use Yii;
use common\models\User as Usuarios;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class ReportController extends Controller
{
    /**
     * @inheritdoc
     */
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
                            $valid_roles = [Usuarios::ROLE_ADMIN];
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

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = TotalReg::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionRegion()
    {
        $model = RegDesg::find()->all();
        return $this->render('region', [
            'model' => $model,
        ]);
    }

    public function actionMunicipio()
    {
        $model = MunDesg::find()->all();
        return $this->render('municipio', [
            'model' => $model,
        ]);
    }

    public function actionLocalidad()
    {
        $model = LocDesg::find()->all();
        return $this->render('localidad', [
            'model' => $model,
        ]);
    }

    public function actionTotal()
    {
        $model = TotalReg::find()->all();
        return $this->render('total', [
            'model' => $model,
        ]);
    }
}
