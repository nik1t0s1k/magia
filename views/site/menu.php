<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<div class="info">
    <div class="paket">
        <img src="/images/paket.png">
        <h1>Выберите блюда</h1>
        <p>Добавьте ваше блюдо в корзину</p>
    </div>
    <div class="paket">
        <img src="/images/map.png">
        <h1>Выберите тип доставки</h1>
        <p>Вы можете забрать заказ самостоятельно со скидкой 10% или выбрать доставку курьером.</p>
    </div>
    <div class="paket">
        <img src="/images/money.png">
        <h1>Выберите тип оплаты</h1>
        <p>Вы можете оплатить заказ онлайн, наличными или банковской картой курьеру при доставке</p>
    </div>
    <div class="paket">
        <img src="/images/phone.png">
        <h1>Подтвердите заказ</h1>
        <p>Ожидайте подтверждение заказа по телефону, мы свяжемся, уточним время доставки и точную сумму заказа</p>
    </div>
</div>
<div class="card">
    <p>С каждого заказа начисляем 5% в виде бонусов, которыми можно оплатить до 50% следующих заказов у нас в гостях. Укажите номер вашей бонусной карты в комментариях к заказу и мы начислим вам бонусы.</p>
</div>
<div class="query">
    <h1>Наше <span class="yellow">меню</span></h1>
    <p>Здесь находятся вкуснейшие блюда, которые ты можешь <br> заказать прямо сейчас</p>
</div>

<div class="eat">
    <div class="eat-info"><a href="#Супы">Супы</a></div>
    <div class="eat-info"><a href="#Горячие блюда">Горячие блюда</a></div>
    <div class="eat-info"><a href="#Салаты">Салаты</a></div>
    <div class="eat-info"><a href="#Десерты">Десерты</a></div>
    <div class="eat-info"><a href="#Напитки">Напитки</a></div>

</div>

<?php

use yii\helpers\Url;

$grouped = [];
foreach ($model as $product) {
    $categoryName = $product->category->name ?? 'Без категории';
    $grouped[$categoryName][] = $product;
}
?>

<div class="menu-items">
    <?php foreach ($grouped as $category => $items): ?>
        <div class="dishes" id="<?= htmlspecialchars($category) ?>">
            <h1><?= htmlspecialchars($category) ?></h1>
        </div>

        <div class="category-group">
            <?php foreach ($items as $item): ?>
                <div class="menu-item">
                    <img src="<?= Yii::getAlias('@web') . '/images/' . $item->image ?>" alt="<?= htmlspecialchars($item->name) ?>">
                    <h2><?= htmlspecialchars($item->name) ?></h2>
                    <p><?= htmlspecialchars($item->description) ?></p>
                    <span class="price"><?= $item->price ?> ₽</span>

                    <?php $url = Url::toRoute(['site/add', 'id' => $item->id]); ?>
                    <a href="<?= $url ?>" class="order-btn">В корзину</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<a href="#" class="scroll-to-top" title="Наверх">↑</a>

</body>
<script>
    const scrollToTopBtn = document.querySelector('.scroll-to-top');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.style.display = 'block';
        } else {
            scrollToTopBtn.style.display = 'none';
        }
    });

    scrollToTopBtn.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

</body>
</html>