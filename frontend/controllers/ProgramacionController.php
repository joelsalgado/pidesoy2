<?php

namespace frontend\controllers;

use common\models\Programacion2;
use Yii;
use common\models\Programacion;
use common\models\ProgramacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

class ProgramacionController extends Controller
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

    /**
     * Lists all Programacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgramacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programacion model.
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
     * Creates a new Programacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Programacion();

        if ($model->load(Yii::$app->request->post())) {
            $mes = Yii::$app->formatter->asDate($model->fecha, 'MM');
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->status = 1;
            $model->mes = $mes;
            $model->periodo = '2018';
            if($model->save()) {
                return $this->redirect(['programacion2/index', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model){
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
            if ($model->load(Yii::$app->request->post())) {
                $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
                if ($model->save()) {
                    return $this->redirect(['programacion2/index', 'id' => $model->id]);
                }
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Programacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model= Programacion::findOne($id);

        if ($model){
            $model2 = Programacion2::find()->where(['programacion_id' => $id])->all();
            if ($model2){
                foreach ($model2 as $value){
                    $value->delete();
                }

            }
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    public function actionPdf($id)
    {
        $model = Programacion::findOne($id);
        if ($model){
            $model2 = Programacion2::find()->where(['programacion_id' => $id])->all();

            $content = $this->renderPartial('_reportView', [
                'model'=> $model,
                'model2' => $model2,
            ]);

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_LEGAL,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'programacion'.$model->id.'.pdf',
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
                                    <img src="'.Yii::$app->homeUrl.'images/footer.png" height="20" width="1265"> 
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

    protected function findModel($id)
    {
        if (($model = Programacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
