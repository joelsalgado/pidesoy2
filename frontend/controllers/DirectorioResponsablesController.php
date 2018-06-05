<?php

namespace frontend\controllers;

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
                    'delete' => ['POST'],
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
        $model->fecha =  Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
        $model->fecha_nacimiento =  Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd');
        if ($model->load(Yii::$app->request->post())) {
            $model->fecha =  Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->fecha_nacimiento =  Yii::$app->formatter->asDate($model->fecha_nacimiento, 'yyyy-MM-dd');
            $model->imagen = $this->loadImage('imagen', 'imageTemp', $model, 'imagen');
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
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
            $tipo = $model->id;
            $model->saveImage($imageFile, $name, $type, $tipo, $ext);


            return $name;
        } else {
            return $modelNamePhoto;
        }
    }
}
