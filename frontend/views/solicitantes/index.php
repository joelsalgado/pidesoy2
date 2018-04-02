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

            <p class="pull-right">
                <?= Html::a('Crear Participante', ['create'], ['class' => 'btn btn-success']) ?>
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
                        //'mun_id',
                        //'loc_id',
                        'nombre',
                        'apellido_paterno',
                        'apellido_materno',
                        //'edo_civil_id',
                        'fecha_nacimiento',
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
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('app', 'editar'),
                                    ]);
                                },
                                'pobreza' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, [
                                        'title' => Yii::t('app', 'pobreza'),
                                    ]);
                                },

                                'borrar' => function ($url, $model) {
                                    if(Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20){
                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
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
    </div>
</div>
