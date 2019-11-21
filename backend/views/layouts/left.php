<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Источники',
                        'icon' => 'files-o',
                        'url' => ['/source/source'],
                        'active' => \Yii::$app->controller->id == 'source',
                    ],
                    [
                        'label' => 'Контакты',
                        'icon' => 'files-o',
                        'url' => ['/contacts/contacts'],
                        'active' => \Yii::$app->controller->id == 'contacts',
                    ],
                    [
                        'label' => 'Инструменты',
                        'icon' => 'gears',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
