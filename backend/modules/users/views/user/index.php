<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Usuarios';?>
<div class="user-index">
    <h1 class="titulo"><?= Html::encode($this->title) ?><p class="pull-right"><?= in_array('create', $permissions)? Html::a('Crear usuario', ['create'], ['class' => 'btn btn-primary']) : '' ?></p></h1>
    <div class="panel">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'username',
                    'email:email',
                    [
                        'class' => 'yii\grid\ActionColumn', 'template' => '{update}',
                        'buttons' => [
                            'update' =>  function ($url, $model, $key) use($permissions) {
                                if(in_array('update', $permissions)){
                                    return Html::a('<span class="btn btn-xs btn-default glyphicon glyphicon-edit"></span>', $url,['title' => 'Update']);
                                }
                            }
                        ]
                    ]
                ]
            ]); ?>
        </div>
    </div>
</div>