<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 13/04/2018
 * Time: 01:21 AM
 */

$this->title = 'Reporte';
$total = 0;
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Menu Reportes</h3>
    </div>
    <div class="box-body">
        <?= \yii\helpers\Html::a('Totales',['/report/total']) ?> <br>
        <?= \yii\helpers\Html::a('Desgloce por Regiones',['/report/reg']) ?><br>
        <?= \yii\helpers\Html::a('Desgloce por Municipios',['/report/mun']) ?><br>
        <?= \yii\helpers\Html::a('Desgloce por Localidades',['/report/loc']) ?><br>
        <?= \yii\helpers\Html::a('Resultados por Regiones',['/report/regtot']) ?><br>
        <?= \yii\helpers\Html::a('Resultados por Municipios',['/report/muntot']) ?><br>
        <?= \yii\helpers\Html::a('Resultados por Localidades',['/report/loctot']) ?><br>
    </div>
</div>