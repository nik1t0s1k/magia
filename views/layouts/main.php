<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!--<header id="header">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//
//            Yii::$app->user->isGuest
//                ? ['label' => 'Логин', 'url' => ['/site/login']]
//                : '<li class="nav-item">'
//                    . Html::beginForm(['/site/logout'])
//                    . Html::submitButton(
//                        'Logout (' . Yii::$app->user->identity->username . ')',
//                        ['class' => 'nav-link btn btn-link logout']
//                    )
//                    . Html::endForm()
//                    . '</li>'
//        ]
//    ]);
//    NavBar::end();
//    ?>
<!--</header>-->
<div class="header-dark"></div>

<div class="header">
    <a href="<?= Url::to('../site/index')?>"><img class="logo" src="/images/logo.png"></a>

    <div class="header-menu">

        <div class="menu">
            <a href="<?= Url::to(['/site/index']) ?>"></a>
            <a class="but_menu" href="<?= Url::to(['/site/menu']) ?>">Меню</a>
            <a href="<?= Url::to(['/site/about']) ?>">О нас</a>
            <a href="<?= Url::to(['/site/contact']) ?>">Контакты</a>

            <?php if (Yii::$app->user->isGuest): ?>
                <a class="register" href="<?= Url::to(['/site/register']) ?>">Регистрация</a>
            <?php else: ?>
                <form method="post" action="<?= Url::to(['/site/logout']) ?>" style="display:inline;">
                    <?= \yii\helpers\Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken()) ?>
                    <button type="submit" class="logout-button">Выйти (<?= Yii::$app->user->identity->username ?>)</button>
                </form>
            <?php endif; ?>

            <a href="<?= Url::to(['/site/basket']) ?>"><img class="basket" src="/images/basket.png"></a>

        </div>
        </div>



    <div class="header-text">
        <h1>Ресторан</h1>
        <p>"Вкусная еда и уютная атмосфера - вот наш рецепт для вашего <br> идеального отдыха в ресторане RESTO!"
        </p>
    </div>
    <a class="tabel" href="<?= Url::to('/site/table')?>">Забронировать стол</a>
</div>

<main id="main" class="flex-shrink-0" role="main">
    <div class="custom-container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<body></body>
<div class="footer">
    <div class="footer-right">
        <div class="footer-info">
            <div class="address">
                <h3>Адрес</h3>
                <p>г.Курган</p>
                <p>ул.Карельцева 32</p>
            </div>
            <div class="time">
                <h3>Время работы</h3>
                <p>9:00 - 22:00</p>
            </div>
            <div class="phone">
                <h3>Номер телефона</h3>
                <p>+7 (909) 345-22-33</p>
            </div>
        </div>
        <div class="footer-form">
            <h3>Обратная связь</h3>
            <div class="form-top">
                <input class="input-top-left" type="text">
                <input class="input-top-right" type="text">
            </div>
            <input class="bottom" type="text">
            <div class="accept">
                <input type="checkbox" placeholder="Соглашаюсь на орбработку персональных данных"> Соглашаюсь на
                обработку персональных данных
            </div>
            <a class="sumbit" href="#">Отправить</a>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
