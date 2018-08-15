<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:17 AM
 */

namespace frontend\controllers;

use common\models\DesgCenso;
use common\models\DesgSeg;
use common\models\Localidades;
use common\models\LocDesg;
use common\models\LocSeg;
use common\models\LocSegtotal;
use common\models\LocTot;
use common\models\MunDesg;
use common\models\MunTot;
use common\models\RegDesg;
use common\models\RegTot;
use common\models\Seguimiento;
use common\models\TotalReg;
use kartik\mpdf\Pdf;
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
                            $valid_roles = [Usuarios::ROLE_ADMIN, Usuarios::ROLE_DEP];
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

    public function actionIndex()
    {
        $model = TotalReg::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionRegion(array $regiones)
    {
        if ($regiones){
            $model = RegDesg::find()
                ->where(['id' => $regiones])
                ->all();
            return $this->render('region', [
                'model' => $model,
                'excel' => $regiones
            ]);
        }
        else{
            return $this->render('reg');
        }
    }

    public function actionRegionpdf(array $excel)
    {
        if ($excel){
            $model = RegDesg::find()->where(['id' => $excel])->all();
            $content = $this->renderPartial('_desg_reg', [
                'model'=> $model
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'desg_reg.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Desgloce Region'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                
                th, td {
                    text-align: left;
                    padding: 8px;
                }
                
                tr:nth-child(even){background-color: #A8AC90}',
            ]);
            return $pdf->render();
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

    public function actionMunicipio(array $municipios)
    {
        if ($municipios) {
            $model = MunDesg::find()
                ->where(['id' => $municipios])
                ->all();
            return $this->render('municipio', [
                'model' => $model,
                'excel' => $municipios
            ]);
        }else{
            return $this->render('mun');
        }
    }

    public function actionMunicipiopdf(array $excel)
    {
        if ($excel){
            $model = MunDesg::find()->where(['id' => $excel])->all();
            $content = $this->renderPartial('_desg_mun', [
                'model'=> $model
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'desg_mun.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Desgloce Municipio'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                
                th, td {
                    text-align: left;
                    padding: 8px;
                }
                
                tr:nth-child(even){background-color: #A8AC90}',
            ]);
            return $pdf->render();
        }
        else{
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

    public function actionLocalidad(array $localidades)
    {
        if ($localidades){
            $model = LocDesg::find()
                ->where(['desc_loc' => $localidades])
                ->all();
            return $this->render('localidad', [
                'model' => $model,
                'excel' => $localidades
            ]);
        }else{
            return $this->render('loc');
        }
    }

    public function actionLocalidadcen(array $localidades)
    {
        if ($localidades){
            $model = DesgCenso::find()
                ->where(['desc_loc' => $localidades])
                ->all();
            return $this->render('localidadcen', [
                'model' => $model,
                'excel' => $localidades
            ]);
        }else{
            return $this->render('locen');
        }
    }

    public function actionLocalidadseg(array $localidades)
    {
        if ($localidades){
            $model = LocSeg::find()
                ->where(['desc_loc' => $localidades])
                ->all();
            return $this->render('localidadseg', [
                'model' => $model,
                'excel' => $localidades
            ]);
        }else{
            return $this->render('locseg');
        }
    }

    public function actionLocalidadpdf(array $excel)
    {
        if ($excel){
            $model = LocDesg::find()->where(['desc_loc' => $excel])->all();
            $content = $this->renderPartial('_desg_loc', [
                'model'=> $model
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'desg_loc.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Desgloce Localidades'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                
                th, td {
                    text-align: left;
                    padding: 8px;
                }
                
                tr:nth-child(even){background-color: #A8AC90}',
            ]);
            return $pdf->render();
        }else{
            return $this->render('loc');
        }
    }

    public function actionLocalidadsegpdf($id)
    {
        $localidad = Localidades::find()->where(['localidad_id' => $id])->one();
        if ($localidad){
            $municipio = $localidad->mun->nombre_mun;
            $seguimiento = new Seguimiento();
            $semaforo = $seguimiento->getSemaforoLocalidad($localidad->localidad_id,90);
            $semaforos = $seguimiento->getSemaforosLocalidad($localidad->localidad_id);

            //var_dump($semaforos); die;
            $model = LocSegtotal::find()->where(['loc_id' => $localidad->localidad_id])->one();
            $content = $this->renderPartial('_seg_total', [
                'model'=> $model,
                'semaforo' => $semaforo,
                'semaforos' => $semaforos,
                'municipio' => $municipio
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'desg_loc.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 22,
                'marginBottom'=> 22,
                'marginHeader'=> 5,
                'options' => [
                    'title' => 'Localidad Seguimiento'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '   
                    .alert-success-seg {
                        color: white;
                        background-color: #CC0066;
                        border-color: #CC0066;
                    },
                    .container {
                      display: table;
                      width: 100%;
                    }
                    .container div {
                      display: table-cell;
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
                        
                        ', 'line' => 1
                    ],
                    'SetFooter' => ['
                        <table width="100%">
                            <tr>
                                <td width="25%"></td>
                                <td width="50%" align="center"><p style="font-size: 5pt">{PAGENO}/{nbpg}</p></td>                            
                                <td width="25%" align="right">
                                    <p style="font-size: 5pt">Elaboró: UDITI </p>
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
        }else{
            return $this->render('loc');
        }
    }

    public function actionPdfcenso($id)
    {
        if ($id){
            $model = DesgCenso::find()->where(['desc_loc' => $id])->one();
            $x = new DesgCenso();
            $y = $x->actionCenso($model->desc_loc);
            $p = $x->actionCenso2($model->desc_loc);
            $content = $this->renderPartial('_desg_loc_censo', [
                'model'=> $model,
                'necesidades' => $y,
                'necesita' => $p
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'censodetails.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 22,
                'marginBottom'=> 13,
                'marginHeader'=> 5,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Censos'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '   
                    .alert-success-censo {
                        color: white;
                        background-color: #9BBB59;
                        border-color: #9BBB59;
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
                        
                        ', 'line' => 1
                    ],
                    'SetFooter' => ['
                        <table width="100%">
                            <tr>
                                <td width="25%"></td>
                                <td width="50%" align="center"><p style="font-size: 5pt">{PAGENO}/{nbpg}</p></td>                            
                                <td width="25%" align="right">
                                    <p style="font-size: 5pt">Elaboró: UDITI </p>
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
        }else{
            return $this->render('locen');
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

    public function actionExcelseg($id)
    {
        if ($id){

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Seguimiento Localidad' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => DesgSeg::find()->where(['loc_id' => $id]),
                        'attributes' => [
                            'id',
                            'num_personas',
                            'otra_referencia',
                            'meta_piso',
                            'acciones_piso',
                            'acciones_pendientes_piso',
                            'inversion_piso',
                            'fecha_inicio_piso',
                            'fecha_entrega_piso',
                            'fecha_termino_piso',
                            'programa_piso',
                            'responsable_piso',
                            'meta_techo',
                            'acciones_techo',
                            'acciones_pendientes_techo',
                            'inversion_techo',
                            'fecha_inicio_techo',
                            'fecha_entrega_techo',
                            'fecha_termino_techo',
                            'programa_techo',
                            'responsable_techo',
                            'meta_muro',
                            'acciones_muro',
                            'acciones_pendientes_muro',
                            'inversion_muro',
                            'fecha_inicio_muro',
                            'fecha_entrega_muro',
                            'fecha_termino_muro',
                            'programa_muro',
                            'responsable_muro',
                            'meta_cuarto',
                            'acciones_cuarto',
                            'acciones_pendientes_cuarto',
                            'inversion_cuarto',
                            'fecha_inicio_cuarto',
                            'fecha_entrega_cuarto',
                            'fecha_termino_cuarto',
                            'programa_cuarto',
                            'responsable_cuarto',
                            'meta_calidad_espacios_vivienda',
                            'acciones_calidad_espacios_vivienda',
                            'acciones_pendientez_calidad_espacios_vivienda',
                            'meta_agua_potable',
                            'acciones_agua_potable',
                            'acciones_pendientes_agua_potable',
                            'inversion_agua_potable',
                            'fecha_inicio_agua_potable',
                            'fecha_entrega_agua_potable',
                            'fecha_termino_agua_potable',
                            'programa_agua_potable',
                            'responsable_agua_potable',
                            'meta_agua_interior',
                            'acciones_agua_interior',
                            'acciones_pendientes_agua_interior',
                            'inversion_agua_interior',
                            'fecha_inicio_agua_interior',
                            'fecha_entrega_agua_interior',
                            'fecha_termino_agua_interior',
                            'programa_agua_interior',
                            'responsable_agua_interior',
                            'meta_drenaje',
                            'acciones_drenaje',
                            'acciones_pendientes_drenaje',
                            'inversion_drenaje',
                            'fecha_inicio_drenaje',
                            'fecha_entrega_drenaje',
                            'fecha_termino_drenaje',
                            'programa_drenaje',
                            'responsable_drenaje',
                            'meta_luz',
                            'acciones_luz',
                            'acciones_pendientes_luz',
                            'inversion_luz',
                            'fecha_inicio_luz',
                            'fecha_entrega_luz',
                            'fecha_termino_luz',
                            'programa_luz',
                            'responsable_luz',
                            'meta_estufa',
                            'acciones_estufa',
                            'acciones_pendientes_estufa',
                            'inversion_estufa',
                            'fecha_inicio_estufa',
                            'fecha_entrega_estufa',
                            'fecha_termino_estufa',
                            'programa_estufa',
                            'responsable_estufa',
                            'meta_servicios_basicos',
                            'acciones_servicios_basicos',
                            'acciones_pendientez_servicios_basicos',
                            'meta_seguro_popular',
                            'acciones_seguro_popular',
                            'acciones_pendientes_seguro_popular',
                            'inversion_seguro_popular',
                            'fecha_inicio_seguro_popular',
                            'fecha_entrega_seguro_popular',
                            'fecha_termino_seguro_popular',
                            'programa_seguro_popular',
                            'responsable_seguro_popular',
                            'meta_3_15_escuela',
                            'acciones_3_15_escuela',
                            'acciones_pendientes_3_15_escuela',
                            'inversion_3_15_escuela',
                            'fecha_inicio_3_15_escuela',
                            'fecha_entrega_3_15_escuela',
                            'fecha_termino_3_15_escuela',
                            'programa_3_15_escuela',
                            'responsable_3_15_escuela',
                            'meta_antes_1982_primaria',
                            'acciones_antes_1982_primaria',
                            'acciones_pendientes_antes_1982_primaria',
                            'inversion_antes_1982_primaria',
                            'fecha_inicio_antes_1982_primaria',
                            'fecha_entrega_antes_1982_primaria',
                            'fecha_termino_antes_1982_primaria',
                            'programa_antes_1982_primaria',
                            'responsable_antes_1982_primaria',
                            'meta_despues_1982_secundaria',
                            'acciones_despues_1982_secundaria',
                            'acciones_pendientes_despues_1982_secundaria',
                            'inversion_despues_1982_secundaria',
                            'fecha_inicio_despues_1982_secundaria',
                            'fecha_entrega_despues_1982_secundaria',
                            'fecha_termino_despues_1982_secundaria',
                            'programa_antes_1982_primaria',
                            'responsable_despues_1982_secundaria',
                            'meta_educacion',
                            'acciones_educacion',
                            'acciones_pendientez_educacion',
                            'meta_despensas',
                            'acciones_despensas',
                            'acciones_pendientes_despensas',
                            'inversion_despensas',
                            'fecha_inicio_despensas',
                            'fecha_entrega_despensas',
                            'fecha_termino_despensas',
                            'programa_despensas',
                            'responsable_despensas',
                            'meta_ss',
                            'acciones_ss',
                            'acciones_pendientes_ss',
                            'inversion_ss',
                            'fecha_inicio_ss',
                            'fecha_entrega_ss',
                            'fecha_termino_ss',
                            'programa_ss',
                            'responsable_ss',
                            'meta_trabajadores_ss',
                            'acciones_trabajadores_ss',
                            'acciones_pendientes_trabajadores_ss',
                            'inversion_trabajadores_ss',
                            'fecha_inicio_trabajadores_ss',
                            'fecha_entrega_trabajadores_ss',
                            'fecha_termino_trabajadores_ss',
                            'programa_trabajadores_ss',
                            'responsable_trabajadores_ss',
                            'meta_adultos_ss',
                            'acciones_adultos_ss',
                            'acciones_pendientes_adultos_ss',
                            'inversion_adultos_ss',
                            'fecha_inicio_adultos_ss',
                            'fecha_entrega_adultos_ss',
                            'fecha_termino_adultos_ss',
                            'programa_adultos_ss',
                            'responsable_adultos_ss',
                            'meta_s_s',
                            'acciones_s_s',
                            'acciones_pendientez_s_s',
                            'meta_vivienda',
                            'acciones_vivienda',
                            'acciones_pendientez_vivienda',
                            'inversion_vivienda'

                        ],
                    ]
                ]
            ]);
            return $file->send('seguimiento_loc'.$id.'.xlsx');
        }
        else{
            return $this->render('locseg');
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

    public function actionLocen()
    {
        return $this->render('locen');
    }

    public function actionLocseg()
    {
        return $this->render('locseg');
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

    public function actionRegiontotal(array $regiones)
    {
        if ($regiones){
            $model = RegTot::find()
                ->where(['id' => $regiones])
                ->all();
            return $this->render('regiontotal', [
                'model' => $model,
                'excel' => $regiones
            ]);
        }
        else{
            return $this->render('regtot');
        }
    }

    public function actionRegiontotalpdf(array $excel)
    {
        if ($excel){
            $model = RegTot::find()->where(['id' => $excel])->all();
            $content = $this->renderPartial('_tot_reg', [
                'model'=> $model
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'tot_reg.pdf',
                'marginLeft'=> 10,
                'marginRight'=> 10,
                'marginTop'=> 10,
                'marginBottom'=> 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Total Regiones'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                
                th, td {
                    text-align: left;
                    padding: 8px;
                }
                
                tr:nth-child(even){background-color: #A8AC90}',
            ]);
            return $pdf->render();
        }else{
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

    public function actionMunicipiototal(array $municipios)
    {
        if ($municipios) {
            $model = MunTot::find()
                ->where(['id' => $municipios])
                ->all();
            return $this->render('municipiototal', [
                'model' => $model,
                'excel' => $municipios
            ]);
        }else{
            return $this->render('muntot');
        }
    }

    public function actionMunicipiototalpdf(array $excel)
    {
        if ($excel) {
            $model = MunTot::find()->where(['id' => $excel])->all();
            $content = $this->renderPartial('_tot_mun', [
                'model' => $model
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'tot_mun.pdf',
                'marginLeft' => 10,
                'marginRight' => 10,
                'marginTop' => 10,
                'marginBottom' => 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Total Municipios'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                
                th, td {
                    text-align: left;
                    padding: 8px;
                }
                
                tr:nth-child(even){background-color: #A8AC90}',
            ]);
            return $pdf->render();
        } else {
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

    public function actionLocalidadtotal(array $localidades)
    {
        if ($localidades){
            $model = LocTot::find()->where(['desc_loc' => $localidades])->all();
            return $this->render('localidadtotal', [
                'model' => $model,
                'excel' => $localidades
            ]);
        }else{
            return $this->render('loctot');
        }
    }

    public function actionLocalidadtotalpdf(array $excel)
    {
        if ($excel) {
            $model = LocTot::find()->where(['desc_loc' => $excel])->all();
            $content = $this->renderPartial('_tot_loc', [
                'model' => $model
            ]);
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4,
                'destination' => Pdf::DEST_BROWSER,
                'content' => $content,
                'filename' => 'tot_loc.pdf',
                'marginLeft' => 10,
                'marginRight' => 10,
                'marginTop' => 10,
                'marginBottom' => 13,
                'orientation' => Pdf::FORMAT_A4,
                'options' => [
                    'title' => 'Total Localidades'
                ],
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                
                th, td {
                    text-align: left;
                    padding: 8px;
                }
                
                tr:nth-child(even){background-color: #A8AC90}',
            ]);
            return $pdf->render();
        } else {
            return $this->render('muntot');
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
