<?php
$this->title = 'Сведение';
$this->registerCssFile('@web/css/style_mix.css');
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


<div id="work-examples-text">Сведение</div>

<div class="all-renagle"></div>
<div class="horizontal-line"></div>


<div id="content-switch-buttons">
    <button id="glitchcore-button" class="content-button" onclick="activateButton(this, 'glitchcore')">Glitchcore</button>
    <button id="opium-button" class="content-button" onclick="activateButton(this, 'opium')">Opium</button>
</div>



<!-- Контейнер для Glitchcore (уже создан) -->
<div id="glitchcore-container" class="processing-sections">
    <div class="processing-section">
    <div class="processing-label before">До обработки</div>
    <a>
        
    <div class="glitchcore-item">
        
    
    <div class="track-controls">
        <div class="track-name">Рука</div>
        <div class="track-timer">0:00 / 0:23</div>
        <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
    </div>
    <div class="progress-bar" onclick="seekAudio(event, this)">
        <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
    </div>
    <audio>
        <source src="/audio/main_rain_sved.mp3" type="audio/mpeg">
        Ваш браузер не поддерживает аудиоэлементы.
    </audio>
        <audio controls>
            <source src="/audio/main_rain_sved.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
    

    
       
    <div class="glitchcore-item">
        
<div class="track-controls">
        <div class="track-name">Скажешь</div>
        <div class="track-timer">0:00 / 0:11</div>
        <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
    </div>
    <div class="progress-bar" onclick="seekAudio(event, this)">
        <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
    </div>
    <audio>
        <source src="/audio/main_uzau_sved.mp3" type="audio/mpeg">
        Ваш браузер не поддерживает аудиоэлементы.
    </audio>
        <audio controls>
            <source src="/audio/main_uzau_sved.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

   


    <div class="glitchcore-item">
        
<div class="track-controls">
        <div class="track-name">2010</div>
        <div class="track-timer">0:00 / 0:22</div>
        <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
    </div>
    <div class="progress-bar" onclick="seekAudio(event, this)">
        <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
    </div>
    <audio>
        <source src="/audio/main_usb_sved.mp3" type="audio/mpeg">
        Ваш браузер не поддерживает аудиоэлементы.
    </audio>
        <audio controls>
            <source src="/audio/main_usb_sved.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
</a>
</div>
<div class="processing-section">
<div class="processing-label after">После обработки</div>

<a>

    <div class="glitchcore-item">
    
        <div class="track-controls">
            <div class="track-name">Рука</div>
            <div class="track-timer">0:00 / 1:46</div>
            <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
        </div>
        <div class="progress-bar" onclick="seekAudio(event, this)">
            <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
        </div>
        <audio>
            <source src="/audio/main_rain.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает аудиоэлементы.
        </audio>
            <audio controls>
                <source src="/audio/main_rain.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        
    
        
           
        <div class="glitchcore-item">
            
    <div class="track-controls">
            <div class="track-name">Скажешь</div>
            <div class="track-timer">0:00 / 2:04</div>
            <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
        </div>
        <div class="progress-bar" onclick="seekAudio(event, this)">
            <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
        </div>
        <audio>
            <source src="/audio/main_uzau.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает аудиоэлементы.
        </audio>
            <audio controls>
                <source src="/audio/main_uzau.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    
       
    
    
        <div class="glitchcore-item">
            
    <div class="track-controls">
            <div class="track-name">2010</div>
            <div class="track-timer">0:00 / 1:30</div>
            <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
        </div>
        <div class="progress-bar" onclick="seekAudio(event, this)">
            <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
            <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
        </div>
        <audio>
            <source src="/audio/main_usb.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает аудиоэлементы.
        </audio>
            <audio controls>
                <source src="/audio/main_usb.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

    </a>
</div>
</div>



<!-- Контейнер для Opium -->
<div id="opium-container" class="processing-sections">
    <div class="processing-section">
    <div class="processing-label before">До обработки</div>
    <a>
        
    <div class="glitchcore-item">
        
    
    <div class="track-controls">
        <div class="track-name">TRAP1</div>
        <div class="track-timer">0:00 / 0:35</div>
        <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
    </div>
    <div class="progress-bar" onclick="seekAudio(event, this)">
        <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
    </div>
    <audio>
        <source src="/audio/main_rickowens_sved.mp3" type="audio/mpeg">
        Ваш браузер не поддерживает аудиоэлементы.
    </audio>
        <audio controls>
            <source src="/audio/main_rickowens_sved.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
    

    
       
    <div class="glitchcore-item">
        
