<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\widgets\Apartados\Apartados;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beneficiarios de Programas Sociales';
?>
<div class="cedula-ps-index">



    <div class="box">
        <?=
        Apartados::widget([
            'tipo'=>4,
            'apartado' => $apartado,
            'id' => $id,
        ])
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">Beneficiarios de Programas Sociales</h3>
        </div>
        <?php Pjax::begin(); ?>
        <div class="box-body">
            <p class="pull-right">
                <?= Html::a('Subir Archivos', ['/documentos/update', 'id'=> $id], ['class' => 'btn btn-danger']) ?>
                <?php if($num > $total) : ?>
                <?= Html::a('Agregar Beneficiario', ['create', 'id'=> $id], ['class' => 'btn btn-success']) ?>
                <?php endif;?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Mostrando {begin}-{end} de {totalCount} Elementos",
                'emptyText' => "No se encontró ningún elemento",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    //'cedula_id',
                    [
                        'attribute' => 'cual_programa',
                        'value' => function($data){

                            $val = \common\models\Programas::findOne($data->cual_programa);
                            if($val){
                                return $val->desc_programa;
                            }
                            else{
                                return "NINGUNO";
                            }

                        }
                    ],
                    'nombre_recibe_programa',
                    'titular',
                    //'parentesco_recibe_programa',
                    //'created_by',
                    //'updated_by',
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
