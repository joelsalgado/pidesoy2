<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:21 AM
 */

$this->title = 'Mapas';
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Menu Mapas</h3>
    </div>
    <div class="box-body">
        <?= \yii\helpers\Html::a('Por Regiones',['/mapas/region']) ?> <br>
        <?= \yii\helpers\Html::a('Por Municipios',['/mapas/municipio']) ?><br>
        <?= \yii\helpers\Html::a('Por Localidades',['/mapas/localidad']) ?><br>
        <?= \yii\helpers\Html::a('10 Prioritarias',['/mapas/prioritarias']) ?><br>
    </div>
</div>