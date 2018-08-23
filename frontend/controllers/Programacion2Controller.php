<?php

namespace frontend\controllers;

use common\models\Programacion;
use Yii;
use common\models\Programacion2;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Programacion2Controller implements the CRUD actions for Programacion2 model.
 */
class Programacion2Controller extends Controller
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
     * Lists all Programacion2 models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        try{
            $model2 = Programacion::findOne($id);
        }
        catch (Exception $exception){
            $model2 = null;
        }
        if ($model2) {
            $dataProvider = new ActiveDataProvider([
                'query' => Programacion2::find()->where(['programacion_id' => $id]),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'id' => $id
            ]);
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }
    }

    /**
     * Displays a single Programacion2 model.
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
     * Creates a new Programacion2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Programacion2();

        if ($model->load(Yii::$app->request->post())) {
            $model->fecha_inicio = Yii::$app->formatter->asDate($model->fecha_inicio, 'yyyy-MM-dd');
            $model->fecha_termino = Yii::$app->formatter->asDate($model->fecha_termino, 'yyyy-MM-dd');
            $model->programacion_id = $id;
            $model->status = 1;
            if($model->save()) {
                return $this->redirect(['index', 'id' => $id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programacion2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model) {
            $model->fecha_inicio = Yii::$app->formatter->asDate($model->fecha_inicio, 'dd-MM-yyyy');
            $model->fecha_termino = Yii::$app->formatter->asDate($model->fecha_termino, 'dd-MM-yyyy');
            if ($model->load(Yii::$app->request->post())) {
                $model->fecha_inicio = Yii::$app->formatter->asDate($model->fecha_inicio, 'yyyy-MM-dd');
                $model->fecha_termino = Yii::$app->formatter->asDate($model->fecha_termino, 'yyyy-MM-dd');
                if($model->save()) {
                    return $this->redirect(['index', 'id' => $model->programacion_id]);
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Programacion2 model.
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
     * Finds the Programacion2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Programacion2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Programacion2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
