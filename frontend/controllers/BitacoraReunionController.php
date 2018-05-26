<?php

namespace frontend\controllers;

use Yii;
use common\models\BitacoraReunion;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BitacoraReunionController implements the CRUD actions for BitacoraReunion model.
 */
class BitacoraReunionController extends Controller
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

    public function actionIndex()
    {
        if (Yii::$app->user->identity->role == 10 || Yii::$app->user->identity->role == 20) {
            $region = Yii::$app->user->identity->region_id;
            $query = BitacoraReunion::find()->where(['region_id' => $region]);
        }else{
            $query = BitacoraReunion::find();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new BitacoraReunion();

        if ($model->load(Yii::$app->request->post())) {
            $model->resp_institucional = trim(strtoupper($model->resp_institucional));
            $model->resp_comunitario = trim(strtoupper($model->resp_comunitario));
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->status = 1;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
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
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
            if ($model->load(Yii::$app->request->post())) {
                $model->resp_institucional = trim(strtoupper($model->resp_institucional));
                $model->resp_comunitario = trim(strtoupper($model->resp_comunitario));
                $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
                if($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
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
        if (($model = BitacoraReunion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