<div class="track-controls">
        <div class="track-name">Стрелки</div>
        <div class="track-timer">0:00 / 0:38</div>
        <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
    </div>
    <div class="progress-bar" onclick="seekAudio(event, this)">
        <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
    </div>
    <audio>
        <source src="/audio/main_fen_sved.mp3" type="audio/mpeg">
        Ваш браузер не поддерживает аудиоэлементы.
    </audio>
        <audio controls>
            <source src="/audio/main_fen_sved.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

   


    <div class="glitchcore-item">
        
<div class="track-controls">
        <div class="track-name">just myself</div>
        <div class="track-timer">0:00 / 0:21</div>
        <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
    </div>
    <div class="progress-bar" onclick="seekAudio(event, this)">
        <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
    </div>
    <audio>
        <source src="/audio/main_sky_sved.mp3" type="audio/mpeg">
        Ваш браузер не поддерживает аудиоэлементы.
    </audio>
        <audio controls>
            <source src="/audio/main_sky_sved.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
</a>
</div>
<div class="processing-section">
<div class="processing-label after">После обработки</div>

<a>

    <div class="glitchcore-item">
    
        <div class="track-controls">
            <div class="track-name">TRAP1</div>
            <div class="track-timer">0:00 / 1:18</div>
            <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
        </div>
        <div class="progress-bar" onclick="seekAudio(event, this)">
            <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
        </div>
        <audio>
            <source src="/audio/main_rickowens.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает аудиоэлементы.
        </audio>
            <audio controls>
                <source src="/audio/main_rickowens.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        
    
        
           
        <div class="glitchcore-item">
            
    <div class="track-controls">
            <div class="track-name">Стрелки</div>
            <div class="track-timer">0:00 / 2:11</div>
            <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
        </div>
        <div class="progress-bar" onclick="seekAudio(event, this)">
            <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
        <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
        </div>
        <audio>
            <source src="/audio/main_fen.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает аудиоэлементы.
        </audio>
            <audio controls>
                <source src="/audio/main_fen.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    
       
    
    
        <div class="glitchcore-item">
            
    <div class="track-controls">
            <div class="track-name">just myself</div>
            <div class="track-timer">0:00 / 1:55</div>
            <button class="play-pause-btn" onclick="togglePlay(this)">▶</button>
        </div>
        <div class="progress-bar" onclick="seekAudio(event, this)">
            <img src="/images/mix_empty_progressbar.png" class="progress-bg" alt="Empty Progress Bar">
            <img src="/images/mix_full_progressbar.png" class="progress-fill" alt="Full Progress Bar">
        </div>
        <audio>
            <source src="/audio/main_sky.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает аудиоэлементы.
        </audio>
            <audio controls>
                <source src="/audio/main_ske.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

    </a>
</div>
</div>



<button class="order-mix-button" onclick="openOrderForm()">Заказать</button>
<div class="order-note">*Функция заказа скоро появиться, используйте наши контакты для оформления</div>
 
<img id="footer-up-image" src="/images/footer_up.png" alt="Footer Background">
















<!-- Затемнение сайта -->
<div class="overlay" id="overlay"></div>

<!-- Форма заказа -->
<div class="order-form" id="orderForm">
    <div class="order-form-header">
        <span class="form-title">Форма заказа</span>
        <span class="form-subtitle">Сведение</span>
        <button class="close-button" onclick="closeOrderForm()">✖</button>
    </div>

    <form method="post" action="/order/create">
        <input type="hidden" name="service_type" value="mix">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
        
        <ul class="order-form-fields">
            <li>
                <span class="field-label">Название проекта:</span>
                <input type="text" class="field-input" name="project_name" placeholder="Чтобы вы различали заказы" required>
            </li>
            <li>
                <span class="field-label">Соц. сеть для коммуникации:</span>
                <input type="text" class="field-input" name="social" placeholder="Введите ссылку" required>
            </li>
            <li>
                <span class="field-label">Кол-во исполнителей:</span>
                <input type="number" class="field-input" name="singers" placeholder="Сколько?" required>
            </li>
            <li>
                <span class="field-label">Похожий трек:</span>
                <input type="text" class="field-input" name="same_track" placeholder="Ссылка" required>
            </li>
            <li>
                <span class="field-label">Исходники:</span>
                <input type="text" class="field-input" name="source" placeholder="Ссылка на гугл диск или т.п." required>
            </li>
            <li>
                <span class="field-label">Тональность и bpm:</span>
                <input type="text" class="field-input" name="tonal" placeholder="A#m 150, C 70, ..." required>
            </li>
            

            <li>
                <span class="field-label">Комментарий:</span>
                <textarea class="field-textarea" name="description" placeholder="Введите комментарий"></textarea>
            </li>
        </ul>

        <span class="centered-text">*Мы начнём работу над заказом после его оплаты в личном кабинете</span>
        <button type="submit" class="order-button">Создать заказ</button>
    </form>
