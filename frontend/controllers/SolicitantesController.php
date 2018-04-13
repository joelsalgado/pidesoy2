<?php

namespace frontend\controllers;

use common\models\Apartados;
use common\models\CedulaPobreza;
use common\models\Localidades;
use common\models\Municpios;
use common\models\PobrezaMultidimensional;
use common\models\Documentos;
use kartik\mpdf\Pdf;
use Yii;
use common\models\Solicitantes;
use common\models\SolicitantesSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SolicitantesController implements the CRUD actions for Solicitantes model.
 */
class SolicitantesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete', 'pobreza'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'pobreza'],
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

    /**
     * Lists all Solicitantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SolicitantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Solicitantes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Solicitantes();

        if ($model->load(Yii::$app->request->post())) {
            $model->nombre = trim(strtoupper($model->nombre));
            $model->apellido_paterno = trim(strtoupper($model->apellido_paterno));
            $model->apellido_materno = trim(strtoupper($model->apellido_materno));
            $model->calle = trim(strtoupper($model->calle));
            $model->colonia = trim(strtoupper($model->colonia));
            $model->num_ext = trim(strtoupper($model->num_ext));
            $model->num_int = trim(strtoupper($model->num_int));
            $model->otra_referencia = trim(strtoupper($model->otra_referencia));
            $periodo = Yii::$app->formatter->asDate('now', 'yyyy');
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
            $fecha_nac =  Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd');

            $model->periodo = $periodo;
            $model->fecha_nacimiento = $fecha_nac;
            $model->status = 1;
            $model->created_at = $fecha;
            $model->updated_at = $fecha;

            if ($model->save()){
                Yii::$app->session->setFlash('success', 'Se guardo correctamente');
                return $this->redirect(['/cedula-pobreza/update', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {

        if (Yii::$app->user->identity->role != 30) {
            $model = Solicitantes::find()->where(['id' => $id,
                'region_id' => Yii::$app->user->identity->region_id,
                'status' => 1])->one();
        }else{
            $model = $this->findModel($id);
        }
        if($model){
            $model->fecha_nacimiento = Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd-MM-yyyy');
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            if ($model->load(Yii::$app->request->post())) {
                $model->nombre = trim(strtoupper($model->nombre));
                $model->apellido_paterno = trim(strtoupper($model->apellido_paterno));
                $model->apellido_materno = trim(strtoupper($model->apellido_materno));
                $model->calle = trim(strtoupper($model->calle));
                $model->colonia = trim(strtoupper($model->colonia));
                $model->num_ext = trim(strtoupper($model->num_ext));
                $model->num_int = trim(strtoupper($model->num_int));
                $model->otra_referencia = trim(strtoupper($model->otra_referencia));
                $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
                $fecha_nac =  Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd');

                $model->fecha_nacimiento = $fecha_nac;
                $model->updated_at = $fecha;

                if($model->save()){
                    return $this->redirect(['/cedula-pobreza/update', 'id' => $model->id]);
                }

            }

            return $this->render('update', [
                'model' => $model,
                'apartado' => $apartado
            ]);
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }

    }

    /**
     * Deletes an existing Solicitantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        if (Yii::$app->user->identity->role != 30) {
            $solicitantes = Solicitantes::find()->where(['id' => $id, 'region_id' => Yii::$app->user->identity->region_id])->one();
        }else{
            $solicitantes = Solicitantes::findOne($id);
        }
        if($solicitantes){
            $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
            $solicitantes->status = 0;
            $solicitantes->updated_at = $fecha;
            $cedula = CedulaPobreza::find()->where(['solicitante_id' => $id])->one();
            $cedula->status = 0;
            $cedula->updated_at = $fecha;
            $docs = Documentos::find()->where(['solicitante_id' => $id])->one();
            $docs->status = 0;
            $docs->updated_at = $fecha;
            $pobreza = PobrezaMultidimensional::find()->where(['solicitante_id' => $id])->one();
            $pobreza->status = 0;
            $pobreza->updated_at = $fecha;

            if($solicitantes->save(false) && $cedula->save(false) && $docs->save(false) && $pobreza->save(false)){
                Yii::$app->session->setFlash('error', 'Se borro correctamente');
                return $this->redirect(['index']);
            }
            else{
                return $this->redirect(['index']);
            }
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }

    }

    public function actionPobreza($id) {
        $model = PobrezaMultidimensional::find()->where(['solicitante_id' => $id])->one();
        if ($model){
            $birthday = $model->solicitante->fecha_nacimiento;
            list($year, $month, $day) = explode("-", $birthday);
            $year_diff  = date("Y") - $year;
            $month_diff = date("m") - $month;
            $day_diff   = date("d") - $day;
            if($month_diff < 0)
            {
                $year_diff--;
            }
            else if(($month_diff == 0) && ($day_diff < 0))
            {
                $year_diff--;
            }

            $content = $this->renderPartial('_reportView', [
                'model'=> $model,
                'edad' => $year_diff
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'cedula '.$model->id.'.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::ORIENT_LANDSCAPE,
                'options' => [
                    'title' => 'Pobreza'
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
    /**
     * Finds the Solicitantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Solicitantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Solicitantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMunicipios() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Municpios::getMun($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>$out]);
                return;
            }
        }
        echo Json::encode(  ['output'=>'', 'selected'=>'']);
    }

    public function actionLocalidades() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Localidades::getLoc($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>$out]);
                return;
            }
        }
        echo Json::encode(  ['output'=>'', 'selected'=>'']);
    }
}
