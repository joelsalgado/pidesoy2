<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Censo';
?>
<div class="censo-index">

    <div class="box">
        <?=
        \frontend\widgets\Apartados\Apartados::widget([
            'tipo'=>7,
            'apartado' => $apartado,
            'id' => $id,
        ])
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">Censo</h3>
        </div>
        <div class="box-body">

            <p class="pull-right">
                <?= Html::a('Beneficiarios del Programa', ['/cedula-ps/index', 'id'=>$id], ['class' => 'btn btn-danger']) ?>
                <?= Html::a('Nuevo Censo', ['create', 'id'=> $id], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nombre',
                    'apellido_paterno',
                    'apellido_materno',
                    //'id',
                    //'solicitante_id',
                    //'periodo',
                    //'fecha',
                    //'agua_potable',
                    //'drenaje',
                    //'basura',
                    //'policias',
                    //'parques',
                    //'salones',
                    //'iglesia',
                    //'doctor',
                    //'salud',
                    //'medicamentos',
                    //'lamparas',
                    //'diconsa',
                    //'liconsa',
                    //'comunitario',
                    //'ambulacia',
                    //'otro1',
                    //'cual1',
                    //'documentos',
                    //'vacunacion',
                    //'ortopedicos',
                    //'seguro_popular',
                    //'becas',
                    //'papeles',
                    //'terminar_esc',
                    //'credito',
                    //'luz',
                    //'desayuno',
                    //'otro2',
                    //'cual2',
                    //'grupo_comunitario',
                    //'cual3',
                    //'autoridades_estatales',
                    //'acciones',
                    //'observaciones',
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
                                if(Yii::$app->user->identity->role != 40){
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('app', 'editar'),
                                    ]);}
                                else{
                                    return "";
                                }
                            },
                            'borrar' => function ($url, $model) {
                                if(Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20){
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'data' => [
                                            'confirm' => 'Estas seguro de borrar a este usuario',
                                            'method'  => 'post'
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
                                $url =Yii::$app->homeUrl.'censo/update?id='.$model->id;
                                return $url;
                            }
                            if ($action === 'borrar') {
                                $url =Yii::$app->homeUrl.'censo/delete?id='.$model->id;
                                return $url;
                            }
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
