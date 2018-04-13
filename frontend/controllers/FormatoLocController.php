<?php

namespace frontend\controllers;

use common\models\ActividadesRelevantes;
use common\models\Cabildo;
use common\models\DirectoresMunicipales;
use kartik\mpdf\Pdf;
use Yii;
use common\models\FormatoLoc;
use common\models\FormatoLocSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormatoLocController implements the CRUD actions for FormatoLoc model.
 */
class FormatoLocController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete', 'view'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new FormatoLocSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        die;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FormatoLoc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FormatoLoc();

        if ($model->load(Yii::$app->request->post())) {
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
            $model->status = 1;
            $model->created_at = $fecha;
            $model->updated_at = $fecha;
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Se guardo correctamente');
                return $this->redirect(['/cabildo', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FormatoLoc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
            $model->updated_at = $fecha;
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Se actualizo correctamente');
                return $this->redirect(['/cabildo', 'id' => $id]);
            }

        }

        return $this->render('update', [
            'model' => $model,
            'id' => $id
        ]);
    }

    /**
     * Deletes an existing FormatoLoc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = FormatoLoc::findOne($id);
        $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
        $model->status =0;
        $model->updated_at = $fecha;
        if($model->save()){
            Yii::$app->session->setFlash('error', 'Se borro correctamente');
            return $this->redirect(['index']);
        }

    }

    public function actionFormato($id)
    {
        $model = FormatoLoc::find()->where(['id' => $id])->one();

        if ($model){
            $cabildo = Cabildo::find()->where(['formato_id' => $id])->all();
            $directores = DirectoresMunicipales::find()->where(['formato_id' => $id])->all();
            $actividades = ActividadesRelevantes::find()->where(['loc_id' => $model->loc_id, 'status' => 1])->all();

            if($cabildo){
                $cab = $cabildo;
            }else{
                $cab = null;
            }

            if ($directores){
                $dir = $directores;
            }else{
                $dir = null;
            }

            if($actividades){
                $act = $actividades;
            }
            else{
                $act = null;
            }

            $content = $this->renderPartial('_reportView', [
                'model'=> $model,
                'cabildo' => $cab,
                'directores' => $dir,
                'actividades' => $act
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'formato '.$model->id.'.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Formato'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            ]);
            return $pdf->render();
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }
    }

    /**
     * Finds the FormatoLoc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormatoLoc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormatoLoc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
