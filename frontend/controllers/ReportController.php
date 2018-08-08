<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:17 AM
 */

namespace frontend\controllers;

use common\models\DesgCenso;
use common\models\LocDesg;
use common\models\LocTot;
use common\models\MunDesg;
use common\models\MunTot;
use common\models\RegDesg;
use common\models\RegTot;
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
                                    <p style="font-size: 5pt">Elaboró: CIEPS &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Revisó: UDITI </p>
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