</div>







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

function showContent(contentId) {
        // Скрываем оба контейнера
        document.getElementById('glitchcore-container').style.display = 'none';
        document.getElementById('opium-container').style.display = 'none';
  document.getElementById('glitchcore-container').style.opacity = '0';
        document.getElementById('opium-container').style.opacity = '0';

        // Показываем выбранный контейнер
        document.getElementById(contentId + '-container').style.display = 'flex';
		
			  setTimeout(() => {document.getElementById(contentId + '-container').style.opacity = '1';}, 1000)
    }

    window.onload = function () {
    // Находим элементы Glitchcore
    const defaultButton = document.getElementById('glitchcore-button');
    const defaultContainer = document.getElementById('glitchcore-container');

    // Активируем кнопку
    defaultButton.classList.add('active');

    // Показываем контейнер
    defaultContainer.style.display = 'flex';
    defaultContainer.style.opacity = '1';

    // Убираем отображение других контейнеров (если открыты)
    document.getElementById('opium-container').style.display = 'none';
    document.getElementById('opium-container').style.opacity = '0';
};


 function activateButton(button, contentId) {
            // Убираем класс "active" у всех кнопок
            document.querySelectorAll('.content-button').forEach(btn => btn.classList.remove('active'));

            // Добавляем класс "active" к нажатой кнопке
            button.classList.add('active');

            // Скрываем все контейнеры
             document.getElementById('glitchcore-container').style.display = 'none';
        document.getElementById('opium-container').style.display = 'none';
  document.getElementById('glitchcore-container').style.opacity = '0';
        document.getElementById('opium-container').style.opacity = '0';
  // Показываем выбранный контейнер
        document.getElementById(contentId + '-container').style.display = 'flex';
		     
			 setTimeout(() => {document.getElementById(contentId + '-container').style.opacity = '1';}, 1)
 
        }








let currentAudio = null;
let currentButton = null;

function togglePlay(button) {
    const container = button.closest('.glitchcore-item') || button.closest('.opium-item');
    const parentContainer = container.closest('#glitchcore-container') || container.closest('#opium-container');
    const activeContainer = document.querySelector('.processing-sections[style*="display: flex"]');

    if (parentContainer !== activeContainer) {
        console.error("Трек не из активного контейнера!");
        return; // Прекращаем выполнение, если контейнер неактивный
    }

    const audioElement = container.querySelector('audio');
    if (!audioElement) {
        console.error("Аудиоэлемент не найден!");
        return;
    }

    if (currentAudio && currentAudio !== audioElement) {
        currentAudio.pause();
        if (currentButton) currentButton.textContent = '▶';
    }

    if (audioElement.paused) {
        audioElement.play();
        button.textContent = '❚❚';
        currentAudio = audioElement;
        currentButton = button;
    } else {
        audioElement.pause();
        button.textContent = '▶';
        currentAudio = null;
        currentButton = null;
    }

    audioElement.ontimeupdate = () => updateProgress(audioElement, container);
    audioElement.onended = () => button.textContent = '▶';
}



function updateProgress(audio, container) {
    const timer = container.querySelector('.track-timer');
    const progressFill = container.querySelector('.progress-fill');

    const currentTime = formatTime(audio.currentTime);
    const duration = formatTime(audio.duration || 0);

    // Обновление времени
    timer.textContent = `${currentTime} / ${duration}`;

    // Обновление прогрессбара
    const progressPercentage = (audio.currentTime / audio.duration) * 100 || 0;
    progressFill.style.clipPath = `inset(0 ${100 - progressPercentage}% 0 0)`;
}

function seekAudio(event, progressBar) {
    const container = progressBar.closest('.glitchcore-item');
    const audio = container.querySelector('audio');
    const playPauseButton = container.querySelector('.play-pause-btn');

    // Координаты и ширина прогрессбара
    const rect = progressBar.getBoundingClientRect();
    const clickX = event.clientX - rect.left;
    const progressWidth = rect.width;

    // Процент клика на прогрессбаре
    const percentage = clickX / progressWidth;
    console.log('Clicked percentage:', percentage);

    if (audio.duration) {
        // Устанавливаем новое время воспроизведения
        audio.currentTime = percentage * audio.duration;
        console.log('New audio time:', audio.currentTime);

        // Запускаем аудио, если оно на паузе
        if (audio.paused) {
            audio.play().then(() => {
                playPauseButton.textContent = '❚❚'; // Обновляем кнопку
                console.log('Audio started playing');
            }).catch(err => console.error('Error playing audio:', err));
        }

        // Ставим на паузу другой трек
        if (currentAudio && currentAudio !== audio) {
            currentAudio.pause();
            if (currentButton) currentButton.textContent = '▶';
        }

        currentAudio = audio;
        currentButton = playPauseButton;

        // Устанавливаем обработчик обновления прогресса
        audio.ontimeupdate = () => updateProgress(audio, container);
        audio.onended = () => playPauseButton.textContent = '▶';
    } else {
        console.error('Audio duration is not loaded yet.');
    }
}






