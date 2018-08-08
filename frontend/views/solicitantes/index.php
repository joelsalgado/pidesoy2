<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SolicitantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitantes-index">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Participantes</h3>
        </div>
        <div class="box-body">

            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="table-responsive">
            <p class="pull-right">
                <?php if(Yii::$app->user->identity->role != 40): ?>
                <?= Html::a('Crear Participante', ['create'], ['class' => 'btn btn-success']) ?>
                <?php endif;?>
            </p>

                <?php try {
                    echo
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                        'emptyText' => "No se encontró ningún elemento",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'periodo',
                            //'entidad_id',
                            //'region_id',
                            [
                                'attribute' => 'mun_id',
                                'value' => function($data){
                                    $role = "";
                                    if($data->mun_id == null){
                                        $role = "";
                                    }else {
                                        $reg = \common\models\Municpios::find()->where(['id' => $data->mun_id])->one();
                                        $role = $reg->desc_mun;
                                    }

                                    return $role;
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'mun_id',
                                    \yii\helpers\ArrayHelper::map(\common\models\Municpios::getMunOk(), 'id', 'desc_mun'),
                                    ['class'=>'form-control','prompt' => 'Seleccione un municipio']),
                            ],
                            [
                                'attribute' => 'loc_id',
                                'value' => function($data){
                                    $role = "";
                                    if($data->loc_id == null){
                                        $role = "";
                                    }else {
                                        $reg = \common\models\Localidades::find()->where(['localidad_id' => $data->loc_id])->one();
                                        $role = $reg->desc_loc;
                                    }

                                    return $role;
                                },
                                'filter' =>
                                    Html::activeDropDownList($searchModel, 'loc_id',
                                    \yii\helpers\ArrayHelper::map(\common\models\Localidades::getLocIndex($searchModel->mun_id),
                                        'localidad_id', 'desc_loc'),

                                    ['class'=>'form-control','prompt' => 'Seleccione una Localidad']),
                            ],
                            //'mun_id',
                            //'loc_id',
                            'nombre',
                            'apellido_paterno',
                            'apellido_materno',
                            //'edo_civil_id',
                            //'fecha_nacimiento',
                            //'edad',
                            //'sexo',
                            //'telefono',
                            //'calle',
                            //'colonia',
                            //'num_ext',
                            //'num_int',
                            //'codigo_postal',
                            //'otra_referencia',
                            //'status',
                            [
                                'label' => 'Semaforo',
                                'format' => 'html',
                                'value' => function($data){
                                    $resultado = \common\models\Seguimiento::getSemaforo($data->id);
                                    if($resultado){
                                        switch ($resultado) {
                                            case ($resultado >= 100):
                                                return '<p align= "center"><img src="'.Yii::$app->homeUrl.'images/1.png" height="30" width="30"></p>';
                                                break;
                                            case ($resultado >= 91):
                                                return '<p align= "center"><img src="'.Yii::$app->homeUrl.'images/2.png" height="30" width="30"></p>';
                                                break;
                                            case ($resultado >= 61):
                                                return '<p align= "center"><img src="'.Yii::$app->homeUrl.'images/3.png" height="30" width="30"></p>';
                                                break;
                                            case ($resultado < 61):
                                                return '<p align= "center"><img src="'.Yii::$app->homeUrl.'images/4.png" height="30" width="30"></p>';
                                                break;
                                        }
                                    }else{
                                        return '';
                                    }
                                }
                            ],
                            [
                                'label' => 'Validado',
                                'format' => 'html',
                                'value' => function($data){
                                    if ($data->check ==1){
                                        return '<p style="color:green;" align="center"><span class="glyphicon glyphicon-ok"></span></p>';
                                    }
                                    else{
                                        return '<p style="color:red;"align="center"><span class="glyphicon glyphicon-remove"></span></p>';
                                    }
                                }

                            ],
                            //'created_by',
                            //'updated_by',
                            //'created_at',
                            //'updated_at',

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Acciones',
                                'headerOptions' => ['style' => 'color:#337ab7'],
                                'template' => '{update}{borrar}{pobreza}',
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        if(Yii::$app->user->identity->role != 40){
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                            'title' => Yii::t('app', 'editar'),
                                        ]);}
                                        else{
                                            return "";
                                        }
                                    },
                                    'pobreza' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, [
                                            'title' => Yii::t('app', 'pobreza'),
                                        ]);
                                    },

                                    'borrar' => function ($url, $model) {
                                        if(Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20){
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'data' => [
                                                    'confirm' => 'Estas seguro de borrar a este usuario',
                                                ],
                                                'title' => Yii::t('app', 'borrar'),
                                            ]);
                                        }
                                        else {
                                            return "";
                                        }
                                    }

                                ],
                                'urlCreator' => function ($action, $model, $key, $index) {
                                    if ($action === 'update') {
                                        $url =Yii::$app->homeUrl.'solicitantes/update?id='.$model->id;
                                        return $url;
                                    }
                                    if ($action === 'borrar') {
                                        $url =Yii::$app->homeUrl.'solicitantes/delete?id='.$model->id;
                                        return $url;
                                    }
                                    if ($action === 'pobreza') {
                                        $url =Yii::$app->homeUrl.'solicitantes/pobreza?id='.$model->id;
                                        return $url;
                                    }
                                }
                            ],
                        ],
                    ]);
                } catch (Exception $e) {
                } ?>
            </div>
            <table class="table table-bored">
                <thead>
                    <tr>
                        <th>Semaforo</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="<?=Yii::$app->homeUrl?>images/1.png" height="30" width="30">
                        </td>
                        <td>
                            <p>Excelente (100%), cuando se cumple de manera amplia y en tiempo la acción a realizar.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?=Yii::$app->homeUrl?>images/2.png" height="30" width="30">
                        </td>
                        <td>
                            <p>Buena (91-99%), cuando se tiene un avance significativo de la acción/gestión.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?=Yii::$app->homeUrl?>images/3.png" height="30" width="30">
                        </td>
                        <td>
                            <p>Regular (61-90%), cuando esta cumple mínimamente con el avance de la acción/gestión</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?=Yii::$app->homeUrl?>images/4.png" height="30" width="30">
                        </td>
                        <td>
                            <p>Insuficiente (0-60%), cuando la acción/gestión solo se ha desarrollado de forma o no se ha iniciado</p>
                        </td>
                    </tr>
                </tbody>

            </table>


        </div>
    </div>
</div>
