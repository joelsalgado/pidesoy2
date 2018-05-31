<?php

namespace frontend\controllers;

use common\models\BitacoraFamilia2;
use kartik\mpdf\Pdf;
use Yii;
use common\models\BitacoraFamilia;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class BitacoraFamiliaController extends Controller
{
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
            $query = BitacoraFamilia::find()->where(['region_id' => $region]);
        }else{
            $query = BitacoraFamilia::find();
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
        $model = new BitacoraFamilia();

        if ($model->load(Yii::$app->request->post())) {
            $model->resp_institucional = trim(strtoupper($model->resp_institucional));
            $model->resp_comunitario = trim(strtoupper($model->resp_comunitario));
            $model->familia = trim(strtoupper($model->familia));
            $model->domicilio = trim(strtoupper($model->domicilio));
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->status = 1;
            if($model->save()){
                return $this->redirect(['/bitacora-familia2', 'id' => $model->id]);
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
                $model->familia = trim(strtoupper($model->familia));
                $model->domicilio = trim(strtoupper($model->domicilio));
                $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
                if($model->save()) {
                    return $this->redirect(['/bitacora-familia2', 'id' => $model->id]);
                }
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $bitacora = BitacoraFamilia::findOne($id);
        if ($bitacora){
            $bitacora2 = BitacoraFamilia2::find()->where(['bitacora_familia_id' => $id])->all();
            if($bitacora2){
                foreach ($bitacora2 as $value){
                    $value->delete();
                }
            }
            $this->findModel($id)->delete();
        }


        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = BitacoraFamilia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPdf($id)
    {
        $model = BitacoraFamilia::findOne($id);
        if ($model){
            $model2 = BitacoraFamilia2::find()->where(['bitacora_familia_id' => $id])->all();

            $content = $this->renderPartial('_reportView', [
                'model'=> $model,
                'model2' => $model2,
            ]);

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'bitacora-familia '.$model->id.'.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Bitacora de Trabajo por Familia'
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
