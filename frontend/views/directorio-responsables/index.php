<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Directorio De Responsables Y Enlaces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directorio-responsables-index">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Directorio De Responsables Y Enlaces</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Nuevo Registro', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    //'fecha',
                    //'imagen',
                    //'resp_institucional',
                    //'resp_comunitario',
                    //'otro',
                    //'especifique',
                    'funcion',
                    'apellido_paterno',
                    'apellido_materno',
                    'nombre',
                    //'sexo',
                    //'fecha_nacimiento',
                    //'calle',
                    //'num_ext',
                    //'num_int',
                    //'colonia',
                    //'codigo_posta',
                    //'tel_local',
                    //'tel_cel',
                    //'mun_id',
                    //'loc_id',
                    //'referencia',
                    //'correo',
                    //'redes_sociales',
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
                                $url =Yii::$app->homeUrl.'directorio-responsables/update?id='.$model->id;
                                return $url;
                            }
                            if ($action === 'borrar') {
                                $url =Yii::$app->homeUrl.'directorio-responsables/delete?id='.$model->id;
                                return $url;
                            }
                            if ($action === 'pdf') {
                                $url =Yii::$app->homeUrl.'directorio-responsables/pdf?id='.$model->id;
                                return $url;
                            }
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
