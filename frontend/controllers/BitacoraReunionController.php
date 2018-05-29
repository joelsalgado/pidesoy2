<?php

namespace frontend\controllers;

use common\models\BitacoraReunion2;
use kartik\mpdf\Pdf;
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
                    'delete' => ['GET'],
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

    public function actionPdf($id)
    {
        $model = BitacoraReunion::findOne($id);
        if ($model){
            $model2 = BitacoraReunion2::find()->where(['bitacora_reunion_id' => $id])->all();

            $content = $this->renderPartial('_reportView', [
                'model'=> $model,
                'model2' => $model2,
            ]);

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'bitacora-reunion '.$model->id.'.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Bitacora de Reuniones'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'methods' => [
                    'SetFooter' => ['|Pagina {PAGENO}|'],
                ]
            ]);
            return $pdf->render();
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }
    }
}
