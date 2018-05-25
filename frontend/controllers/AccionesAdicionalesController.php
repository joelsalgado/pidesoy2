<?php

namespace frontend\controllers;

use common\models\Apartados;
use common\models\Solicitantes;
use Yii;
use common\models\AccionesAdicionales;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccionesAdicionalesController implements the CRUD actions for AccionesAdicionales model.
 */
class AccionesAdicionalesController extends Controller
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
     * Lists all AccionesAdicionales models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        try {
            $model2 = Solicitantes::findOne($id);

        } catch (Exception $exception) {
            $model2 = null;
        }

        if($model2){
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            $dataProvider = new ActiveDataProvider([
                'query' => AccionesAdicionales::find()->where(['solicitante_id' => $id]),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'id' => $id,
                'apartado' => $apartado
            ]);
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }
    }

    /**
     * Displays a single AccionesAdicionales model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate($id)
    {
        try {
            $model2 = Solicitantes::findOne($id);

        } catch (Exception $exception) {
            $model2 = null;
        }

        if($model2) {

            $model = new AccionesAdicionales();
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            $solicitantes= Solicitantes::findOne($id);

            if ($model->load(Yii::$app->request->post())) {
                $model->solicitante_id = $id;
                $model->periodo = 2018;
                $model->status = 1;
                $model->nombre_accion = trim(strtoupper($model->nombre_accion));
                $model->programa = trim(strtoupper($model->programa));
                $model->responsable = trim(strtoupper($model->responsable));
                $model->acciones_pendientes = $model->meta - $model->acciones;
                $model->fecha_inicio = ($model->fecha_inicio) ? Yii::$app->formatter->asDate($model->fecha_inicio, 'yyyy-MM-dd') : null;
                $model->fecha_entrega = ($model->fecha_entrega) ? Yii::$app->formatter->asDate($model->fecha_entrega, 'yyyy-MM-dd') : null;
                $model->fecha_termino = ($model->fecha_termino) ? Yii::$app->formatter->asDate($model->fecha_termino, 'yyyy-MM-dd') : null;

                $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
                $apartado->apartado6 = 1;
                $apartado->updated_at = $fecha;
                $solicitantes->check = 0;

                if ($model->save() && $apartado->save()  && $solicitantes->save()) {
                    return $this->redirect(['index', 'id' => $model->solicitante_id]);
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


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model){
            $solicitantes= Solicitantes::findOne($model->solicitante_id);
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
                $solicitantes->check = 0;

                if($model->save() && $solicitantes->save()){
                    return $this->redirect(['index', 'id' => $model->solicitante_id]);
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }
    }

    public function actionDelete($id)
    {
        $adicional = AccionesAdicionales::findOne($id);
        $solicitantes= Solicitantes::findOne($adicional->solicitante_id);
        $solicitantes->check = 0;

        if($this->findModel($id)->delete() && $solicitantes->save()){
            return $this->redirect(['index', 'id' => $adicional->solicitante_id]);
        }

    }

    public function actionFinalizar()
    {
        Yii::$app->session->setFlash('success', 'Registro Finalizado Correctamente');
        return $this->redirect(['solicitantes/index']);
    }

    protected function findModel($id)
    {
        if (($model = AccionesAdicionales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
