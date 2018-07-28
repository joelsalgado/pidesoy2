<?php

namespace frontend\controllers;

use common\models\Apartados;
use Yii;
use common\models\Censo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CensoController implements the CRUD actions for Censo model.
 */
class CensoController extends Controller
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
     * Lists all Censo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Censo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Censo model.
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
     * Creates a new Censo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Censo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Censo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {


        $model = Censo::find()->where(['solicitante_id' => $id])->one();

        if($model) {
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): null;
            if ($model->load(Yii::$app->request->post())) {
                $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
                $apartado->apartado7 = 1;
                $apartado->updated_at = $fecha;
                $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd'): null;
                if($model->save() && $apartado->save()){
                    return $this->redirect(['cedula-ps/index', 'id' => $id]);
                }

            }

            return $this->render('update', [
                'model' => $model,
                'apartado' => $apartado
            ]);
        }

    }

    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Censo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Censo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Censo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
