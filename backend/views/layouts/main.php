<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\helpers\Url;

\yiister\gentelella\assets\Asset::register($this);
\backend\assets_b\AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="<?= Yii::$app->charset ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="nav-md">
        <?php $this->beginBody(); ?>
        <div class="container body">

            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?= Yii::$app->homeUrl; ?>" class="site_title"><span>Hemeroteca</span></a>
                        </div>

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <?php if(isset($_SESSION['permissions'])):?>
                                    <?= \yiister\gentelella\widgets\Menu::widget(["items" => $_SESSION['permissions']]); ?>
                                <?php endif;?>
                            </div>
                            

                        </div>
                        


                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <?php if (@Yii::$app->user->identity->username): ?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <?= @Yii::$app->user->identity->username; ?>
                                            <span class=" fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                            <li><a href="<?= Yii::$app->urlManager->createUrl('/site/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                            </li>
                                            <li><a href="<?= Yii::$app->urlManager->createUrl('/site/change-password'); ?>"><i class="fa fa-key pull-right"></i> Cambiar contraseña</a>
                                            </li>
                                        </ul>
                                    </li>



                                </ul>
                            <?php endif; ?>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <?= $content ?>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        El Universal
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>

        </div>


        <!-- /footer content -->
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>