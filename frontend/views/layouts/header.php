<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">2.0</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->

                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::$app->homeUrl ?>images/logopideso.png" height="40" width="40" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                            <?php if(Yii::$app->user->id): ?>
                                <?= Yii::$app->user->identity->username ?>
                            <?php endif; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= Yii::$app->homeUrl ?>images/logopideso.png" height="40" width="40" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php if(Yii::$app->user->id): ?>
                                    <?= Yii::$app->user->identity->name ?>
                                    <small>
                                        <?= $role =  (Yii::$app->user->identity->role == 30)? 'Administrador' :
                                            $role2 = (Yii::$app->user->identity->role == 20)? 'Supervisor': 'Capturista' ?>
                                    </small>
                                <?php endif; ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                <?= Html::a(
                                    'Cerrar Sesión',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
