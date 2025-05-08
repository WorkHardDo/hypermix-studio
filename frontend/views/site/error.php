<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="/images/icon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Hypermix studio</title>
    <link rel="stylesheet" href="/css/style_404.css">
</head>

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

<body>
<div class="wrapper">
    
<main class="main">

   <!-- Контейнер, который открывается при нажатии на кнопку -->
   <div class="container" id="container" style="display: none;">
    <div class="container-links">
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


    <div class="error-container">
        <h1 class="error-title">404: Страница не найдена</h1>
    
        
    </div>
    <button class="order-mix-button" onclick="location.href='/'">На главную</button>

    
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

</div>


</body>

<script>

    // Функция для открытия и закрытия контейнера
    function toggleContainer() {
const container = document.getElementById('container');
const currentDisplay = window.getComputedStyle(container).display;

if (currentDisplay === 'none') {
    container.style.display = 'block'; // Показываем контейнер
} else {
    container.style.display = 'none'; // Скрываем контейнер
}
}



function toggleMobileMenu() {
    const menu = document.querySelector('.mobile-menu');
    const burger = document.querySelector('.burger-menu');
    const contactContainer = document.getElementById('container');

    // Переключение состояния мобильного меню
    menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';

    // Анимация бургер-иконки
    burger.classList.toggle('open');

    // Закрытие контейнера контактов, если он открыт
    if (contactContainer.style.display === 'block') {
        contactContainer.style.display = 'none';
    }
}
</script>
</html>
