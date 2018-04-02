<?php

namespace frontend\controllers;

use common\models\Localidades;
use common\models\Municpios;
use common\models\PobrezaMultidimensional;
use kartik\mpdf\Pdf;
use Yii;
use common\models\Solicitantes;
use common\models\SolicitantesSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
                return $this->redirect(['/cedula-pobreza/update', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->fecha_nacimiento = Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd-MM-yyyy');

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
        ]);
    }

    /**
     * Deletes an existing Solicitantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPobreza($id) {
        $model = PobrezaMultidimensional::find()->where(['solicitante_id' => $id])->one();
        if ($model){
            $content = $this->renderPartial('_reportView', [
                'model'=> $model
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'ponreza'.$model->id.'.pdf',
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
