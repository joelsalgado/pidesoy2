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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>


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

            'id',
            'username',
            'name',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
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
                    }
                    return $role;
                },
                'filter' => Html::activeDropDownList($searchModel, 'role',
                    [
                        '30' => 'Administrador',
                        '20' => 'Supervisor',
                        '10' => 'Capturista',
                    ],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
