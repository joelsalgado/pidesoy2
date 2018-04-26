<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:17 AM
 */

namespace frontend\controllers;

use common\models\LocDesg;
use common\models\LocTot;
use common\models\MunDesg;
use common\models\MunTot;
use common\models\RegDesg;
use common\models\RegTot;
use common\models\TotalReg;
use Yii;
use common\models\User as Usuarios;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class ReportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'region', 'municipio', 'localidad', 'total'],
                'rules' => [
                    [
                        'actions' => ['index', 'region', 'municipio', 'localidad', 'total'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = [Usuarios::ROLE_ADMIN];
                            return Usuarios::roleInArray($valid_roles);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = TotalReg::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionRegion()
    {
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = RegDesg::find()
                ->where(['id' => $post_array['regiones']])
                ->all();
            return $this->render('region', [
                'model' => $model,
                'excel' => $post_array['regiones']
            ]);
        }
        else{
            return $this->render('reg');
        }
    }

    public function actionRegionexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Desgloce Regiones' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => RegDesg::find()->where(['id' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_region',
                            'num_personas',
                            'per_0_15',
                            'per_16_17',
                            'per_18_64',
                            'per_65_mas',
                            'vivienda_propia',
                            'vivienda_compartida',
                            'vivienda_prestada',
                            'vivienda_rentada',
                            'num_familias',
                            'sin_piso',
                            'sin_techo',
                            'sin_muro',
                            'hacentamiento',
                            'agua_interior',
                            'servicio_agua',
                            'falta_drenaje',
                            'falta_conectar',
                            'falta_luz',
                            'cocina_gas',
                            'cocina_luz',
                            'cocina_lena',
                            'cocina_carbon',
                            'cocina_otro',
                            'falta_chimenea',
                            'falta_excusado',
                            'falta_refrigerador',
                            'falta_lavadora',
                            'educ_trunca_3_15',
                            'educ_no_asiste_3_15',
                            'educ_no_prim_35',
                            'educ_sec_inc_16_35',
                            'educ_analfabeta_may_15',
                            'educ_prim_inc_may_15',
                            'educ_no_asiste_6_14',
                            'salud_recibe',
                            'seguro_popular',
                            'issemyn',
                            'imss',
                            'marina_sedena',
                            'isste',
                            'pemex',
                            'otro_serv_med',
                            'ss_trabajo_formal',
                            'ss_trabajo_sin',
                            'ss_adultos_may_sin',
                            'cuantos_ingresos',
                            'jefe_familia',
                            'jefa_familia',
                            'hijo',
                            'autoingreso',
                            'apoyo_gobierno',
                            'apoyo_extranjero',
                            'pension',
                            'madre_soltera_labora',
                            'menor_poca_variedad',
                            'menor_falta_alimentos',
                            'menor_menor_porcion',
                            'menor_hambre',
                            'menor_acosto_hambre',
                            'menor_sin_comer_dia',
                            'adulto_poca_variedad',
                            'adulto_falta_alimentos',
                            'adulto_menor_porcion',
                            'quedaron_sin_comida',
                            'adulto_hambre',
                            'adulto_sin_comer_dia',
                            'vinc_prog_liconsa',
                            'vinc_prog_diconsa',
                            'vinc_prog_abastece_diconsa',
                            'vinc_prog_comedor',
                            'vinc_prog_asiste_comedor',
                            'vinc_prog_acceso',
                            'vinc_prog_prospera'
                        ],
                    ]
                ]
            ]);
            return $file->send('desg_reg.xlsx');
        }
        else{
            return $this->render('reg');
        }
    }

    public function actionMunicipio()
    {
        if (Yii::$app->request->post()) {
            $post_array = Yii::$app->request->post();
            $model = MunDesg::find()
                ->where(['id' => $post_array['municipios']])
                ->all();
            return $this->render('municipio', [
                'model' => $model,
                'excel' => $post_array['municipios']
            ]);
        }else{
            return $this->render('mun');
        }
    }

    public function actionMunicipioexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Desgloce Municipio' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => MunDesg::find()->where(['id' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_mun',
                            'num_personas',
                            'per_0_15',
                            'per_16_17',
                            'per_18_64',
                            'per_65_mas',
                            'vivienda_propia',
                            'vivienda_compartida',
                            'vivienda_prestada',
                            'vivienda_rentada',
                            'num_familias',
                            'sin_piso',
                            'sin_techo',
                            'sin_muro',
                            'hacentamiento',
                            'agua_interior',
                            'servicio_agua',
                            'falta_drenaje',
                            'falta_conectar',
                            'falta_luz',
                            'cocina_gas',
                            'cocina_luz',
                            'cocina_lena',
                            'cocina_carbon',
                            'cocina_otro',
                            'falta_chimenea',
                            'falta_excusado',
                            'falta_refrigerador',
                            'falta_lavadora',
                            'educ_trunca_3_15',
                            'educ_no_asiste_3_15',
                            'educ_no_prim_35',
                            'educ_sec_inc_16_35',
                            'educ_analfabeta_may_15',
                            'educ_prim_inc_may_15',
                            'educ_no_asiste_6_14',
                            'salud_recibe',
                            'seguro_popular',
                            'issemyn',
                            'imss',
                            'marina_sedena',
                            'isste',
                            'pemex',
                            'otro_serv_med',
                            'ss_trabajo_formal',
                            'ss_trabajo_sin',
                            'ss_adultos_may_sin',
                            'cuantos_ingresos',
                            'jefe_familia',
                            'jefa_familia',
                            'hijo',
                            'autoingreso',
                            'apoyo_gobierno',
                            'apoyo_extranjero',
                            'pension',
                            'madre_soltera_labora',
                            'menor_poca_variedad',
                            'menor_falta_alimentos',
                            'menor_menor_porcion',
                            'menor_hambre',
                            'menor_acosto_hambre',
                            'menor_sin_comer_dia',
                            'adulto_poca_variedad',
                            'adulto_falta_alimentos',
                            'adulto_menor_porcion',
                            'quedaron_sin_comida',
                            'adulto_hambre',
                            'adulto_sin_comer_dia',
                            'vinc_prog_liconsa',
                            'vinc_prog_diconsa',
                            'vinc_prog_abastece_diconsa',
                            'vinc_prog_comedor',
                            'vinc_prog_asiste_comedor',
                            'vinc_prog_acceso',
                            'vinc_prog_prospera'
                        ],
                    ]
                ]
            ]);
            return $file->send('desg_mun.xlsx');
        }
        else{
            return $this->render('mun');
        }
    }

    public function actionLocalidad()
    {
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = LocDesg::find()->where(['desc_loc' => $post_array['localidades']])->all();
            return $this->render('localidad', [
                'model' => $model,
                'excel' => $post_array['localidades']
            ]);
        }else{
            return $this->render('loc');
        }
    }

    public function actionLocalidadexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Desgloce Localidad' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => LocDesg::find()->where(['desc_loc' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_loc',
                            'num_personas',
                            'per_0_15',
                            'per_16_17',
                            'per_18_64',
                            'per_65_mas',
                            'vivienda_propia',
                            'vivienda_compartida',
                            'vivienda_prestada',
                            'vivienda_rentada',
                            'num_familias',
                            'sin_piso',
                            'sin_techo',
                            'sin_muro',
                            'hacentamiento',
                            'agua_interior',
                            'servicio_agua',
                            'falta_drenaje',
                            'falta_conectar',
                            'falta_luz',
                            'cocina_gas',
                            'cocina_luz',
                            'cocina_lena',
                            'cocina_carbon',
                            'cocina_otro',
                            'falta_chimenea',
                            'falta_excusado',
                            'falta_refrigerador',
                            'falta_lavadora',
                            'educ_trunca_3_15',
                            'educ_no_asiste_3_15',
                            'educ_no_prim_35',
                            'educ_sec_inc_16_35',
                            'educ_analfabeta_may_15',
                            'educ_prim_inc_may_15',
                            'educ_no_asiste_6_14',
                            'salud_recibe',
                            'seguro_popular',
                            'issemyn',
                            'imss',
                            'marina_sedena',
                            'isste',
                            'pemex',
                            'otro_serv_med',
                            'ss_trabajo_formal',
                            'ss_trabajo_sin',
                            'ss_adultos_may_sin',
                            'cuantos_ingresos',
                            'jefe_familia',
                            'jefa_familia',
                            'hijo',
                            'autoingreso',
                            'apoyo_gobierno',
                            'apoyo_extranjero',
                            'pension',
                            'madre_soltera_labora',
                            'menor_poca_variedad',
                            'menor_falta_alimentos',
                            'menor_menor_porcion',
                            'menor_hambre',
                            'menor_acosto_hambre',
                            'menor_sin_comer_dia',
                            'adulto_poca_variedad',
                            'adulto_falta_alimentos',
                            'adulto_menor_porcion',
                            'quedaron_sin_comida',
                            'adulto_hambre',
                            'adulto_sin_comer_dia',
                            'vinc_prog_liconsa',
                            'vinc_prog_diconsa',
                            'vinc_prog_abastece_diconsa',
                            'vinc_prog_comedor',
                            'vinc_prog_asiste_comedor',
                            'vinc_prog_acceso',
                            'vinc_prog_prospera'
                        ],
                    ]
                ]
            ]);
            return $file->send('desg_loc.xlsx');
        }
        else{
            return $this->render('loc');
        }
    }

    public function actionTotal()
    {
        $model = TotalReg::find()->all();
        return $this->render('total', [
            'model' => $model,
        ]);
    }

    public function actionReg()
    {
        return $this->render('reg');
    }

    public function actionLoc()
    {
        return $this->render('loc');
    }

    public function actionMun()
    {
        return $this->render('mun');
    }

    public function actionRegtot()
    {
        return $this->render('regtot');
    }

    public function actionLoctot()
    {
        return $this->render('loctot');
    }

    public function actionMuntot()
    {
        return $this->render('muntot');
    }

    public function actionRegiontotal()
    {
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = RegTot::find()
                ->where(['id' => $post_array['regiones']])
                ->all();
            return $this->render('regiontotal', [
                'model' => $model,
                'excel' => $post_array['regiones']
            ]);
        }
        else{
            return $this->render('regtot');
        }
    }

    public function actionRegiontotalexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Resultados Regiones' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => RegTot::find()->where(['id' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_region',
                            'pobreza_extrema',
                            'pobreza_moderada',
                            'vulnerable_por_ingresos',    // Related attribute
                            'vulnerable_por_carencias',
                            'no_vulnerable',
                        ],
                    ]
                ]
            ]);
             return $file->send('result_reg.xlsx');
        }
        else{
            return $this->render('regtot');
        }
    }

    public function actionMunicipiototal()
    {
        if (Yii::$app->request->post()) {
            $post_array = Yii::$app->request->post();
            $model = MunTot::find()
                ->where(['id' => $post_array['municipios']])
                ->all();
            return $this->render('municipiototal', [
                'model' => $model,
                'excel' => $post_array['municipios']
            ]);
        }else{
            return $this->render('muntot');
        }
    }

    public function actionMunicipiototalexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Resultados Municipio' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => MunTot::find()->where(['id' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_mun',
                            'pobreza_extrema',
                            'pobreza_moderada',
                            'vulnerable_por_ingresos',    // Related attribute
                            'vulnerable_por_carencias',
                            'no_vulnerable',
                        ],
                    ]
                ]
            ]);
            return $file->send('result_mun.xlsx');
        }
        else{
            return $this->render('muntot');
        }
    }



    public function actionLocalidadtotal()
    {
        if (Yii::$app->request->post()){
            $post_array = Yii::$app->request->post();
            $model = LocTot::find()->where(['desc_loc' => $post_array['localidades']])->all();
            return $this->render('localidadtotal', [
                'model' => $model,
                'excel' => $post_array['localidades']
            ]);
        }else{
            return $this->render('loctot');
        }
    }

    public function actionLocalidadtotalexcel(array $excel)
    {
        if ($excel){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Resultados Localidad' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => LocTot::find()->where(['desc_loc' => $excel]),
                        'formats' => 0,
                        'attributes' => [
                            'desc_loc',
                            'pobreza_extrema',
                            'pobreza_moderada',
                            'vulnerable_por_ingresos',    // Related attribute
                            'vulnerable_por_carencias',
                            'no_vulnerable',
                        ],
                    ]
                ]
            ]);
            return $file->send('result_loc.xlsx');
        }
        else{
            return $this->render('loctot');
        }
    }
}
