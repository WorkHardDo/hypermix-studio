<?php

use yii\helpers\Html;

/** @var \frontend\models\Order $order */

$this->title = 'Оплата заказа';
?>

<div class="site-pay">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="order-info">
        <p><strong>Проект:</strong> <?= Html::encode($order->project_name) ?></p>
        <p><strong>Услуга:</strong> <?= Html::encode($order->service_type) ?></p>
        <p><strong>Цена:</strong> <?= Html::encode($order->price) ?> ₽</p>
    </div>

    <div class="payment-message">
        <p>Это тестовая страница оплаты.</p>
        <p>Позже здесь будет подключение к YooKassa.</p>
    </div>

    <div class="back-to-cabinet">
        <a href="/cabinet" class="btn btn-secondary">Вернуться в кабинет</a>
    </div>
</div>
