<?php

namespace frontend\controllers;

use Yii;
use common\models\FichaTecnica;
use common\models\FichaTecnicaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FichaTecnicaController implements the CRUD actions for FichaTecnica model.
 */
class FichaTecnicaController extends Controller
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
     * Lists all FichaTecnica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FichaTecnicaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FichaTecnica model.
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
     * Creates a new FichaTecnica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FichaTecnica();

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
     * Updates an existing FichaTecnica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model){
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
     * Deletes an existing FichaTecnica model.
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
     * Finds the FichaTecnica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FichaTecnica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FichaTecnica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}