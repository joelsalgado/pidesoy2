<aside class="main-sidebar">

    <section class="sidebar">
        <?php if(Yii::$app->user->id): ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Usuarios', 'icon' => 'address-book', 'url' => ['/user'], 'visible' => $user = (Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20) ? true : false],
                    ['label' => 'Reporte', 'icon' => 'list-alt', 'url' => ['/report'], 'visible' => $user = (Yii::$app->user->identity->role >= 20) ? true : false],
                    ['label' => 'Participantes', 'icon' => 'user', 'url' => ['/solicitantes']],
                    ['label' => 'Mapas', 'icon' => 'map', 'url' => ['/mapas']],
                    ['label' => 'Formatos', 'icon' => 'file-pdf-o', 'url' => ['product/index'], 'items' => [
                        ['label' => 'Directorio', 'url' => ['/directorio-responsables']],
                        ['label' => 'Bitacora por  Localidad', 'url' => ['/bitacora-reunion']],
                        ['label' => 'Bitacora por  Vivienda', 'url' => ['/bitacora-familia']],
                        ['label' => 'Programacion', 'url' => ['/programacion']],
                        ['label' => 'Ficha Tecnica', 'url' => ['/ficha-tecnica']],
                        ['label' => 'Minuta Autoridades', 'url' => ['/minuta-autoridades']],
                        ['label' => 'Minuta Localidades', 'url' => ['/minuta-localidades']],
                    ]],
                    ['label' => 'Formato de Localidades', 'icon' => 'folder', 'url' => ['/formato-loc']],
                    ['label' => 'Actividades Comunitarias', 'icon' => 'road', 'url' => ['/actividades-relevantes']],
                    ['label' => 'Informes', 'icon' => 'eercast', 'url' => ['/informes']],
                    ['label' => 'Programas', 'icon' => 'id-card', 'url' => ['/programas'], 'visible' => $user = (Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 40) ? true : false],
                    ['label' => 'Actividades', 'icon' => 'navicon', 'url' => ['/actividades'], 'visible' => $user = (Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 40) ? true : false],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Cerrar Sesión', 'icon' => 'power-off', 'url' => ['/site/logout'],
                        'template' => '<a href="{url}" data-method="post"><span class="glyphicon glyphicon-off"></span>{label}</a>'
                    ],
                ],
            ]
        ) ?>
        <?php endif; ?>

    </section>

</aside>