function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60).toString().padStart(2, '0');
    return `${minutes}:${secs}`;
}
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60).toString().padStart(2, '0');
    return `${minutes}:${secs}`;
}



document.querySelectorAll('.progress-bar').forEach(container => {
    container.addEventListener('click', function (e) {
        const rect = container.getBoundingClientRect();
        const clickPosition = e.clientX - rect.left;
        const progressWidth = container.offsetWidth;

        const clickedPercentage = clickPosition / progressWidth;
        const audio = container.closest('.glitchcore-item').querySelector('audio');
        
        audio.currentTime = clickedPercentage * audio.duration;
    });
});

document.querySelectorAll('.progress-bar').forEach(progressBar => {
    progressBar.addEventListener('click', function (event) {
        handleProgressBarClick(event, this); // Передаем текущий элемент в функцию
    });
});

document.querySelectorAll('.progress-bar').forEach(container => {
    container.addEventListener('click', function (e) {
        const rect = container.getBoundingClientRect();
        const clickPosition = e.clientX - rect.left;
        const progressWidth = container.offsetWidth;

        const clickedPercentage = clickPosition / progressWidth;
        const audio = container.closest('.glitchcore-item').querySelector('audio');

        audio.currentTime = clickedPercentage * audio.duration;
    });
});

function updateProgress(audio, container) {
    const progressFill = container.querySelector('.progress-fill');
    const timer = container.querySelector('.track-timer');
    const percentage = (audio.currentTime / audio.duration) * 100;

    // Обновляем clip-path
    progressFill.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;

    // Обновляем таймер
    timer.textContent = `${formatTime(audio.currentTime)} / ${formatTime(audio.duration)}`;
}






function handleProgressBarClick(event, progressBar) {
    const container = progressBar.closest('.glitchcore-item');
    const audio = container.querySelector('audio');
    const playPauseButton = container.querySelector('.play-pause-btn');

    const rect = progressBar.getBoundingClientRect();
    const clickX = event.clientX - rect.left;
    const progressWidth = rect.width;

    const percentage = clickX / progressWidth;

    if (audio.duration) {
        audio.currentTime = percentage * audio.duration;

        // Запускаем трек, если он на паузе
        if (audio.paused) {
            audio.play();
            playPauseButton.textContent = '❚❚';
        }

        // Если был другой активный трек, останавливаем его
        if (currentAudio && currentAudio !== audio) {
            currentAudio.pause();
            if (currentButton) currentButton.textContent = '▶';
        }

        currentAudio = audio;
        currentButton = playPauseButton;

        audio.ontimeupdate = () => updateProgress(audio, container);
        audio.onended = () => playPauseButton.textContent = '▶';
    } else {
        console.error('Audio duration is not available yet.');
    }
}

// Подключение обработчика к каждому прогресс-бару
document.querySelectorAll('.progress-bar').forEach(progressBar => {
    const container = progressBar.closest('.glitchcore-item');
    const audio = container.querySelector('audio');

    progressBar.addEventListener('click', event => {
        handleProgressBarClick(event, audio, container);
    });
});


document.querySelectorAll('.custom-file-input').forEach(input => {
    const label = input.nextElementSibling;
    input.addEventListener("change", event => {
        const fileName = event.target.files[0]?.name || "Добавить файл";
        label.innerHTML = `<span style="font-size: 1vw;">${fileName}</span>`;
    });
});




function openOrderForm() {
    window.scrollTo({ top: 0, behavior: 'smooth' }); // Прокрутка вверх с плавным эффектом
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('orderForm').style.display = 'block';
}

function closeOrderForm() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('orderForm').style.display = 'none';
}



document.addEventListener("DOMContentLoaded", () => {
    const fileInput = document.querySelector("#file-upload");
    const fileLabel = document.querySelector(".upload-label");

    fileInput.addEventListener("change", (event) => {
        const fileName = event.target.files[0]?.name || "Добавить файл";

        // Устанавливаем имя файла с нужным стилем
        if (event.target.files[0]) {
            fileLabel.innerHTML = `<span style="font-size: 1vw;">${fileName}</span>`;
        } else {
            fileLabel.textContent = "Добавить файл"; // Сбрасываем текст, если файл не выбран
        }
    });
});



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


