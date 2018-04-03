<?php

namespace frontend\controllers;

use common\models\Apartados;
use common\models\CedulaPobreza;
use Yii;
use common\models\Documentos;
use common\models\DocumentosSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DocumentosController implements the CRUD actions for Documentos model.
 */
class DocumentosController extends Controller
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
     * Lists all Documentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documentos model.
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
     * Creates a new Documentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documentos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Documentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Documentos::find()->where(['solicitante_id' => $id])->one();
        if($model){
            $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
            if ($model->load(Yii::$app->request->post())) {
                $apartado->apartado3 = 1;
                $model->documento = $this->loadImage('documento', 'imageTemp', $model, 'documento');
                $model->foto = $this->loadImage('foto', 'imageTemp2', $model, 'foto');
                $model->status = 1;
                if ($model->save() && $apartado->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
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
     * Deletes an existing Documentos model.
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
     * Finds the Documentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documentos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function loadImage($field, $type, $model, $tipo) {
        $imageFile= UploadedFile::getInstanceByName('Documentos['.$type.']');
        $modelNamePhoto = $model->$field;


        if ($imageFile) {
            $ext = $imageFile->getExtension();
            $sanitizeName = str_replace(' ', '_', $model->solicitante_id);
            $name = $sanitizeName.'-'.$tipo.'.'.$imageFile->getExtension();

            if ($ext == 'pdf'){
                $pdf = null;
                $pdf = UploadedFile::getInstance($model, $type);
                FileHelper::createDirectory(Yii::getAlias('@images').'/docs/'.$model->solicitante_id);
                //var_dump($name); die;
                $pdf->saveAs(Yii::getAlias('@images').'/docs/'.$model->solicitante_id.'/'.$name, false);
            }else{
                $tipo = $model->solicitante_id;
                $model->saveImage($imageFile, $name, $type, $tipo, $ext);
            }

            return $name;
        } else {
            return $modelNamePhoto;
        }
    }
}
