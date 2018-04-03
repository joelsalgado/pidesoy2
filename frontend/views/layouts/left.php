<aside class="main-sidebar">

    <section class="sidebar">
        <?php if(Yii::$app->user->id): ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Usuarios', 'icon' => 'address-book', 'url' => ['/user'], 'visible' => $user = (Yii::$app->user->identity->role == 30 || Yii::$app->user->identity->role == 20) ? true : false],
                    ['label' => 'Participantes', 'icon' => 'user', 'url' => ['/solicitantes']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest]
                ],
            ]
        ) ?>
        <?php endif; ?>

    </section>

</aside>
