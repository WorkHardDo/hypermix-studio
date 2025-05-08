<?php use yii\helpers\Html; 
use yii\widgets\LinkPager;
?>

<?php
$this->title = 'Кабинет';
$this->registerCssFile('@web/css/style_cabinet.css');
?>

<header class="site-header">
    <a href="/">
        <img id="header-logo" src="/images/main_header_logo.png" alt="Header Logo">
    </a>

    <nav class="desktop-menu">
        <button class="header-button" id="mix-button" onclick="location.href='/mix'">Сведение</button>
        <button class="header-button" id="mastering-button" onclick="location.href='/mastering'">Мастеринг</button>
        <button class="header-button" id="contacts-button" onclick="toggleContainer()">Контакты</button>

        <!-- Авторизация -->
        <?php if (Yii::$app->user->isGuest): ?>
            <button class="header-button" id="auth-button" onclick="location.href='/auth'">Авторизация</button>
        <?php else: ?>
            <a href="/cabinet" class="header-button" id="cabinet-button">
                <?= \yii\helpers\Html::encode(Yii::$app->user->identity->username) ?>
            </a>
        <?php endif; ?>
    </nav>

    <!-- Бургер-меню -->
    <div class="burger-menu" onclick="toggleMobileMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Мобильное меню -->
    <nav class="mobile-menu">
        <a href="/mix">Сведение</a>
        <a href="/mastering">Мастеринг</a>
        <a href="#" onclick="toggleContainer()">Контакты</a>

        <?php if (Yii::$app->user->isGuest): ?>
            <a href="/auth" id="auth-button-mobile">Вход / Регистрация</a>
        <?php else: ?>
            <a href="/cabinet" id="cabinet-button-mobile">
                <?= \yii\helpers\Html::encode(Yii::$app->user->identity->username) ?>
            </a>
        <?php endif; ?>
    </nav>
</header>
<main class="main">
<?php $this->beginBody() ?>

<!-- Контейнер, который открывается при нажатии на кнопку -->
<div class="container" id="container" style="display: none;">
    <div class="container-links">
        <a>hypermix-studio@yandex.ru</a>
        <a href="https://t.me/hypermix" class="telegram-link">
            @hypermix_tg
            <img src="/images/telegram_icon.png" alt="Telegram" class="social-icon">
        </a>
        <a href="https://www.instagram.com/hypermix" class="instagram-link">
            @hypermix_ig
            <img src="/images/instagram_icon.png" alt="Instagram" class="social-icon">
        </a>
    </div>
</div>

<div id="work-examples-text">Заказы <?= \yii\helpers\Html::encode(Yii::$app->user->identity->username) ?>:</div>

<form action="/logout" method="post">
    <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken()) ?>
    <?= Html::submitButton('Выйти', ['class' => 'details-button-2']) ?>
</form>

<div class="carousel-outer">
    <div class="carousel-wrapper">
        <div class="carousel-container" id="carousel">
            <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <h3><?= Html::encode($order->project_name) ?></h3>
                    <p>Услуга: <?= Html::encode($order->service_type) ?></p>
                    <p>Исходники: <a href="<?= Html::encode($order->source) ?>" class="discount-percent" target="_blank">Перейти</a></p>
                    <p>Статус: <?= Html::encode($order->status) ?></p>
                    <p>Цена: <?= Html::encode($order->price) ?> ₽</p>

                    <?php if ($order->status == 'готово' && $order->result): ?>
                        <p><a href="<?= Html::encode($order->result) ?>" class="discount-percent" target="_blank">Скачать результат</a></p>
                    <?php elseif ($order->status == 'не оплачен'): ?>
                        <form action="/order/pay" method="post" style="display:inline;">
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
                            <input type="hidden" name="order_id" value="<?= $order->id_order ?>">
                            <?= Html::submitButton('Оплатить', ['class' => 'order-button']) ?>
                        </form>
                        <form action="/order/cancel" method="post" style="display:inline;">
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
                            <input type="hidden" name="order_id" value="<?= $order->id_order ?>">
                            <?= Html::submitButton('Отменить', ['class' => 'details-button']) ?>
                        </form>
                    <?php elseif ($order->status == 'в работе'): ?>
                        <p><em>Скоро будет готово...</em></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="carousel-arrows">
            <button class="carousel-arrow left" onclick="scrollCarousel(-1)">❮</button>
            <button class="carousel-arrow right" onclick="scrollCarousel(1)">❯</button>
        </div>
    </div>
</div>

<img id="footer-up-image" src="/images/footer_up.png" alt="Footer Background">


</main>





<footer class="footer">


    <div class="footer-columns">

        <div class="footer-column">
            <img src="/images/main_header_logo.png" alt="Footer Logo" class="footer-logo">
            <div class="footer-tagline">"Frik the sound!"</div>
            <div class="footer-copyright">© 2024, All rights reserved</div>
        </div>

        <!-- Contacts Column -->
        <div class="footer-contacts" >
            <h3 class="footer-title">Контакты</h3>
            <div class="footer-links">
                <a >hypermix-studio@yandex.ru</a>
                <a href="https://t.me/hypermix" class="telegram-link">
                    @hypermix_tg
                    <img src="/images/telegram_icon.png" alt="Telegram" class="social-icon">
                </a>
                <a href="https://www.instagram.com/hypermix" class="instagram-link">
                    @hypermix_ig
                    <img src="/images/instagram_icon.png" alt="Instagram" class="social-icon">
                </a>
                
            </div>
        </div>
        
        <!-- Sections Column -->
        
        <div class="footer-column">
            <div class="footer-column-sections">
            <h3 class="footer-title">Разделы</h3>
            <div class="footer-links">
                <a href="/#our-orders-text">Все услуги</a>
                <a href="/mix" onclick="location.href='/mix'">Сведение</a>
                <a href="/mastering" onclick="location.href='/mastering'">Мастеринг</a>
                <a href="/#work-examples-text">Примеры работ</a>
            </div>
        </div>
        </div>
    </div>


</footer>

<?php
$this->registerJsFile('@web/js/common.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>