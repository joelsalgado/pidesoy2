<?php

namespace frontend\controllers;

use common\models\Apartados;
use common\models\CedulaPobreza;
use common\models\Solicitantes;
use Yii;
use common\models\CedulaPs;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CedulaPsController implements the CRUD actions for CedulaPs model.
 */
class CedulaPsController extends Controller
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
        try {
            $model2 = CedulaPobreza::find()->where(['solicitante_id' => $id])->one();

        } catch (Exception $exception) {
            $model2 = null;
        }
        if ($model2) {
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            $count = CedulaPs::find()
                ->where(['cedula_id' => $model2->id])
                ->count();
            if ($model2->programa_desarrollo_social == 1){
                $dataProvider = new ActiveDataProvider([
                    'query' => CedulaPs::find()->where(['cedula_id' => $id]),
                ]);

                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'id' => $model2->id,
                    'num' => $model2->num_personas,
                    'total' => $count,
                    'apartado' => $apartado
                ]);
            }
            else{
                return Yii::$app->getResponse()->redirect(Url::to(['/documentos/update', 'id' => $id]));
            }
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
        $count = CedulaPs::find()
            ->where(['cedula_id' => $id])
            ->count();
        $cedula = CedulaPobreza::findOne($id);

        if($cedula->num_personas > $count){
            $model = new CedulaPs();
            $apartado = Apartados::find()->where(['solicitante_id' => $cedula->solicitante_id])->one();
            $solicitantes= Solicitantes::findOne($cedula->solicitante_id);
            if ($model->load(Yii::$app->request->post())) {
                $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
                $model->nombre_recibe_programa = trim(strtoupper($model->nombre_recibe_programa));
                $model->titular = trim(strtoupper($model->titular));
                $apartado->apartado4 = 1;
                $apartado->updated_at = $fecha;
                $model->cedula_id = $id;
                $solicitantes->check = 0;

                if($model->save() && $apartado->save() && $solicitantes->save()){
                    return $this->redirect(['index', 'id' => $id]);
                }
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else{
            throw new \yii\web\NotFoundHttpException('Ya no puedes agregar a mas');
        }


    }

    /**
     * Updates an existing CedulaPs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->nombre_recibe_programa = trim(strtoupper($model->nombre_recibe_programa));
            $model->titular = trim(strtoupper($model->titular));
            $solicitantes= Solicitantes::findOne($model->cedula->solicitante_id);
            $solicitantes->check = 0;
            if($model->save() && $solicitantes->save()){
                return $this->redirect(['index', 'id' => $model->cedula_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CedulaPs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $other_cedula = CedulaPs::findOne($id);

        $solicitantes= Solicitantes::findOne($other_cedula->cedula->solicitante_id);
        $solicitantes->check = 0;
        if ($this->findModel($id)->delete() && $solicitantes->save()){
            return $this->redirect(['index', 'id' => $other_cedula->cedula_id]);
        }

    }

    /**
     * Finds the CedulaPs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CedulaPs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CedulaPs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
