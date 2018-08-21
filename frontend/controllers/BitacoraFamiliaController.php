<?php

namespace frontend\controllers;

use common\models\BitacoraFamilia2;
use common\models\BitacoraFamiliaSearch;
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
        $searchModel = new BitacoraFamiliaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
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
            $mes = Yii::$app->formatter->asDate($model->fecha, 'MM');
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->status = 1;
            $model->mes = $mes;
            $model->periodo = '2018';
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
                'marginTop'=> 22,
                'marginBottom'=> 13,
                'marginHeader'=> 5,
                'orientation' => Pdf::ORIENT_LANDSCAPE,
                'options' => [
                    'title' => 'Bitacora de Reuniones'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'methods' => [
                    'SetHeader' => [
                        '
                            <table class="table table-condensed">
                                <tr>
                                    <td >
                                        <img class="rounded float-left" src="'.Yii::$app->homeUrl.'images/escudo.png"  height="40" width="160">
                                    </td>
                                    <td align="center">
                            
                                    </td>
                                    <td align="right">
                                        <img style="text-align:right" src="'.Yii::$app->homeUrl.'images/edomex1.png" height="35" width="200">
                                    </td>
                                </tr>
                            </table>
                        
                        ', 'line' => 1
                    ],
                    'SetFooter' => ['
                        <table width="100%">
                            <tr>
                                <td width="25%"></td>
                                <td width="50%" align="center"><p style="font-size: 5pt">{PAGENO}/{nbpg}</p></td>                            
                                <td width="25%" align="right">
                                    <p style="font-size: 5pt">Elaboró: CIEPS &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Revisó: UDITI </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" width="100%">
                                    <img src="'.Yii::$app->homeUrl.'images/footer.png" height="20" width="1045"> 
                                </td>
                            </tr>
                        </table>'
                    ],
                ]
            ]);
            return $pdf->render();
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }
    }
}
