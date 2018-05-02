<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FormatoLocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formato Localidadades';
?>
<div class="formato-loc-index">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Formato Localidadades</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?php if(Yii::$app->user->identity->role != 40): ?>
                <?= Html::a('Nuevo Formato', ['create'], ['class' => 'btn btn-success']) ?>
                <?php endif; ?>
            </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                    'emptyText' => "No se encontró ningún elemento",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
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
                            'filter' => Html::activeDropDownList($searchModel, 'loc_id',
                                \yii\helpers\ArrayHelper::map(\common\models\Localidades::getLocOk(), 'localidad_id', 'desc_loc'),
                                ['class'=>'form-control','prompt' => 'Seleccione una Localidad']),
                        ],
                        //'num_habitantes',
                        //'ocupantes_por_vivienda',
                        //'indice_marginacion',
                        //'indentificacion_hogares',
                        //'calidad_vivienda',
                        //'serv_basicos',
                        //'acceso_edu',
                        //'salud',
                        //'seguridad_social',
                        //'ingresos',
                        //'alimentacion',
                        //'vinculacion',
                        //'acceso_terrestre',
                        //'status',
                        //'created_by',
                        //'updated_by',
                        //'created_at',
                        //'updated_at',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acciones',
                            'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{update}{borrar}{formato}',
                            'buttons' => [
                                'update' => function ($url, $model) {
                                if(Yii::$app->user->identity->role != 40) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('app', 'editar'),
                                    ]);
                                }else{
                                    return "";
                                }
                                },
                                'formato' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, [
                                        'title' => Yii::t('app', 'formato'),
                                    ]);
                                },

                                'borrar' => function ($url, $model) {
                                    if(Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20){
                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
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
                                    $url =Yii::$app->homeUrl.'formato-loc/update?id='.$model->id;
                                    return $url;
                                }
                                if ($action === 'borrar') {
                                    $url =Yii::$app->homeUrl.'formato-loc/delete?id='.$model->id;
                                    return $url;
                                }
                                if ($action === 'formato') {
                                    $url =Yii::$app->homeUrl.'formato-loc/formato?id='.$model->id;
                                    return $url;
                                }
                            }
                        ],
                    ],
                ]); ?>
        </div>
    </div>
</div>
