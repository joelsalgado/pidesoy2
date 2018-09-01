<?php

namespace frontend\controllers;

use common\models\FichaTecnica;
use Yii;
use common\models\AccionesComunitarias;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccionesComunitariasController implements the CRUD actions for AccionesComunitarias model.
 */
class AccionesComunitariasController extends Controller
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
     * Lists all AccionesComunitarias models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        try{
            $model2 = FichaTecnica::findOne($id);
        }
        catch (Exception $exception){
            $model2 = null;
        }
        if ($model2) {
            $dataProvider = new ActiveDataProvider([
                'query' => AccionesComunitarias::find()->where(['ficha_id' => $id]),
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
     * Displays a single AccionesComunitarias model.
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
     * Creates a new AccionesComunitarias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        try {
            $model2 = FichaTecnica::findOne($id);

        } catch (Exception $exception) {
            $model2 = null;
        }

        if($model2) {
            $model = new AccionesComunitarias();

            if ($model->load(Yii::$app->request->post())) {
                $model->ficha_id = $id;
                $model->loc_id = $model2->loc_id;

                $model->status = 1;
                $model->nombre_accion = trim(strtoupper($model->nombre_accion));
                $model->programa = trim(strtoupper($model->programa));
                $model->responsable = trim(strtoupper($model->responsable));
                $model->acciones_pendientes = $model->meta - $model->acciones;
                $model->fecha_inicio = ($model->fecha_inicio) ? Yii::$app->formatter->asDate($model->fecha_inicio, 'yyyy-MM-dd') : null;
                $model->fecha_entrega = ($model->fecha_entrega) ? Yii::$app->formatter->asDate($model->fecha_entrega, 'yyyy-MM-dd') : null;
                $model->fecha_termino = ($model->fecha_termino) ? Yii::$app->formatter->asDate($model->fecha_termino, 'yyyy-MM-dd') : null;

                if($model->save()){
                    return $this->redirect(['index', 'id' => $model->ficha_id]);
                }

            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }

    }



    /**
     * Updates an existing AccionesComunitarias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model){
            $model->fecha_inicio = ($model->fecha_inicio)? Yii::$app->formatter->asDate($model->fecha_inicio, 'dd-MM-yyyy'): null;
            $model->fecha_entrega = ($model->fecha_entrega)? Yii::$app->formatter->asDate($model->fecha_entrega, 'dd-MM-yyyy'): null;
            $model->fecha_termino = ($model->fecha_termino)? Yii::$app->formatter->asDate($model->fecha_termino, 'dd-MM-yyyy'): null;
            if ($model->load(Yii::$app->request->post())) {
                $model->nombre_accion = trim(strtoupper($model->nombre_accion));
                $model->programa = trim(strtoupper($model->programa));
                $model->responsable = trim(strtoupper($model->responsable));
                $model->acciones_pendientes = $model->meta - $model->acciones;
                $model->fecha_inicio = ($model->fecha_inicio)? Yii::$app->formatter->asDate($model->fecha_inicio, 'yyyy-MM-dd'): null;
                $model->fecha_entrega = ($model->fecha_entrega)? Yii::$app->formatter->asDate($model->fecha_entrega, 'yyyy-MM-dd'): null;
                $model->fecha_termino = ($model->fecha_termino)? Yii::$app->formatter->asDate($model->fecha_termino, 'yyyy-MM-dd'): null;
                if($model->save()){
                    return $this->redirect(['index', 'id' => $model->ficha_id]);
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    public function actionDelete($id)
    {
        $comunitarias = AccionesComunitarias::findOne($id);
        if($comunitarias){
            $this->findModel($id)->delete();

            return $this->redirect(['index', 'id' => $comunitarias->ficha_id]);
        }

    }

    public function actionFinalizar()
    {
        Yii::$app->session->setFlash('success', 'Registro Finalizado Correctamente');
        return $this->redirect(['ficha-tecnica/index']);
    }

    protected function findModel($id)
    {
        if (($model = AccionesComunitarias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
