<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 06/06/2018
 * Time: 05:19 PM
 */


$this->title = 'Documentos';
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Documentos</h3>
    </div>
    <div class="box-body">
        <?= \yii\helpers\Html::a('LISTA PARA REUNIONES CON AUTORIDADES',['/formatos/LISTA PARA REUNIONES CON AUTORIDADES.docx']) ?> <br>
        <?= \yii\helpers\Html::a('LISTA PARA SESIONES DE TRABAJO',['/formatos/LISTA PARA SESIONES DE TRABAJO.docx']) ?><br>
        <?= \yii\helpers\Html::a('MINUTA DE REUNIÓN COMUNIDADES',['/formatos/MINUTA DE REUNIÓN COMUNIDADES.xlsx']) ?><br>
        <?= \yii\helpers\Html::a('MINUTA DE REUNIÓN CON AUTORIDADES',['/formatos/MINUTA DE REUNIÓN CON AUTORIDADES.xlsx']) ?><br>
    </div>
</div>