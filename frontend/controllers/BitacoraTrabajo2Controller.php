<?php

namespace frontend\controllers;

use common\models\BitacoraFamilia2;
use common\models\BitacoraTrabajo;
use Yii;
use common\models\BitacoraTrabajo2;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class BitacoraTrabajo2Controller extends Controller
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
            $model2 = BitacoraTrabajo::findOne($id);
        }
        catch (Exception $exception){
            $model2 = null;
        }
        if ($model2){
            $dataProvider = new ActiveDataProvider([
                'query' => BitacoraTrabajo2::find()->where(['bitacora_trabajo_id' => $id]),
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


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate($id)
    {
        $model = new BitacoraTrabajo2();

        if ($model->load(Yii::$app->request->post())) {
            $model->fechas = Yii::$app->formatter->asDate($model->fechas, 'yyyy-MM-dd');
            $model->bitacora_trabajo_id = $id;
            $model->status = 1;
            if($model->save()){
                return $this->redirect(['index', 'id' => $id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model){
            $model->fechas = Yii::$app->formatter->asDate($model->fechas, 'dd-MM-yyyy');
            if ($model->load(Yii::$app->request->post())) {
                $model->fechas = Yii::$app->formatter->asDate($model->fechas, 'yyyy-MM-dd');
                if($model->save()){
                    return $this->redirect(['index', 'id' => $model->bitacora_trabajo_id]);
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {

        $bitacora = BitacoraTrabajo2::findOne($id);
        if ($bitacora){
            $this->findModel($id)->delete();
            return $this->redirect(['index', 'id' => $bitacora->bitacora_trabajo_id]);
        }
    }

    protected function findModel($id)
    {
        if (($model = BitacoraTrabajo2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
