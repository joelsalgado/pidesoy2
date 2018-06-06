<?php

namespace frontend\controllers;

use kartik\mpdf\Pdf;
use Yii;
use common\models\DirectorioResponsables;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * DirectorioResponsablesController implements the CRUD actions for DirectorioResponsables model.
 */
class DirectorioResponsablesController extends Controller
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
     * Lists all DirectorioResponsables models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DirectorioResponsables::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DirectorioResponsables model.
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
        $model = new DirectorioResponsables();

        if ($model->load(Yii::$app->request->post())) {
            $model->fecha =  Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->fecha_nacimiento =  Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd');
            $model->imagen = $this->loadImage('imagen', 'imageTemp', $model, 'imagen');
            $model->nombre = trim(strtoupper($model->nombre));
            $model->apellido_paterno = trim(strtoupper($model->apellido_paterno));
            $model->apellido_materno = trim(strtoupper($model->apellido_materno));
            $model->calle = trim(strtoupper($model->calle));
            $model->colonia = trim(strtoupper($model->colonia));
            $model->num_ext = trim(strtoupper($model->num_ext));
            $model->num_int = trim(strtoupper($model->num_int));
            $model->funcion = trim(strtoupper($model->funcion));
            $model->status = 1;
            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->fecha =  Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
        $model->fecha_nacimiento =  Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd-MM-yyyy');
        if ($model->load(Yii::$app->request->post())) {
            $model->fecha =  Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->fecha_nacimiento =  Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd');
            $model->imagen = $this->loadImage('imagen', 'imageTemp', $model, 'imagen');
            $model->nombre = trim(strtoupper($model->nombre));
            $model->apellido_paterno = trim(strtoupper($model->apellido_paterno));
            $model->apellido_materno = trim(strtoupper($model->apellido_materno));
            $model->calle = trim(strtoupper($model->calle));
            $model->colonia = trim(strtoupper($model->colonia));
            $model->num_ext = trim(strtoupper($model->num_ext));
            $model->num_int = trim(strtoupper($model->num_int));
            $model->funcion = trim(strtoupper($model->funcion));
            if($model->save()){
                return $this->redirect(['index']);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = DirectorioResponsables::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function loadImage($field, $type, $model, $tipo) {
        $imageFile= UploadedFile::getInstanceByName('DirectorioResponsables['.$type.']');
        $modelNamePhoto = $model->$field;
        //var_dump($model); die;


        if ($imageFile) {
            $ext = $imageFile->getExtension();
            $sanitizeName = str_replace(' ', '-', $model->fecha_nacimiento.$model->apellido_paterno.$model->fecha);
            $name = $sanitizeName.'-'.$tipo.'.'.$imageFile->getExtension();
            $tipo = null;
            $model->saveImage($imageFile, $name, $type, $tipo, $ext);
            return $name;
        } else {
            return $modelNamePhoto;
        }
    }

    public function actionPdf($id)
    {
        $model = DirectorioResponsables::findOne($id);
        if ($model){
            $birthday = $model->fecha_nacimiento;
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
                'filename' => 'direcorio '.$model->id.'.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Directorio De Responsables Y Enlaces'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            ]);
            return $pdf->render();
        }
        else{
            throw new \yii\web\NotFoundHttpException('ID INCORRECTO');
        }
    }
}
