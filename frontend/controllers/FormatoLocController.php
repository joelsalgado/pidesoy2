<?php

namespace frontend\controllers;

use Yii;
use common\models\FormatoLoc;
use common\models\FormatoLocSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormatoLocController implements the CRUD actions for FormatoLoc model.
 */
class FormatoLocController extends Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all FormatoLoc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormatoLocSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormatoLoc model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        die;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FormatoLoc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FormatoLoc();

        if ($model->load(Yii::$app->request->post())) {
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
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

    /**
     * Updates an existing FormatoLoc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
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

    /**
     * Deletes an existing FormatoLoc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = FormatoLoc::findOne($id);
        $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
        $model->status =0;
        $model->updated_at = $fecha;
        if($model->save()){
            Yii::$app->session->setFlash('error', 'Se borro correctamente');
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the FormatoLoc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormatoLoc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormatoLoc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
