<?php

namespace frontend\controllers;

use Yii;
use common\models\Informes;
use common\models\InformesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InformesController implements the CRUD actions for Informes model.
 */
class InformesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Informes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InformesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Informes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Informes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Informes();

        if ($model->load(Yii::$app->request->post())) {

            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->status = 1;

            if($model->save()){
                return $this->redirect(['index']);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Informes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model){
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
            if ($model->load(Yii::$app->request->post())) {
                $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
                if($model->save()){
                    return $this->redirect(['index']);
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Informes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Informes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Informes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Informes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
