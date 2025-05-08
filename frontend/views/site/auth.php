<?php
$this->title = 'Вход / Регистрация';
$this->registerCssFile('@web/css/auth.css'); // если хочешь отдельный стиль
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







<div id="content-switch-buttons">
    <button class="content-button active" id="login-tab" onclick="switchAuthTab('login')">Вход</button>
    <button class="content-button" id="signup-tab" onclick="switchAuthTab('signup')">Регистрация</button>
</div>


<!-- ВХОД -->
<div id="login-form" class="order-form auth-section">
   

    <?php $form = \yii\widgets\ActiveForm::begin(['action' => ['/site/login']]); ?>
    <ul class="order-form-fields">
        <li>
            <span class="field-label">Логин:</span>
            <?= $form->field($login, 'username')->textInput(['class' => 'field-input'])->label(false) ?>
        </li>
        <li>
            <span class="field-label">Пароль:</span>
            <?= $form->field($login, 'password')->passwordInput(['class' => 'field-input'])->label(false) ?>
        </li>
    </ul>
    <button type="submit" class="order-mix-button">Войти</button>
    <?php \yii\widgets\ActiveForm::end(); ?>
</div>

<!-- РЕГИСТРАЦИЯ -->
<div id="signup-form" class="order-form auth-section" style="display: none;">
    

    <?php $form = \yii\widgets\ActiveForm::begin(['action' => ['/site/signup']]); ?>
    <ul class="order-form-fields">
        <li>
            <span class="field-label">Логин:</span>
            <?= $form->field($signup, 'username')->textInput(['class' => 'field-input'])->label(false) ?>
        </li>
        <li>
            <span class="field-label">Email:</span>
            <?= $form->field($signup, 'email')->textInput(['class' => 'field-input'])->label(false) ?>
        </li>
        <li>
            <span class="field-label">Пароль:</span>
            <?= $form->field($signup, 'password')->passwordInput(['class' => 'field-input'])->label(false) ?>
        </li>
    </ul>
<span class="centered-text">*Ссылка для подтверждения Email отправится на почту</span>
    <button type="submit" class="order-mix-button">Зарегаться</button>
    <?php \yii\widgets\ActiveForm::end(); ?>
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

<?php
$this->registerJs(<<<JS
    // Открываем форму входа вручную при загрузке
    switchAuthTab('login');
JS);
?>

