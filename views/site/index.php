<?php

use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <div class="food">
        <div class="food-left">
            <div class="border-1"></div>
            <div class="border-2"></div>
            <img class="food-img-1" src="/images/food.png">
            <img class="food-img-2" src="/images/food2.png">
        </div>
        <div class="food-right">
            <div class="food-card">
                <h1>Меню</h1>
                <p>Предлагает гостям разнообразие блюд и удивляет своими необычными сочетаниями вкусов.</p>
                <a class="button-more" href="<?= Url::to('/site/menu')?>">Подробнее</a>
            </div>
            <div class="food-card">
                <h1>Бронь стола</h1>
                <p>Мы рады предложить вам уютную атмосферу и высокий уровень обслуживания. Хотите провести незабываемый
                    вечер в нашем заведении? Тогда воспользуйтесь нашей услугой бронирования столика </p>
                <a class="button-more" href="<?= Url::to('/site/table')?>">Подробнее</a>
            </div>
        </div>
    </div>
    <div class="action">
        <h1>Акции</h1>
        <div class="action-cards">
            <div class="action-card">
                <img src="/images/action.jpg">
                <h3>Подарок к празднику в "RESTO"</h3>
                <p>Дорогие гости! Мы счастливы, когда вы выбираете наше заведение для самых важных поводов, а чтобы
                    праздник сталеще радостнее , мы дарим вам подарок!</p>
                <div class="action-card-time">
                    <p>Бессрочно</p>
                    <p>Ежедневно</p>
                </div>
            </div>
            <div class="action-card">
                <img src="/images/action.jpg">
                <h3>Скидка 20% на основное меню в "RESTO"</h3>
                <p>С 11:00 - 16:00 скидка на основное меню</p>
                <div class="action-card-time">
                    <p>Бессрочно</p>
                    <p>Ежедневно</p>
                </div>
            </div>
            <div class="action-card">
                <img src="/images/action.jpg">
                <h3>Подарок к празднику в "RESTO"</h3>
                <p>Дорогие гости! Мы счастливы, когда вы выбираете наше заведение для самых важных поводов, а чтобы
                    праздник сталеще радостнее , мы дарим вам подарок!</p>
                <div class="action-card-time">
                    <p>Бессрочно</p>
                    <p>Ежедневно</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>