<?php

namespace frontend\controllers;

use common\models\AccionesComunitarias;
use common\models\FichaNecesidades;
use common\models\Instituciones;
use common\models\Lideres;
use Yii;
use common\models\FichaTecnica;
use common\models\FichaTecnicaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * FichaTecnicaController implements the CRUD actions for FichaTecnica model.
 */
class FichaTecnicaController extends Controller
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
     * Lists all FichaTecnica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FichaTecnicaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FichaTecnica model.
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
     * Creates a new FichaTecnica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FichaTecnica();

        if ($model->load(Yii::$app->request->post())) {
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->status = 1;
            if($model->save()){
                return $this->redirect(['/lideres', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FichaTecnica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model){
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
            if ($model->load(Yii::$app->request->post())) {
                $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
                if($model->save()){
                    return $this->redirect(['/lideres', 'id' => $model->id]);
                }

            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing FichaTecnica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $ficha = FichaTecnica::findOne($id);
        if($ficha){
            $lideres = Lideres::find()->where(['ficha_id' => $id])->all();
            if($lideres){
                foreach ($lideres as $value){
                    $value->delete();
                }
            }
            $instituciones = Instituciones::find()->where(['ficha_id' => $id])->all();
            if($instituciones){
                foreach ($instituciones as $value){
                    $value->delete();
                }
            }

            $necesidades = FichaNecesidades::find()->where(['ficha_id' => $id])->one();
            if($necesidades){
                $necesidades->delete();
            }

            $comunitarias = AccionesComunitarias::find()->where(['ficha_id' => $id])->all();
            if($comunitarias){
                foreach ($comunitarias as $value){
                    $value->delete();
                }
            }

            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the FichaTecnica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FichaTecnica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FichaTecnica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPdf($id)
    {
        $model = FichaTecnica::findOne($id);
        if ($model){
            $model2 = Lideres::find()->where(['ficha_id' => $id])->all();
            $model3 = Instituciones::find()->where(['ficha_id' => $id])->all();
            $model4 = FichaNecesidades::find()->where(['ficha_id' => $id])->one();
            $model5 = AccionesComunitarias::find()->where(['ficha_id' => $id])->all();
            $query = AccionesComunitarias::find()
                ->select(['nombre_accion',
                    'sum((case when (meta > 0) then meta else 0 end)) AS meta',
                    'sum((case when (acciones > 0) then acciones else 0 end)) AS acciones'
                ])
                ->where(['loc_id' => $model->loc_id])
                ->groupBy(['nombre_accion'])
                ->orderBy(['meta' => SORT_DESC])
                ->all();

            $content = $this->renderPartial('_reportView', [
                'model'=> $model,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
                'model5' => $model5,
                'query' => $query,
            ]);

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'FichaTecnica '.$model->loc_id.'.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 40,
                'marginBottom'=> 13,
                'marginHeader'=> 5,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Directorio De Responsables Y Enlaces'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '   
                    .alert-success-gray {
                        color: #000000;
                        background-color: #d9d9d9;
                        border-color: #d9d9d9;
                    }
                    .alert-success-orange {
                        color: #000000;
                        background-color: #FF9933;
                        border-color: #c9802a;
                    }
                ',

                'methods' =>[
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
                            <table border="4" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">
                                <tr>
                                    <td rowspan="2"  width="15%">
                                        <img src="'.Yii::$app->homeUrl.'images/colors.png" width="160" height="55">
                                    </td>
                                    <td align="right" width="85%">
                                        <b><p style="color:#FF9933; font-size: xx-small">FAMILIAS FUERTES, COMUNIDADES CON TODO</p></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="background-color: #FF9933; color: white;" width="85%">
                                        <b><p>FICHA TECNICA</p></b>
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
