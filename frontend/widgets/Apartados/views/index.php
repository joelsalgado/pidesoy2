<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 02/04/2018
 * Time: 06:55 PM
 */
use yii\helpers\Html;
?>

<ul class="nav nav-tabs">
    <li <?= $classTipo = ($tipo == 1) ? 'class="active"': '' ?>> <?= Html::a(
            '<i class="fa fa-user-o" aria-hidden="true"></i> '.Yii::$app->params['apartado1'].
            $classTipo2 = ($tipo == 1) ? $regular: $a1,$url1)?>
    </li>
    <li <?= $class2Tipo = ($tipo == 2) ? 'class="active"': '' ?>> <?= Html::a(
            '<i class="fa fa-newspaper-o" aria-hidden="true"></i> '.Yii::$app->params['apartado2'].
            $class2Tipo2 = ($tipo == 2) ? $regular: $a2,$url2)?>
    </li>
    <li <?= $class3Tipo = ($tipo == 4) ? 'class="active"': '' ?>> <?= Html::a(
            '<i class="fa fa-id-card-o" aria-hidden="true"></i> '.Yii::$app->params['apartado4'].
            $class4Tipo4 = ($tipo == 4) ? $regular: $a4,$url4)?>
    </li>
    <li <?= $class3Tipo = ($tipo == 3) ? 'class="active"': '' ?>> <?= Html::a(
            '<i class="fa fa-file" aria-hidden="true"></i> '.Yii::$app->params['apartado3'].
            $class3Tipo3 = ($tipo == 3) ? $regular: $a3,$url3)?>
    </li>
    <li<?= $class5Tipo = ($tipo == 5) ? 'class="active"': '' ?>> <?= Html::a(
            '<i class="fa fa-share" aria-hidden="true"></i> '.Yii::$app->params['apartado5'].
            $class5Tipo5 = ($tipo == 5) ? $regular: $a3,$url3)?>
    </li>
</ul>