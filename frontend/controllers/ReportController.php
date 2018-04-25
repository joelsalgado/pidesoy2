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
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = RegDesg::find()
                ->where(['id' => $post_array['regiones']])
                ->all();
            return $this->render('region', [
                'model' => $model,
            ]);
        }
        else{
            return $this->render('reg');
        }
    }

    public function actionMunicipio()
    {
        if (Yii::$app->request->post()) {
            $post_array = Yii::$app->request->post();
            $model = MunDesg::find()
                ->where(['id' => $post_array['municipios']])
                ->all();
            return $this->render('municipio', [
                'model' => $model,
            ]);
        }else{
            return $this->render('mun');
        }
    }

    public function actionLocalidad()
    {
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = LocDesg::find()->where(['desc_loc' => $post_array['localidades']])->all();
            return $this->render('localidad', [
                'model' => $model,
            ]);
        }else{
            return $this->render('loc');
        }
    }

    public function actionTotal()
    {
        $model = TotalReg::find()->all();
        return $this->render('total', [
            'model' => $model,
        ]);
    }

    public function actionReg()
{
    return $this->render('reg');
}

    public function actionLoc()
    {
        return $this->render('loc');
    }

    public function actionMun()
    {
        return $this->render('mun');
    }

    public function actionRegtot()
    {
        return $this->render('regtot');
    }

    public function actionLoctot()
    {
        return $this->render('loctot');
    }

    public function actionMuntot()
    {
        return $this->render('muntot');
    }

    public function actionRegiontotal()
    {
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = RegTot::find()
                ->where(['id' => $post_array['regiones']])
                ->all();
            return $this->render('regiontotal', [
                'model' => $model,
                'excel' => $post_array['regiones']
            ]);
        }
        else{
            return $this->render('regtot');
        }
    }

    public function actionRegiontotalexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Resultados Regiones' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => RegTot::find()->where(['id' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_region',
                            'pobreza_extrema',
                            'pobreza_moderada',
                            'vulnerable_por_ingresos',    // Related attribute
                            'vulnerable_por_carencias',
                            'no_vulnerable',
                        ],
                    ]
                ]
            ]);
             return $file->send('result_reg.xlsx');
        }
        else{
            return $this->render('regtot');
        }
    }

    public function actionMunicipiototal()
    {
        if (Yii::$app->request->post()) {
            $post_array = Yii::$app->request->post();
            $model = MunTot::find()
                ->where(['id' => $post_array['municipios']])
                ->all();
            return $this->render('municipiototal', [
                'model' => $model,
                'excel' => $post_array['municipios']
            ]);
        }else{
            return $this->render('muntot');
        }
    }

    public function actionMunicipiototalexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Resultados Municipio' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => MunTot::find()->where(['id' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_mun',
                            'pobreza_extrema',
                            'pobreza_moderada',
                            'vulnerable_por_ingresos',    // Related attribute
                            'vulnerable_por_carencias',
                            'no_vulnerable',
                        ],
                    ]
                ]
            ]);
            return $file->send('result_mun.xlsx');
        }
        else{
            return $this->render('muntot');
        }
    }



    public function actionLocalidadtotal()
    {
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = LocTot::find()->where(['desc_loc' => $post_array['localidades']])->all();
            return $this->render('localidadtotal', [
                'model' => $model,
                'excel' => $post_array['localidades']
            ]);
        }else{
            return $this->render('loctot');
        }
    }

    public function actionLocalidadtotalexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Resultados Localidad' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => LocTot::find()->where(['desc_loc' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_loc',
                            'pobreza_extrema',
                            'pobreza_moderada',
                            'vulnerable_por_ingresos',    // Related attribute
                            'vulnerable_por_carencias',
                            'no_vulnerable',
                        ],
                    ]
                ]
            ]);
            return $file->send('result_loc.xlsx');
        }
        else{
            return $this->render('loctot');
        }
    }
}
