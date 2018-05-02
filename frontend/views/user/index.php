<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="box">
        <div class="box-header with-border">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php Pjax::begin(); ?>
            <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <p class="pull-right">
                    <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                    'emptyText' => "No se encontró ningún elemento",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'username',
                        'name',
                        //'auth_key',
                        //'password_hash',
                        //'password_reset_token',
                        //'email:email',
                        [
                            'attribute' => 'region_id',
                            'value' => function($data){
                                $role = "";
                                if($data->region_id == null){
                                    $role = "";
                                }else {
                                    $reg = \common\models\Regiones::find()->where(['id' => $data->region])->one();
                                    $role = $reg->desc_region;
                                }

                                return $role;
                            },
                            'filter' => Html::activeDropDownList($searchModel, 'region_id',
                                \yii\helpers\ArrayHelper::map(\common\models\Regiones::getRegionesOk(), 'id', 'desc_region'),
                                ['class'=>'form-control','prompt' => 'Seleccione una region']),
                        ],
                        [
                            'attribute' => 'role',
                            'value' => function($data){
                                $role = "";
                                switch ($data->role){
                                    case 10:
                                        $role = 'Capturista';
                                        break;
                                    case 20:
                                        $role = 'Supervisor';
                                        break;
                                    case 30:
                                        $role = 'Administrador';
                                        break;
                                    case 40:
                                        $role = 'Dependencia';
                                        break;
                                }
                                return $role;
                            },
                            'filter' => Html::activeDropDownList($searchModel, 'role',
                                $roles = (Yii::$app->user->identity->role == 30) ? Yii::$app->params['rolesAdmin']:
                                    Yii::$app->params['rolesSup'],
                                ['class'=>'form-control','prompt' => 'Seleccione un rol']),
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function($data){
                                $status =($data->status == 10)? 'Activo' : 'Inactivo';
                                return $status;
                            },
                            'filter' => Html::activeDropDownList($searchModel, 'status',
                                [
                                    '10' => 'Activo',
                                    '0' => 'Inactivo',
                                ],
                                ['class'=>'form-control','prompt' => 'Seleccione un Estado']),
                        ],
                        //'created_by',
                        //'updated_by',
                        //'created_at',
                        //'updated_at',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acciones',
                            'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{update}{borrar}',
                            'buttons' => [
                                'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('app', 'editar'),
                                    ]);
                                },

                                'borrar' => function ($url, $model) {
                                    if(Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20){
                                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                        'data' => [
                                            'confirm' => 'Estas seguro de borrar a este usuario',
                                            'method' => 'POST'
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
                                    $url =Yii::$app->homeUrl.'user/update?id='.$model->id;
                                    return $url;
                                }
                                if ($action === 'borrar') {
                                    $url =Yii::$app->homeUrl.'user/delete?id='.$model->id;
                                    return $url;
                                }
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
