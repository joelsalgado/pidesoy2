<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programación';
?>
<div class="bitacora-familia-index">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Programación y Seguimiento de actividades, sesiones, eventos y otros por localidad</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Nueva Programación', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
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
                    //'mes',
                    //'periodo',
                    [
                        'attribute' => 'fecha',
                        'value' => 'fecha',
                        'filter' => \kartik\date\DatePicker::widget([
                            'name' => 'BitacoraReunionSearch[fecha]',
                            'type' => \kartik\date\DatePicker::TYPE_COMPONENT_PREPEND,
                            'language' => 'es',
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                                'startDate' => '2017-01-01',
                                'endDate' => '2020-01-01',
                                //'value' => '22-10-1999'
                            ]
                        ]),
                        'format' => 'html',
                    ],
                    //'status',
                    //'created_by',
                    //'updated_by',
                    //'created_at',
                    //'updated_at',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acciones',
                        'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => '{update}{borrar}{pdf}',
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
                            'pdf' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, [
                                    'title' => Yii::t('app', 'pdf'),
                                ]);
                            },

                            'borrar' => function ($url, $model) {
                                if(Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20){
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'data' => [
                                            'confirm' => 'Estas seguro de borrar a este registro',
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
                                $url =Yii::$app->homeUrl.'programacion/update?id='.$model->id;
                                return $url;
                            }
                            if ($action === 'borrar') {
                                $url =Yii::$app->homeUrl.'programacion/delete?id='.$model->id;
                                return $url;
                            }
                            if ($action === 'pdf') {
                                $url =Yii::$app->homeUrl.'programacion/pdf?id='.$model->id;
                                return $url;
                            }
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>