<?php

namespace frontend\controllers;

use Yii;
use common\models\Seguimiento;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeguimientoController implements the CRUD actions for Seguimiento model.
 */
class SeguimientoController extends Controller
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
     * Lists all Seguimiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Seguimiento::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seguimiento model.
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
     * Creates a new Seguimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seguimiento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seguimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->fecha_inicio_piso = ($model->fecha_inicio_piso)? Yii::$app->formatter->asDate($model->fecha_inicio_piso, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_piso = ($model->fecha_entrega_piso)? Yii::$app->formatter->asDate($model->fecha_entrega_piso, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_techo = ($model->fecha_inicio_techo) ? Yii::$app->formatter->asDate($model->fecha_inicio_techo, 'dd-MM-yyyy') : null;
        $model->fecha_entrega_techo = ($model->fecha_entrega_techo) ? Yii::$app->formatter->asDate($model->fecha_entrega_techo, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_muro = ($model->fecha_inicio_muro) ? Yii::$app->formatter->asDate($model->fecha_inicio_muro, 'dd-MM-yyyy') : null;
        $model->fecha_entrega_muro = ($model->fecha_entrega_muro) ? Yii::$app->formatter->asDate($model->fecha_entrega_muro, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_cuarto = ($model->fecha_inicio_cuarto) ? Yii::$app->formatter->asDate($model->fecha_inicio_cuarto, 'dd-MM-yyyy') : null;
        $model->fecha_entrega_cuarto = ($model->fecha_entrega_cuarto) ? Yii::$app->formatter->asDate($model->fecha_entrega_cuarto, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_agua_potable = ($model->fecha_inicio_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_potable, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_agua_potable = ($model->fecha_entrega_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_potable, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_agua_interior = ($model->fecha_inicio_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_interior, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_agua_interior = ($model->fecha_entrega_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_interior, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_drenaje = ($model->fecha_inicio_drenaje)? Yii::$app->formatter->asDate($model->fecha_inicio_drenaje, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_drenaje = ($model->fecha_entrega_drenaje) ? Yii::$app->formatter->asDate($model->fecha_entrega_drenaje, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_luz = ($model->fecha_inicio_luz) ? Yii::$app->formatter->asDate($model->fecha_inicio_luz, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_luz = ($model->fecha_entrega_luz) ? Yii::$app->formatter->asDate($model->fecha_entrega_luz, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_estufa = ($model->fecha_inicio_estufa) ? Yii::$app->formatter->asDate($model->fecha_inicio_estufa, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_estufa = ($model->fecha_entrega_estufa) ? Yii::$app->formatter->asDate($model->fecha_entrega_estufa, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_seguro_popular = ($model->fecha_inicio_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_inicio_seguro_popular, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_seguro_popular = ($model->fecha_entrega_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_entrega_seguro_popular, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_3_15_escuela = ($model->fecha_inicio_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_inicio_3_15_escuela, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_3_15_escuela = ($model->fecha_entrega_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_entrega_3_15_escuela, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_antes_1982_primaria = ($model->fecha_inicio_antes_1982_primaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_antes_1982_primaria, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_antes_1982_primaria = ($model->fecha_entrega_antes_1982_primaria)?Yii::$app->formatter->asDate($model->fecha_entrega_antes_1982_primaria, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_despues_1982_secundaria = ($model->fecha_inicio_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_despues_1982_secundaria, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_despues_1982_secundaria = ($model->fecha_entrega_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_entrega_despues_1982_secundaria, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_despensas = ($model->fecha_inicio_despensas) ? Yii::$app->formatter->asDate($model->fecha_inicio_despensas, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_despensas = ($model->fecha_entrega_despensas) ? Yii::$app->formatter->asDate($model->fecha_entrega_despensas, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_ss = ($model->fecha_inicio_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_ss, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_ss = ($model->fecha_entrega_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_ss, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_trabajadores_ss = ($model->fecha_inicio_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_trabajadores_ss, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_trabajadores_ss = ($model->fecha_entrega_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_trabajadores_ss, 'dd-MM-yyyy'): null;
        $model->fecha_inicio_adultos_ss = ($model->fecha_inicio_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_adultos_ss, 'dd-MM-yyyy'): null;
        $model->fecha_entrega_adultos_ss = ($model->fecha_entrega_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_adultos_ss, 'dd-MM-yyyy'): null;

        if ($model->load(Yii::$app->request->post())) {
            $model->fecha_inicio_piso = ($model->fecha_inicio_piso)? Yii::$app->formatter->asDate($model->fecha_inicio_piso, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_piso = ($model->fecha_entrega_piso)? Yii::$app->formatter->asDate($model->fecha_entrega_piso, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_techo = ($model->fecha_inicio_techo) ? Yii::$app->formatter->asDate($model->fecha_inicio_techo, 'yyyy-MM-dd') : null;
            $model->fecha_entrega_techo = ($model->fecha_entrega_techo) ? Yii::$app->formatter->asDate($model->fecha_entrega_techo, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_muro = ($model->fecha_inicio_muro) ? Yii::$app->formatter->asDate($model->fecha_inicio_muro, 'yyyy-MM-dd') : null;
            $model->fecha_entrega_muro = ($model->fecha_entrega_muro) ? Yii::$app->formatter->asDate($model->fecha_entrega_muro, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_cuarto = ($model->fecha_inicio_cuarto) ? Yii::$app->formatter->asDate($model->fecha_inicio_cuarto, 'yyyy-MM-dd') : null;
            $model->fecha_entrega_cuarto = ($model->fecha_entrega_cuarto) ? Yii::$app->formatter->asDate($model->fecha_entrega_cuarto, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_agua_potable = ($model->fecha_inicio_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_potable, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_agua_potable = ($model->fecha_entrega_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_potable, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_agua_interior = ($model->fecha_inicio_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_interior, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_agua_interior = ($model->fecha_entrega_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_interior, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_drenaje = ($model->fecha_inicio_drenaje)? Yii::$app->formatter->asDate($model->fecha_inicio_drenaje, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_drenaje = ($model->fecha_entrega_drenaje) ? Yii::$app->formatter->asDate($model->fecha_entrega_drenaje, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_luz = ($model->fecha_inicio_luz) ? Yii::$app->formatter->asDate($model->fecha_inicio_luz, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_luz = ($model->fecha_entrega_luz) ? Yii::$app->formatter->asDate($model->fecha_entrega_luz, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_estufa = ($model->fecha_inicio_estufa) ? Yii::$app->formatter->asDate($model->fecha_inicio_estufa, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_estufa = ($model->fecha_entrega_estufa) ? Yii::$app->formatter->asDate($model->fecha_entrega_estufa, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_seguro_popular = ($model->fecha_inicio_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_inicio_seguro_popular, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_seguro_popular = ($model->fecha_entrega_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_entrega_seguro_popular, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_3_15_escuela = ($model->fecha_inicio_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_inicio_3_15_escuela, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_3_15_escuela = ($model->fecha_entrega_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_entrega_3_15_escuela, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_antes_1982_primaria = ($model->fecha_inicio_antes_1982_primaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_antes_1982_primaria, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_antes_1982_primaria = ($model->fecha_entrega_antes_1982_primaria)?Yii::$app->formatter->asDate($model->fecha_entrega_antes_1982_primaria, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_despues_1982_secundaria = ($model->fecha_inicio_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_despues_1982_secundaria, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_despues_1982_secundaria = ($model->fecha_entrega_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_entrega_despues_1982_secundaria, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_despensas = ($model->fecha_inicio_despensas) ? Yii::$app->formatter->asDate($model->fecha_inicio_despensas, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_despensas = ($model->fecha_entrega_despensas) ? Yii::$app->formatter->asDate($model->fecha_entrega_despensas, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_ss = ($model->fecha_inicio_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_ss, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_ss = ($model->fecha_entrega_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_ss, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_trabajadores_ss = ($model->fecha_inicio_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_trabajadores_ss, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_trabajadores_ss = ($model->fecha_entrega_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_trabajadores_ss, 'yyyy-MM-dd'): null;
            $model->fecha_inicio_adultos_ss = ($model->fecha_inicio_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_adultos_ss, 'yyyy-MM-dd'): null;
            $model->fecha_entrega_adultos_ss = ($model->fecha_entrega_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_adultos_ss, 'yyyy-MM-dd'): null;




            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Seguimiento model.
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
     * Finds the Seguimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seguimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seguimiento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
