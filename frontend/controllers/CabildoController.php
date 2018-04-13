<?php

namespace frontend\controllers;

use common\models\FormatoLoc;
use Yii;
use common\models\Cabildo;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class CabildoController extends Controller
{

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


    public function actionIndex($id)
    {

        try{
            $model2 = FormatoLoc::findOne($id);
        }
        catch (Exception $exception){
            $model2 = null;
        }
        if($model2){
            $dataProvider = new ActiveDataProvider([
                'query' => Cabildo::find()->where(['formato_id' => $id]),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'id' => $id,
            ]);
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }


    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate($id)
    {
        $model = new Cabildo();

        if ($model->load(Yii::$app->request->post())) {
            $model->formato_id = $id;
            if($model->save()){
                return $this->redirect(['index', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cabildo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $id]);
    }

    /**
     * Finds the Cabildo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cabildo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cabildo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
