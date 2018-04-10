<?php

namespace frontend\controllers;

use Yii;
use common\models\ActividadesRelevantes;
use common\models\ActividadesRelevantesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ActividadesRelevantesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete', 'view'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ActividadesRelevantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        die;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new ActividadesRelevantes();

        if ($model->load(Yii::$app->request->post())) {
            $fecha_nac =  Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
            $model->fecha = $fecha_nac;
            $model->status = 1;
            $model->created_at = $fecha;
            $model->updated_at = $fecha;
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Se guardo correctamente');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
        if ($model->load(Yii::$app->request->post())) {
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
            $fecha_nac =  Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');

            $model->fecha = $fecha_nac;
            $model->updated_at = $fecha;
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Se actualizo correctamente');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = ActividadesRelevantes::findOne($id);
        $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
        $model->status =0;
        $model->updated_at = $fecha;
        if($model->save()){
            Yii::$app->session->setFlash('error', 'Se borro correctamente');
            return $this->redirect(['index']);
        }
    }

    protected function findModel($id)
    {
        if (($model = ActividadesRelevantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
