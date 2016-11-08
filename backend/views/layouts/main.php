<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>
<?php

NavBar::begin([

    'brandLabel' => '<span>Admin</span>Blog',
    'brandUrl' => '/admin',
    'options' => [
        'class' => 'navbar navbar-inverse navbar-fixed-top',
        'encodeLabels' => false,
    ],
    'innerContainerOptions' => ['class' => 'containter-fluid'],
]);
$profileUrl = Url::to(['user/view', 'id' => Yii::$app->user->id]);
$menuItems = [
    [
        'label' => '<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>' . Yii::$app->user->identity->username,
        'items' => [
            ['label' => '<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile', 'url' => $profileUrl,],
            ['label' => '<svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings', 'url' => '#'],
            ['label' => '<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout', 'url' => '/admin/site/logout',  'linkOptions' => ['data-method' => 'post'],],
        ],
    ],
];
echo Nav::widget([
    'items' => $menuItems,
    'encodeLabels' => false,
    'options' => ['class' => 'user-menu']
]);
NavBar::end();
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <?php
    echo Menu::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'nav menu'],
        'items' => [
            [
                'label' => '<svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg> Посты',
                'url' => '/admin/post/index',
                'active' => Yii::$app->controller->id == 'post',
            ],
            [
                'label' => '<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Категории',
                'url' => '/admin/category/index',
                'active' => Yii::$app->controller->id == 'category',
            ],
            [
                'label' => '<svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Теги',
                'url' => '/admin/tag/index',
                'active' => Yii::$app->controller->id == 'tag',
            ],
            [
                'label' => '<svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg> Теги постов',
                'url' => '/admin/post-tag/index',
                'active' => Yii::$app->controller->id == 'post-tag',
            ],
            [
                'label' => '<svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Пользователи',
                'url' => '/admin/user/index',
                'active' => Yii::$app->controller->id == 'user' or 'user-info',
            ],
        ]
    ]);
    ?>
</div>
<?= Alert::widget() ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <?=
        Breadcrumbs::widget([
            'encodeLabels' => false,
            'homeLink' => [
                'label' => '<svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>',
                'url' => Yii::$app->homeUrl,
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
    <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
