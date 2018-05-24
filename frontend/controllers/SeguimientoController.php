<?php

namespace frontend\controllers;

use common\models\Apartados;
use common\models\Programas;
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
        $model = Seguimiento::find()->where(['solicitante_id' => $id])->one();

        if($model){
            if($model->meta_vivienda > 0){
                $apartado = Apartados::find()->where(['solicitante_id' => $id])->one();
                $model->fecha_inicio_piso = ($model->fecha_inicio_piso)? Yii::$app->formatter->asDate($model->fecha_inicio_piso, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_piso = ($model->fecha_entrega_piso)? Yii::$app->formatter->asDate($model->fecha_entrega_piso, 'dd-MM-yyyy'): null;
                $model->fecha_termino_piso = ($model->fecha_termino_piso)? Yii::$app->formatter->asDate($model->fecha_termino_piso, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_techo = ($model->fecha_inicio_techo) ? Yii::$app->formatter->asDate($model->fecha_inicio_techo, 'dd-MM-yyyy') : null;
                $model->fecha_entrega_techo = ($model->fecha_entrega_techo) ? Yii::$app->formatter->asDate($model->fecha_entrega_techo, 'dd-MM-yyyy'): null;
                $model->fecha_termino_techo = ($model->fecha_termino_techo)? Yii::$app->formatter->asDate($model->fecha_termino_techo, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_muro = ($model->fecha_inicio_muro) ? Yii::$app->formatter->asDate($model->fecha_inicio_muro, 'dd-MM-yyyy') : null;
                $model->fecha_entrega_muro = ($model->fecha_entrega_muro) ? Yii::$app->formatter->asDate($model->fecha_entrega_muro, 'dd-MM-yyyy'): null;
                $model->fecha_termino_muro = ($model->fecha_termino_muro)? Yii::$app->formatter->asDate($model->fecha_termino_muro, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_cuarto = ($model->fecha_inicio_cuarto) ? Yii::$app->formatter->asDate($model->fecha_inicio_cuarto, 'dd-MM-yyyy') : null;
                $model->fecha_entrega_cuarto = ($model->fecha_entrega_cuarto) ? Yii::$app->formatter->asDate($model->fecha_entrega_cuarto, 'dd-MM-yyyy'): null;
                $model->fecha_termino_cuarto = ($model->fecha_termino_cuarto)? Yii::$app->formatter->asDate($model->fecha_termino_cuarto, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_agua_potable = ($model->fecha_inicio_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_potable, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_agua_potable = ($model->fecha_entrega_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_potable, 'dd-MM-yyyy'): null;
                $model->fecha_termino_agua_potable = ($model->fecha_termino_agua_potable)? Yii::$app->formatter->asDate($model->fecha_termino_agua_potable, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_agua_interior = ($model->fecha_inicio_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_interior, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_agua_interior = ($model->fecha_entrega_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_interior, 'dd-MM-yyyy'): null;
                $model->fecha_termino_agua_interior = ($model->fecha_termino_agua_interior)? Yii::$app->formatter->asDate($model->fecha_termino_agua_interior, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_drenaje = ($model->fecha_inicio_drenaje)? Yii::$app->formatter->asDate($model->fecha_inicio_drenaje, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_drenaje = ($model->fecha_entrega_drenaje) ? Yii::$app->formatter->asDate($model->fecha_entrega_drenaje, 'dd-MM-yyyy'): null;
                $model->fecha_termino_drenaje = ($model->fecha_termino_drenaje)? Yii::$app->formatter->asDate($model->fecha_termino_drenaje, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_luz = ($model->fecha_inicio_luz) ? Yii::$app->formatter->asDate($model->fecha_inicio_luz, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_luz = ($model->fecha_entrega_luz) ? Yii::$app->formatter->asDate($model->fecha_entrega_luz, 'dd-MM-yyyy'): null;
                $model->fecha_termino_luz = ($model->fecha_termino_luz)? Yii::$app->formatter->asDate($model->fecha_termino_luz, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_estufa = ($model->fecha_inicio_estufa) ? Yii::$app->formatter->asDate($model->fecha_inicio_estufa, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_estufa = ($model->fecha_entrega_estufa) ? Yii::$app->formatter->asDate($model->fecha_entrega_estufa, 'dd-MM-yyyy'): null;
                $model->fecha_termino_estufa = ($model->fecha_termino_estufa)? Yii::$app->formatter->asDate($model->fecha_termino_estufa, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_seguro_popular = ($model->fecha_inicio_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_inicio_seguro_popular, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_seguro_popular = ($model->fecha_entrega_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_entrega_seguro_popular, 'dd-MM-yyyy'): null;
                $model->fecha_termino_seguro_popular = ($model->fecha_termino_seguro_popular)? Yii::$app->formatter->asDate($model->fecha_termino_seguro_popular, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_3_15_escuela = ($model->fecha_inicio_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_inicio_3_15_escuela, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_3_15_escuela = ($model->fecha_entrega_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_entrega_3_15_escuela, 'dd-MM-yyyy'): null;
                $model->fecha_termino_3_15_escuela = ($model->fecha_termino_3_15_escuela)? Yii::$app->formatter->asDate($model->fecha_termino_3_15_escuela, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_antes_1982_primaria = ($model->fecha_inicio_antes_1982_primaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_antes_1982_primaria, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_antes_1982_primaria = ($model->fecha_entrega_antes_1982_primaria)?Yii::$app->formatter->asDate($model->fecha_entrega_antes_1982_primaria, 'dd-MM-yyyy'): null;
                $model->fecha_termino_antes_1982_primaria = ($model->fecha_termino_antes_1982_primaria)? Yii::$app->formatter->asDate($model->fecha_termino_antes_1982_primaria, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_despues_1982_secundaria = ($model->fecha_inicio_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_despues_1982_secundaria, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_despues_1982_secundaria = ($model->fecha_entrega_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_entrega_despues_1982_secundaria, 'dd-MM-yyyy'): null;
                $model->fecha_termino_despues_1982_secundaria = ($model->fecha_termino_despues_1982_secundaria)? Yii::$app->formatter->asDate($model->fecha_termino_despues_1982_secundaria, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_despensas = ($model->fecha_inicio_despensas) ? Yii::$app->formatter->asDate($model->fecha_inicio_despensas, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_despensas = ($model->fecha_entrega_despensas) ? Yii::$app->formatter->asDate($model->fecha_entrega_despensas, 'dd-MM-yyyy'): null;
                $model->fecha_termino_despensas = ($model->fecha_termino_despensas)? Yii::$app->formatter->asDate($model->fecha_termino_despensas, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_ss = ($model->fecha_inicio_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_ss, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_ss = ($model->fecha_entrega_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_ss, 'dd-MM-yyyy'): null;
                $model->fecha_termino_ss = ($model->fecha_termino_ss)? Yii::$app->formatter->asDate($model->fecha_termino_ss, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_trabajadores_ss = ($model->fecha_inicio_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_trabajadores_ss, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_trabajadores_ss = ($model->fecha_entrega_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_trabajadores_ss, 'dd-MM-yyyy'): null;
                $model->fecha_termino_trabajadores_ss = ($model->fecha_termino_trabajadores_ss)? Yii::$app->formatter->asDate($model->fecha_termino_trabajadores_ss, 'dd-MM-yyyy'): null;
                $model->fecha_inicio_adultos_ss = ($model->fecha_inicio_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_adultos_ss, 'dd-MM-yyyy'): null;
                $model->fecha_entrega_adultos_ss = ($model->fecha_entrega_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_adultos_ss, 'dd-MM-yyyy'): null;
                $model->fecha_termino_adultos_ss = ($model->fecha_termino_adultos_ss)? Yii::$app->formatter->asDate($model->fecha_termino_adultos_ss, 'dd-MM-yyyy'): null;

                if ($model->load(Yii::$app->request->post())) {
                    $model->fecha_inicio_piso = ($model->fecha_inicio_piso)? Yii::$app->formatter->asDate($model->fecha_inicio_piso, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_piso = ($model->fecha_entrega_piso)? Yii::$app->formatter->asDate($model->fecha_entrega_piso, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_piso = ($model->fecha_termino_piso)? Yii::$app->formatter->asDate($model->fecha_termino_piso, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_techo = ($model->fecha_inicio_techo) ? Yii::$app->formatter->asDate($model->fecha_inicio_techo, 'yyyy-MM-dd') : null;
                    $model->fecha_entrega_techo = ($model->fecha_entrega_techo) ? Yii::$app->formatter->asDate($model->fecha_entrega_techo, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_techo = ($model->fecha_termino_techo)? Yii::$app->formatter->asDate($model->fecha_termino_techo, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_muro = ($model->fecha_inicio_muro) ? Yii::$app->formatter->asDate($model->fecha_inicio_muro, 'yyyy-MM-dd') : null;
                    $model->fecha_entrega_muro = ($model->fecha_entrega_muro) ? Yii::$app->formatter->asDate($model->fecha_entrega_muro, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_muro = ($model->fecha_termino_muro)? Yii::$app->formatter->asDate($model->fecha_termino_muro, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_cuarto = ($model->fecha_inicio_cuarto) ? Yii::$app->formatter->asDate($model->fecha_inicio_cuarto, 'yyyy-MM-dd') : null;
                    $model->fecha_entrega_cuarto = ($model->fecha_entrega_cuarto) ? Yii::$app->formatter->asDate($model->fecha_entrega_cuarto, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_cuarto = ($model->fecha_termino_cuarto)? Yii::$app->formatter->asDate($model->fecha_termino_cuarto, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_agua_potable = ($model->fecha_inicio_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_potable, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_agua_potable = ($model->fecha_entrega_agua_potable) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_potable, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_agua_potable = ($model->fecha_termino_agua_potable)? Yii::$app->formatter->asDate($model->fecha_termino_agua_potable, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_agua_interior = ($model->fecha_inicio_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_inicio_agua_interior, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_agua_interior = ($model->fecha_entrega_agua_interior) ? Yii::$app->formatter->asDate($model->fecha_entrega_agua_interior, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_agua_interior = ($model->fecha_termino_agua_interior)? Yii::$app->formatter->asDate($model->fecha_termino_agua_interior, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_drenaje = ($model->fecha_inicio_drenaje)? Yii::$app->formatter->asDate($model->fecha_inicio_drenaje, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_drenaje = ($model->fecha_entrega_drenaje) ? Yii::$app->formatter->asDate($model->fecha_entrega_drenaje, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_drenaje = ($model->fecha_termino_drenaje)? Yii::$app->formatter->asDate($model->fecha_termino_drenaje, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_luz = ($model->fecha_inicio_luz) ? Yii::$app->formatter->asDate($model->fecha_inicio_luz, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_luz = ($model->fecha_entrega_luz) ? Yii::$app->formatter->asDate($model->fecha_entrega_luz, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_luz = ($model->fecha_termino_luz)? Yii::$app->formatter->asDate($model->fecha_termino_luz, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_estufa = ($model->fecha_inicio_estufa) ? Yii::$app->formatter->asDate($model->fecha_inicio_estufa, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_estufa = ($model->fecha_entrega_estufa) ? Yii::$app->formatter->asDate($model->fecha_entrega_estufa, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_estufa = ($model->fecha_termino_estufa)? Yii::$app->formatter->asDate($model->fecha_termino_estufa, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_seguro_popular = ($model->fecha_inicio_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_inicio_seguro_popular, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_seguro_popular = ($model->fecha_entrega_seguro_popular) ? Yii::$app->formatter->asDate($model->fecha_entrega_seguro_popular, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_seguro_popular = ($model->fecha_termino_seguro_popular)? Yii::$app->formatter->asDate($model->fecha_termino_seguro_popular, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_3_15_escuela = ($model->fecha_inicio_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_inicio_3_15_escuela, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_3_15_escuela = ($model->fecha_entrega_3_15_escuela) ? Yii::$app->formatter->asDate($model->fecha_entrega_3_15_escuela, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_3_15_escuela = ($model->fecha_termino_3_15_escuela)? Yii::$app->formatter->asDate($model->fecha_termino_3_15_escuela, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_antes_1982_primaria = ($model->fecha_inicio_antes_1982_primaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_antes_1982_primaria, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_antes_1982_primaria = ($model->fecha_entrega_antes_1982_primaria)?Yii::$app->formatter->asDate($model->fecha_entrega_antes_1982_primaria, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_antes_1982_primaria = ($model->fecha_termino_antes_1982_primaria)? Yii::$app->formatter->asDate($model->fecha_termino_antes_1982_primaria, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_despues_1982_secundaria = ($model->fecha_inicio_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_inicio_despues_1982_secundaria, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_despues_1982_secundaria = ($model->fecha_entrega_despues_1982_secundaria) ? Yii::$app->formatter->asDate($model->fecha_entrega_despues_1982_secundaria, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_despues_1982_secundaria = ($model->fecha_termino_despues_1982_secundaria)? Yii::$app->formatter->asDate($model->fecha_termino_despues_1982_secundaria, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_despensas = ($model->fecha_inicio_despensas) ? Yii::$app->formatter->asDate($model->fecha_inicio_despensas, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_despensas = ($model->fecha_entrega_despensas) ? Yii::$app->formatter->asDate($model->fecha_entrega_despensas, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_despensas = ($model->fecha_termino_despensas)? Yii::$app->formatter->asDate($model->fecha_termino_despensas, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_ss = ($model->fecha_inicio_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_ss = ($model->fecha_entrega_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_ss = ($model->fecha_termino_ss)? Yii::$app->formatter->asDate($model->fecha_termino_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_trabajadores_ss = ($model->fecha_inicio_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_trabajadores_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_trabajadores_ss = ($model->fecha_entrega_trabajadores_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_trabajadores_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_trabajadores_ss = ($model->fecha_termino_trabajadores_ss)? Yii::$app->formatter->asDate($model->fecha_termino_trabajadores_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_inicio_adultos_ss = ($model->fecha_inicio_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_inicio_adultos_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_entrega_adultos_ss = ($model->fecha_entrega_adultos_ss) ? Yii::$app->formatter->asDate($model->fecha_entrega_adultos_ss, 'yyyy-MM-dd'): null;
                    $model->fecha_termino_adultos_ss = ($model->fecha_termino_adultos_ss)? Yii::$app->formatter->asDate($model->fecha_termino_adultos_ss, 'yyyy-MM-dd'): null;


                    if($model->meta_piso == 1){
                        if($model->acciones_piso == 1){
                            //$model->acciones_pendientes_piso = $model->meta_piso - $model->acciones_piso;
                            //$model->inversion_piso = 2640;
                            //$model->inversion_piso = ($model->inversion_piso)? $model->inversion_piso : 0;

                        }else{
                            $model->acciones_piso = ($model->acciones_piso) ? $model->acciones_piso : 0;
                            $model->acciones_pendientes_piso =  $model->meta_piso - $model->acciones_piso;
                            $model->inversion_piso = ($model->inversion_piso) ? $model->inversion_piso : 0;
                            if($model->programa_piso > 1){
                                $programa_piso = Programas::findOne($model->programa_piso);
                                $model->responsable_piso = $programa_piso->responsable;
                            }

                        }
                    }else{
                        $model->meta_piso = 0;
                        $model->acciones_piso = 0;
                        $model->acciones_pendientes_piso = 0;
                        $model->inversion_piso = 0;
                        $model->fecha_inicio_piso = null;
                        $model->fecha_entrega_piso = null;
                        $model->fecha_termino_piso = null;
                        $model->programa_piso = null;
                        $model->responsable_piso = null;
                    }

                    if($model->meta_techo == 1){
                        if($model->acciones_techo == 1){
                            //$model->acciones_pendientes_techo = $model->meta_techo - $model->acciones_techo;
                            //$model->inversion_techo = 2640;
                            //$model->inversion_techo = ($model->inversion_techo)? $model->inversion_techo : 0;

                        }else{
                            $model->acciones_techo = ($model->acciones_techo) ? $model->acciones_techo : 0;
                            $model->acciones_pendientes_techo =  $model->meta_techo - $model->acciones_techo;
                            $model->inversion_techo = ($model->inversion_techo) ? $model->inversion_techo : 0;
                            if($model->programa_techo > 1){
                                $programa_techo = Programas::findOne($model->programa_techo);
                                $model->responsable_techo = $programa_techo->responsable;
                            }

                        }
                    }else{
                        $model->meta_techo = 0;
                        $model->acciones_techo = 0;
                        $model->acciones_pendientes_techo = 0;
                        $model->inversion_techo = 0;
                        $model->fecha_inicio_techo = null;
                        $model->fecha_entrega_techo = null;
                        $model->fecha_termino_techo = null;
                        $model->programa_techo = null;
                        $model->responsable_techo = null;
                    }

                    if($model->meta_muro == 1){
                        if($model->acciones_muro == 1){
                            //$model->acciones_pendientes_muro = $model->meta_muro - $model->acciones_muro;
                            //$model->inversion_muro = 2640;
                            //$model->inversion_muro = ($model->inversion_muro)? $model->inversion_muro : 0;

                        }else{
                            $model->acciones_muro = ($model->acciones_muro) ? $model->acciones_muro : 0;
                            $model->acciones_pendientes_muro =  $model->meta_muro - $model->acciones_muro;
                            $model->inversion_muro = ($model->inversion_muro) ? $model->inversion_muro : 0;
                            if($model->programa_muro > 1){
                                $programa_muro = Programas::findOne($model->programa_muro);
                                $model->responsable_muro = $programa_muro->responsable;
                            }

                        }
                    }else{
                        $model->meta_muro = 0;
                        $model->acciones_muro = 0;
                        $model->acciones_pendientes_muro = 0;
                        $model->inversion_muro = 0;
                        $model->fecha_inicio_muro = null;
                        $model->fecha_entrega_muro = null;
                        $model->fecha_termino_muro = null;
                        $model->programa_muro = null;
                        $model->responsable_muro = null;
                    }

                    if($model->meta_cuarto == 1){
                        if($model->acciones_cuarto == 1){
                            //$model->acciones_pendientes_cuarto = $model->meta_cuarto - $model->acciones_cuarto;
                            //$model->inversion_cuarto = 2640;
                            //$model->inversion_cuarto = ($model->inversion_cuarto)? $model->inversion_cuarto : 0;

                        }else{
                            $model->acciones_cuarto = ($model->acciones_cuarto) ? $model->acciones_cuarto : 0;
                            $model->acciones_pendientes_cuarto =  $model->meta_cuarto - $model->acciones_cuarto;
                            $model->inversion_cuarto = ($model->inversion_cuarto) ? $model->inversion_cuarto : 0;
                            if($model->programa_cuarto > 1){
                                $programa_cuarto = Programas::findOne($model->programa_cuarto);
                                $model->responsable_cuarto = $programa_cuarto->responsable;
                            }

                        }
                    }else{
                        $model->meta_cuarto = 0;
                        $model->acciones_cuarto = 0;
                        $model->acciones_pendientes_cuarto = 0;
                        $model->inversion_cuarto = 0;
                        $model->fecha_inicio_cuarto = null;
                        $model->fecha_entrega_cuarto = null;
                        $model->fecha_termino_cuarto = null;
                        $model->programa_cuarto = null;
                        $model->responsable_cuarto = null;
                    }

                    $model->acciones_calidad_espacios_vivienda = $model->acciones_piso + $model->acciones_techo + $model->acciones_muro + $model->acciones_cuarto;
                    $model->acciones_pendientez_calidad_espacios_vivienda    = $model->meta_calidad_espacios_vivienda - $model->acciones_calidad_espacios_vivienda;

                    if($model->meta_agua_potable == 1){
                        if($model->acciones_agua_potable == 1){
                            //$model->acciones_pendientes_agua_potable = $model->meta_agua_potable - $model->acciones_agua_potable;
                            //$model->inversion_agua_potable = 2640;
                            //$model->inversion_agua_potable = ($model->inversion_agua_potable)? $model->inversion_agua_potable : 0;

                        }else{
                            $model->acciones_agua_potable = ($model->acciones_agua_potable) ? $model->acciones_agua_potable : 0;
                            $model->acciones_pendientes_agua_potable =  $model->meta_agua_potable - $model->acciones_agua_potable;
                            $model->inversion_agua_potable = ($model->inversion_agua_potable) ? $model->inversion_agua_potable : 0;
                            if($model->programa_agua_potable > 1){
                                $programa_agua_potable = Programas::findOne($model->programa_agua_potable);
                                $model->responsable_agua_potable = $programa_agua_potable->responsable;
                            }

                        }
                    }else{
                        $model->meta_agua_potable = 0;
                        $model->acciones_agua_potable = 0;
                        $model->acciones_pendientes_agua_potable = 0;
                        $model->inversion_agua_potable = 0;
                        $model->fecha_inicio_agua_potable = null;
                        $model->fecha_entrega_agua_potable = null;
                        $model->fecha_termino_agua_potable = null;
                        $model->programa_agua_potable = null;
                        $model->responsable_agua_potable = null;
                    }


                    if($model->meta_agua_interior == 1){
                        if($model->acciones_agua_interior == 1){
                            //$model->acciones_pendientes_agua_interior = $model->meta_agua_interior - $model->acciones_agua_interior;
                            //$model->inversion_agua_interior = 2640;
                            //$model->inversion_agua_interior = ($model->inversion_agua_interior)? $model->inversion_agua_interior : 0;

                        }else{
                            $model->acciones_agua_interior = ($model->acciones_agua_interior) ? $model->acciones_agua_interior : 0;
                            $model->acciones_pendientes_agua_interior =  $model->meta_agua_interior - $model->acciones_agua_interior;
                            $model->inversion_agua_interior = ($model->inversion_agua_interior) ? $model->inversion_agua_interior : 0;
                            if($model->programa_agua_interior > 1){
                                $programa_agua_interior = Programas::findOne($model->programa_agua_interior);
                                $model->responsable_agua_interior = $programa_agua_interior->responsable;
                            }

                        }
                    }else{
                        $model->meta_agua_interior = 0;
                        $model->acciones_agua_interior = 0;
                        $model->acciones_pendientes_agua_interior = 0;
                        $model->inversion_agua_interior = 0;
                        $model->fecha_inicio_agua_interior = null;
                        $model->fecha_entrega_agua_interior = null;
                        $model->fecha_termino_agua_interior = null;
                        $model->programa_agua_interior = null;
                        $model->responsable_agua_interior = null;
                    }

                    if($model->meta_drenaje == 1){
                        if($model->acciones_drenaje == 1){
                            //$model->acciones_pendientes_drenaje = $model->meta_drenaje - $model->acciones_drenaje;
                            //$model->inversion_drenaje = 2640;
                            //$model->inversion_drenaje = ($model->inversion_drenaje)? $model->inversion_drenaje : 0;

                        }else{
                            $model->acciones_drenaje = ($model->acciones_drenaje) ? $model->acciones_drenaje : 0;
                            $model->acciones_pendientes_drenaje =  $model->meta_drenaje - $model->acciones_drenaje;
                            $model->inversion_drenaje = ($model->inversion_drenaje) ? $model->inversion_drenaje : 0;
                            if($model->programa_drenaje > 1){
                                $programa_drenaje = Programas::findOne($model->programa_drenaje);
                                $model->responsable_drenaje = $programa_drenaje->responsable;
                            }

                        }
                    }else{
                        $model->meta_drenaje = 0;
                        $model->acciones_drenaje = 0;
                        $model->acciones_pendientes_drenaje = 0;
                        $model->inversion_drenaje = 0;
                        $model->fecha_inicio_drenaje = null;
                        $model->fecha_entrega_drenaje = null;
                        $model->fecha_termino_drenaje = null;
                        $model->programa_drenaje = null;
                        $model->responsable_drenaje = null;
                    }

                    if($model->meta_luz == 1){
                        if($model->acciones_luz == 1){
                            //$model->acciones_pendientes_luz = $model->meta_luz - $model->acciones_luz;
                            //$model->inversion_luz = 2640;
                            //$model->inversion_luz = ($model->inversion_luz)? $model->inversion_luz : 0;

                        }else{
                            $model->acciones_luz = ($model->acciones_luz) ? $model->acciones_luz : 0;
                            $model->acciones_pendientes_luz =  $model->meta_luz - $model->acciones_luz;
                            $model->inversion_luz = ($model->inversion_luz) ? $model->inversion_luz : 0;
                            if($model->programa_luz > 1){
                                $programa_luz = Programas::findOne($model->programa_luz);
                                $model->responsable_luz = $programa_luz->responsable;
                            }

                        }
                    }else{
                        $model->meta_luz = 0;
                        $model->acciones_luz = 0;
                        $model->acciones_pendientes_luz = 0;
                        $model->inversion_luz = 0;
                        $model->fecha_inicio_luz = null;
                        $model->fecha_entrega_luz = null;
                        $model->fecha_termino_luz = null;
                        $model->programa_luz = null;
                        $model->responsable_luz = null;
                    }

                    if($model->meta_estufa == 1){
                        if($model->acciones_estufa == 1){
                            //$model->acciones_pendientes_estufa = $model->meta_estufa - $model->acciones_estufa;
                            //$model->inversion_estufa = 2640;
                            //$model->inversion_estufa = ($model->inversion_estufa)? $model->inversion_estufa : 0;

                        }else{
                            $model->acciones_estufa = ($model->acciones_estufa) ? $model->acciones_estufa : 0;
                            $model->acciones_pendientes_estufa =  $model->meta_estufa - $model->acciones_estufa;
                            $model->inversion_estufa = ($model->inversion_estufa) ? $model->inversion_estufa : 0;
                            if($model->programa_estufa > 1){
                                $programa_estufa = Programas::findOne($model->programa_estufa);
                                $model->responsable_estufa = $programa_estufa->responsable;
                            }

                        }
                    }else{
                        $model->meta_estufa = 0;
                        $model->acciones_estufa = 0;
                        $model->acciones_pendientes_estufa = 0;
                        $model->inversion_estufa = 0;
                        $model->fecha_inicio_estufa = null;
                        $model->fecha_entrega_estufa = null;
                        $model->fecha_termino_estufa = null;
                        $model->programa_estufa = null;
                        $model->responsable_estufa = null;
                    }

                    $model->acciones_servicios_basicos = $model->acciones_agua_potable+$model->acciones_agua_interior+$model->acciones_drenaje+$model->acciones_luz+$model->acciones_estufa;
                    $model->acciones_pendientez_servicios_basicos = $model->meta_servicios_basicos - $model->acciones_servicios_basicos;

                    if($model->meta_seguro_popular == 1){
                        if($model->acciones_seguro_popular == 1){
                            //$model->acciones_pendientes_seguro_popular = $model->meta_seguro_popular - $model->acciones_seguro_popular;
                            //$model->inversion_seguro_popular = 2640;
                            //$model->inversion_seguro_popular = ($model->inversion_seguro_popular)? $model->inversion_seguro_popular : 0;

                        }else{
                            $model->acciones_seguro_popular = ($model->acciones_seguro_popular) ? $model->acciones_seguro_popular : 0;
                            $model->acciones_pendientes_seguro_popular =  $model->meta_seguro_popular - $model->acciones_seguro_popular;
                            $model->inversion_seguro_popular = ($model->inversion_seguro_popular) ? $model->inversion_seguro_popular : 0;
                            if($model->programa_seguro_popular > 1){
                                $programa_seguro_popular = Programas::findOne($model->programa_seguro_popular);
                                $model->responsable_seguro_popular = $programa_seguro_popular->responsable;
                            }

                        }
                    }else{
                        $model->meta_seguro_popular = 0;
                        $model->acciones_seguro_popular = 0;
                        $model->acciones_pendientes_seguro_popular = 0;
                        $model->inversion_seguro_popular = 0;
                        $model->fecha_inicio_seguro_popular = null;
                        $model->fecha_entrega_seguro_popular = null;
                        $model->fecha_termino_seguro_popular = null;
                        $model->programa_seguro_popular = null;
                        $model->responsable_seguro_popular = null;
                    }


                    if($model->meta_3_15_escuela == 1){
                        if($model->acciones_3_15_escuela == 1){
                            //$model->acciones_pendientes_3_15_escuela = $model->meta_3_15_escuela - $model->acciones_3_15_escuela;
                            //$model->inversion_3_15_escuela = 2640;
                            //$model->inversion_3_15_escuela = ($model->inversion_3_15_escuela)? $model->inversion_3_15_escuela : 0;

                        }else{
                            $model->acciones_3_15_escuela = ($model->acciones_3_15_escuela) ? $model->acciones_3_15_escuela : 0;
                            $model->acciones_pendientes_3_15_escuela =  $model->meta_3_15_escuela - $model->acciones_3_15_escuela;
                            $model->inversion_3_15_escuela = ($model->inversion_3_15_escuela) ? $model->inversion_3_15_escuela : 0;
                            if($model->programa_3_15_escuela > 1){
                                $programa_3_15_escuela = Programas::findOne($model->programa_3_15_escuela);
                                $model->responsable_3_15_escuela = $programa_3_15_escuela->responsable;
                            }

                        }
                    }else{
                        $model->meta_3_15_escuela = 0;
                        $model->acciones_3_15_escuela = 0;
                        $model->acciones_pendientes_3_15_escuela = 0;
                        $model->inversion_3_15_escuela = 0;
                        $model->fecha_inicio_3_15_escuela = null;
                        $model->fecha_entrega_3_15_escuela = null;
                        $model->fecha_termino_3_15_escuela = null;
                        $model->programa_3_15_escuela = null;
                        $model->responsable_3_15_escuela = null;
                    }



                    if($model->meta_antes_1982_primaria == 1){
                        if($model->acciones_antes_1982_primaria == 1){
                            //$model->acciones_pendientes_antes_1982_primaria = $model->meta_antes_1982_primaria - $model->acciones_antes_1982_primaria;
                            //$model->inversion_antes_1982_primaria = 2640;
                            //$model->inversion_antes_1982_primaria = ($model->inversion_antes_1982_primaria)? $model->inversion_antes_1982_primaria : 0;

                        }else{
                            $model->acciones_antes_1982_primaria = ($model->acciones_antes_1982_primaria) ? $model->acciones_antes_1982_primaria : 0;
                            $model->acciones_pendientes_antes_1982_primaria =  $model->meta_antes_1982_primaria - $model->acciones_antes_1982_primaria;
                            $model->inversion_antes_1982_primaria = ($model->inversion_antes_1982_primaria) ? $model->inversion_antes_1982_primaria : 0;
                            if($model->programa_antes_1982_primaria > 1){
                                $programa_antes_1982_primaria = Programas::findOne($model->programa_antes_1982_primaria);
                                $model->responsable_antes_1982_primaria = $programa_antes_1982_primaria->responsable;
                            }

                        }
                    }else{
                        $model->meta_antes_1982_primaria = 0;
                        $model->acciones_antes_1982_primaria = 0;
                        $model->acciones_pendientes_antes_1982_primaria = 0;
                        $model->inversion_antes_1982_primaria = 0;
                        $model->fecha_inicio_antes_1982_primaria = null;
                        $model->fecha_entrega_antes_1982_primaria = null;
                        $model->fecha_termino_antes_1982_primaria = null;
                        $model->programa_antes_1982_primaria = null;
                        $model->responsable_antes_1982_primaria = null;
                    }


                    if($model->meta_despues_1982_secundaria == 1){
                        if($model->acciones_despues_1982_secundaria == 1){
                            //$model->acciones_pendientes_despues_1982_secundaria = $model->meta_despues_1982_secundaria - $model->acciones_despues_1982_secundaria;
                            //$model->inversion_despues_1982_secundaria = 2640;
                            //$model->inversion_despues_1982_secundaria = ($model->inversion_despues_1982_secundaria)? $model->inversion_despues_1982_secundaria : 0;

                        }else{
                            $model->acciones_despues_1982_secundaria = ($model->acciones_despues_1982_secundaria) ? $model->acciones_despues_1982_secundaria : 0;
                            $model->acciones_pendientes_despues_1982_secundaria =  $model->meta_despues_1982_secundaria - $model->acciones_despues_1982_secundaria;
                            $model->inversion_despues_1982_secundaria = ($model->inversion_despues_1982_secundaria) ? $model->inversion_despues_1982_secundaria : 0;
                            if($model->programa_despues_1982_secundaria > 1){
                                $programa_despues_1982_secundaria = Programas::findOne($model->programa_despues_1982_secundaria);
                                $model->responsable_despues_1982_secundaria = $programa_despues_1982_secundaria->responsable;
                            }

                        }
                    }else{
                        $model->meta_despues_1982_secundaria = 0;
                        $model->acciones_despues_1982_secundaria = 0;
                        $model->acciones_pendientes_despues_1982_secundaria = 0;
                        $model->inversion_despues_1982_secundaria = 0;
                        $model->fecha_inicio_despues_1982_secundaria = null;
                        $model->fecha_entrega_despues_1982_secundaria = null;
                        $model->fecha_termino_despues_1982_secundaria = null;
                        $model->programa_despues_1982_secundaria = null;
                        $model->responsable_despues_1982_secundaria = null;
                    }

                    $model->acciones_educacion = $model->acciones_3_15_escuela+$model->acciones_antes_1982_primaria+$model->acciones_despues_1982_secundaria;
                    $model->acciones_pendientez_educacion = $model->meta_educacion - $model->acciones_educacion;

                    if($model->meta_despensas == 1){
                        if($model->acciones_despensas == 1){
                            //$model->acciones_pendientes_despensas = $model->meta_despensas - $model->acciones_despensas;
                            //$model->inversion_despensas = 2640;
                            //$model->inversion_despensas = ($model->inversion_despensas)? $model->inversion_despensas : 0;

                        }else{
                            $model->acciones_despensas = ($model->acciones_despensas) ? $model->acciones_despensas : 0;
                            $model->acciones_pendientes_despensas =  $model->meta_despensas - $model->acciones_despensas;
                            $model->inversion_despensas = ($model->inversion_despensas) ? $model->inversion_despensas : 0;
                            if($model->programa_despensas > 1){
                                $programa_despensas = Programas::findOne($model->programa_despensas);
                                $model->responsable_despensas = $programa_despensas->responsable;
                            }

                        }
                    }else{
                        $model->meta_despensas = 0;
                        $model->acciones_despensas = 0;
                        $model->acciones_pendientes_despensas = 0;
                        $model->inversion_despensas = 0;
                        $model->fecha_inicio_despensas = null;
                        $model->fecha_entrega_despensas = null;
                        $model->fecha_termino_despensas = null;
                        $model->programa_despensas = null;
                        $model->responsable_despensas = null;
                    }

                    if($model->meta_ss == 1){
                        if($model->acciones_ss == 1){
                            //$model->acciones_pendientes_ss = $model->meta_ss - $model->acciones_ss;
                            //$model->inversion_ss = 2640;
                            //$model->inversion_ss = ($model->inversion_ss)? $model->inversion_ss : 0;

                        }else{
                            $model->acciones_ss = ($model->acciones_ss) ? $model->acciones_ss : 0;
                            $model->acciones_pendientes_ss =  $model->meta_ss - $model->acciones_ss;
                            $model->inversion_ss = ($model->inversion_ss) ? $model->inversion_ss : 0;
                            if($model->programa_ss > 1){
                                $programa_ss = Programas::findOne($model->programa_ss);
                                $model->responsable_ss = $programa_ss->responsable;
                            }

                        }
                    }else{
                        $model->meta_ss = 0;
                        $model->acciones_ss = 0;
                        $model->acciones_pendientes_ss = 0;
                        $model->inversion_ss = 0;
                        $model->fecha_inicio_ss = null;
                        $model->fecha_entrega_ss = null;
                        $model->fecha_termino_ss = null;
                        $model->programa_ss = null;
                        $model->responsable_ss = null;
                    }

                    if($model->meta_trabajadores_ss == 1){
                        if($model->acciones_trabajadores_ss == 1){
                            //$model->acciones_pendientes_trabajadores_ss = $model->meta_trabajadores_ss - $model->acciones_trabajadores_ss;
                            //$model->inversion_trabajadores_ss = 2640;
                            //$model->inversion_trabajadores_ss = ($model->inversion_trabajadores_ss)? $model->inversion_trabajadores_ss : 0;

                        }else{
                            $model->acciones_trabajadores_ss = ($model->acciones_trabajadores_ss) ? $model->acciones_trabajadores_ss : 0;
                            $model->acciones_pendientes_trabajadores_ss =  $model->meta_trabajadores_ss - $model->acciones_trabajadores_ss;
                            $model->inversion_trabajadores_ss = ($model->inversion_trabajadores_ss) ? $model->inversion_trabajadores_ss : 0;
                            if($model->programa_trabajadores_ss > 1){
                                $programa_trabajadores_ss = Programas::findOne($model->programa_trabajadores_ss);
                                $model->responsable_trabajadores_ss = $programa_trabajadores_ss->responsable;
                            }

                        }
                    }else{
                        $model->meta_trabajadores_ss = 0;
                        $model->acciones_trabajadores_ss = 0;
                        $model->acciones_pendientes_trabajadores_ss = 0;
                        $model->inversion_trabajadores_ss = 0;
                        $model->fecha_inicio_trabajadores_ss = null;
                        $model->fecha_entrega_trabajadores_ss = null;
                        $model->fecha_termino_trabajadores_ss = null;
                        $model->programa_trabajadores_ss = null;
                        $model->responsable_trabajadores_ss = null;
                    }


                    if($model->meta_adultos_ss == 1){
                        if($model->acciones_adultos_ss == 1){
                            //$model->acciones_pendientes_adultos_ss = $model->meta_adultos_ss - $model->acciones_adultos_ss;
                            //$model->inversion_adultos_ss = 2640;
                            //$model->inversion_adultos_ss = ($model->inversion_adultos_ss)? $model->inversion_adultos_ss : 0;

                        }else{
                            $model->acciones_adultos_ss = ($model->acciones_adultos_ss) ? $model->acciones_adultos_ss : 0;
                            $model->acciones_pendientes_adultos_ss =  $model->meta_adultos_ss - $model->acciones_adultos_ss;
                            $model->inversion_adultos_ss = ($model->inversion_adultos_ss) ? $model->inversion_adultos_ss : 0;
                            if($model->programa_adultos_ss > 1){
                                $programa_adultos_ss = Programas::findOne($model->programa_adultos_ss);
                                $model->responsable_adultos_ss = $programa_adultos_ss->responsable;
                            }

                        }
                    }else{
                        $model->meta_adultos_ss = 0;
                        $model->acciones_adultos_ss = 0;
                        $model->acciones_pendientes_adultos_ss = 0;
                        $model->inversion_adultos_ss = 0;
                        $model->fecha_inicio_adultos_ss = null;
                        $model->fecha_entrega_adultos_ss = null;
                        $model->fecha_termino_adultos_ss = null;
                        $model->programa_adultos_ss = null;
                        $model->responsable_adultos_ss = null;
                    }


                    $model->acciones_s_s = $model->acciones_ss+$model->acciones_trabajadores_ss+$model->acciones_adultos_ss;
                    $model->acciones_pendientez_s_s = $model->meta_s_s - $model->acciones_s_s;
                    $model->status = 2;


                    $model->acciones_vivienda = $model->acciones_s_s + $model->acciones_despensas + $model->acciones_educacion +
                        $model->acciones_seguro_popular + $model->acciones_servicios_basicos + $model->acciones_calidad_espacios_vivienda;
                    $model->acciones_pendientez_vivienda = $model->meta_vivienda - $model->acciones_vivienda;

                    $model->inversion_vivienda = $model->inversion_piso+$model->inversion_techo+$model->inversion_muro+$model->inversion_cuarto+$model->inversion_agua_potable+$model->inversion_agua_interior+$model->inversion_drenaje+$model->inversion_luz+$model->inversion_estufa+$model->inversion_seguro_popular+$model->inversion_3_15_escuela+$model->inversion_antes_1982_primaria+$model->inversion_despues_1982_secundaria+$model->inversion_despensas+$model->inversion_ss+$model->inversion_trabajadores_ss+$model->inversion_adultos_ss;

                    $fecha =  Yii::$app->formatter->asDatetime('now','yyyy-MM-dd H:mm:ss');
                    $apartado->apartado5 = 1;
                    $apartado->updated_at = $fecha;


                    if($model->save() && $apartado->save()){
                        //Yii::$app->session->setFlash('success', 'Registro Finalizado Correctamente');
                        return $this->redirect(['acciones-adicionales/index', 'id' => $model->solicitante_id]);
                    }

                }

                return $this->render('update', [
                    'model' => $model,
                    'apartado' => $apartado
                ]);
            }
            else{
                //Yii::$app->session->setFlash('success', 'Registro Finalizado Correctamente');
                return $this->redirect(['acciones-adicionales/index', 'id' => $model->solicitante_id]);
            }
        }
        else{
            return $this->redirect(['cedula-pobreza/update', 'id' => $id]);
        }

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
