<?php

namespace frontend\controllers;

use common\models\BitacoraReunion;
use Yii;
use common\models\BitacoraReunion2;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BitacoraReunion2Controller implements the CRUD actions for BitacoraReunion2 model.
 */
class BitacoraReunion2Controller extends Controller
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


    public function actionIndex($id)
    {

        try{
            $model2 = BitacoraReunion::findOne($id);
        }
        catch (Exception $exception){
            $model2 = null;
        }
        if ($model2){
            $dataProvider = new ActiveDataProvider([
                'query' => BitacoraReunion2::find()->where(['bitacora_reunion_id' => $id]),
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
        $model = new BitacoraReunion2();

        if ($model->load(Yii::$app->request->post())) {
            $model->fechas = Yii::$app->formatter->asDate($model->fechas, 'yyyy-MM-dd');
            $model->bitacora_reunion_id = $id;
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
                    return $this->redirect(['index', 'id' => $model->bitacora_reunion_id]);
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }


    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = BitacoraReunion2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
