<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'BITÁCORA DE REUNIONES POR COMUNIDAD';
?>
<div class="bitacora-reunion-index">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">BITÁCORA DE REUNIONES POR COMUNIDAD</h3>
        </div>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Crear Reunion', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
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
                        }
                    ],
                    [
                        'attribute' => 'loc_id',
                        'value' => function($data){
                            $role = "";
                            if($data->loc_id == null){
                                $role = "";
                            }else {
                                $reg = \common\models\Localidades::find()->where(['localidad_id' => $data->loc_id])->one();
                                $role = $reg->nombre_loc;
                            }

                            return $role;
                        }
                    ],
                    //'resp_institucional',
                    //'resp_comunitario',
                    'fecha',
                    //'status',
                    //'created_by',
                    //'updated_by',
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
