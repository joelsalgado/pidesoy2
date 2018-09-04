<?php

namespace frontend\controllers;

use Yii;
use common\models\MinutaAutoridades;
use common\models\MinutaAutoridadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * MinutaAutoridadesController implements the CRUD actions for MinutaAutoridades model.
 */
class MinutaAutoridadesController extends Controller
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
     * Lists all MinutaAutoridades models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MinutaAutoridadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MinutaAutoridades model.
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
     * Creates a new MinutaAutoridades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MinutaAutoridades();

        if ($model->load(Yii::$app->request->post())) {
            $mes = Yii::$app->formatter->asDate($model->fecha, 'MM');
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->status = 1;
            $model->mes = $mes;
            $model->periodo = '2018';
            if ($model->save()){
                $model->minuta = $this->loadImage('minuta', 'imageTemp', $model, 'minuta');
                $model->lista = $this->loadImage('lista', 'imageTemp2', $model, 'lista');
                if ($model->save()){
                    return $this->redirect(['index']);
                }

            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'dd-MM-yyyy');
        if ($model->load(Yii::$app->request->post())) {
            $model->fecha = Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd');
            $model->minuta = $this->loadImage('minuta', 'imageTemp', $model, 'minuta');
            $model->lista = $this->loadImage('lista', 'imageTemp2', $model, 'lista');
            if($model->save()){
                return $this->redirect(['index']);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MinutaAutoridades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MinutaAutoridades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MinutaAutoridades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MinutaAutoridades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function loadImage($field, $type, $model, $tipo) {
        $imageFile= UploadedFile::getInstanceByName('MinutaAutoridades['.$type.']');
        $modelNamePhoto = $model->$field;


        if ($imageFile) {
            $ext = $imageFile->getExtension();
            $sanitizeName = str_replace(' ', '_', $model->id);
            $name = $sanitizeName.'-'.$tipo.'.'.$imageFile->getExtension();

            if ($ext == 'pdf'){
                $pdf = null;
                $pdf = UploadedFile::getInstance($model, $type);
                FileHelper::createDirectory(Yii::getAlias('@images').'/minutasa/'.$model->id);
                //var_dump($name); die;
                $pdf->saveAs(Yii::getAlias('@images').'/minutasa/'.$model->id.'/'.$name, false);
            }else{
                die;
            }

            return $name;
        } else {
            return $modelNamePhoto;
        }
    }
}
