<?php
/** @var yii\web\View $this */

use yii\helpers\Url;

?>
<h1>Корзина</h1>

<div class="tab-response">
    <table class="custom-table">
        <thead>
        <tr>
            <th>Название блюда</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($basket as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item->product->name) ?></td>
                <td><?= $item->counts ?></td>
                <td><?= $item->price ?> ₽</td>
                <td>
                    <div class="btn-group">
                        <a href="<?= Url::toRoute(['basket/addition', 'id' => $item->id]) ?>" class="btn green-btn">Добавить</a>
                        <a href="<?= Url::toRoute(['basket/remove', 'id' => $item->id]) ?>" class="btn red-btn">Убрать</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Оформление заказа -->
    <div class="order-section">
        <h2 class="order-title">Оформление заказа</h2>
        <form action="<?= Url::toRoute(['order/submit']) ?>" method="post" class="order-form">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">

            <label for="phone">Телефон</label>
            <input type="tel" id="phone" name="phone" class="form-input" required>

            <label for="address">Адрес доставки</label>
            <textarea id="address" name="address" class="form-textarea" rows="3" required></textarea>

            <label for="comment">Комментарий к заказу</label>
            <textarea id="comment" name="comment" class="form-textarea" rows="2"></textarea>

            <button type="submit" class="btn submit-btn">Оформить заказ</button>
        </form>
    </div>
</div>

