<?php

namespace frontend\controllers;

use common\models\Apartados;
use common\models\CedulaPobreza;
use common\models\Solicitantes;
use Yii;
use common\models\Censo;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
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
    public function actionIndex($id)
    {
        try {
            $model2 = Solicitantes::findOne($id);

        } catch (Exception $exception) {
            $model2 = null;
        }
        if ($model2) {
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            $dataProvider = new ActiveDataProvider([
                'query' => Censo::find()->where(['solicitante_id' => $id]),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'id' => $id,
                'apartado' => $apartado
            ]);
        }



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
    public function actionCreate($id)
    {
        try {
            $model2 = Solicitantes::findOne($id);

        } catch (Exception $exception) {
            $model2 = null;
        }

        if($model2) {
            $model = new Censo();
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();

            if ($model->load(Yii::$app->request->post())) {
                $model->solicitante_id = $id;
                $model->periodo = 2018;
                $model->status = 1;
                $model->nombre = trim(strtoupper($model->nombre));
                $model->apellido_paterno = trim(strtoupper($model->apellido_paterno));
                $model->apellido_materno = trim(strtoupper($model->apellido_materno));
                $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd'): null;
                $model->fecha_nacimiento = ($model->fecha_nacimiento)? Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd'): null;

                $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
                $apartado->apartado7 = 1;
                $apartado->updated_at = $fecha;
                $model2->check = 0;

                if($model->save()  && $apartado->save()  && $model2->save()){
                    return $this->redirect(['index', 'id' => $model->solicitante_id]);
                }

            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }



    }

    /**
     * Updates an existing Censo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model) {
            $solicitantes= Solicitantes::findOne($model->solicitante_id);
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy'): null;
            $model->fecha_nacimiento = ($model->fecha_nacimiento)? Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd-MM-yyyy'): null;
            if ($model->load(Yii::$app->request->post())) {
                $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
                $apartado->apartado7 = 1;
                $apartado->updated_at = $fecha;
                $model->nombre = trim(strtoupper($model->nombre));
                $model->apellido_paterno = trim(strtoupper($model->apellido_paterno));
                $model->apellido_materno = trim(strtoupper($model->apellido_materno));
                $model->fecha = ($model->fecha)? Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd'): null;
                $model->fecha_nacimiento = ($model->fecha_nacimiento)? Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd'): null;
                if($model->save() && $apartado->save() && $solicitantes->save()){
                    return $this->redirect(['censo/index', 'id' => $model->solicitante_id]);
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

        return $this->redirect(['index','id' => $id]);
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
