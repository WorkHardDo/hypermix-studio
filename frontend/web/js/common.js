function switchAuthTab(tab) {
    const loginTab = document.getElementById('login-tab');
    const signupTab = document.getElementById('signup-tab');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');

    if (tab === 'login') {
        loginTab.classList.add('active');
        signupTab.classList.remove('active');
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
    } else {
        signupTab.classList.add('active');
        loginTab.classList.remove('active');
        signupForm.style.display = 'block';
        loginForm.style.display = 'none';
    }
}


function toggleContainer() {
    const container = document.getElementById('container');
    if (!container) return;
    const currentDisplay = window.getComputedStyle(container).display;
    container.style.display = currentDisplay === 'none' ? 'block' : 'none';
}

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
    // Устанавливаем активное состояние кнопки
    const defaultButton = document.getElementById('glitchcore-button');
    const defaultContainer = document.getElementById('glitchcore-container');

    // Активируем кнопку
    defaultButton.classList.add('active');

    // Показываем контейнер
    defaultContainer.style.display = 'flex'; 
	defaultContainer.style.opacity = '1';
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

function togglePlay(button, audioSrc) {
    const container = button.closest('.glitchcore-item');
    const audioElement = container.querySelector('audio');
    
    if (!audioElement) {
        console.error("Аудиоэлемент не найден!");
        return;
    }

    // Если аудио меняется, останавливаем текущее воспроизведение
    if (currentAudio && currentAudio !== audioElement) {
        currentAudio.pause();
        if (currentButton) currentButton.textContent = '▶';
    }

    // Управляем текущим состоянием аудио
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

    // Обновляем прогресс и отображение времени
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

    const rect = progressBar.getBoundingClientRect();
    const clickX = event.clientX - rect.left;
    const percentage = clickX / rect.width;

    // Устанавливаем новое время воспроизведения
    audio.currentTime = percentage * audio.duration;

    // Проверяем, воспроизводится ли другой трек
    if (currentAudio && currentAudio !== audio) {
        currentAudio.pause(); // Ставим на паузу текущий трек
        if (currentButton) currentButton.textContent = '▶'; // Обновляем кнопку предыдущего трека
    }

    // Обновляем ссылки на новый трек и кнопку
    currentAudio = audio;
    currentButton = playPauseButton;

    // Запускаем воспроизведение нового трека
    if (audio.paused) {
        audio.play();
        playPauseButton.textContent = '❚❚';
    }

    // Обновляем прогресс и таймер при воспроизведении
    audio.ontimeupdate = () => updateProgress(audio, container);
    audio.onended = () => playPauseButton.textContent = '▶';
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




function openOrderForm(service) {
    window.scrollTo({ top: 0, behavior: 'smooth' }); // Прокрутка вверх
    document.getElementById('overlay').style.display = 'block';

    // Скрыть все формы и показать только нужную
    document.querySelectorAll('.order-form').forEach(form => {
        form.style.display = 'none';
    });

    document.getElementById(`orderForm-${service}`).style.display = 'block';
}


function closeOrderForm() {
    document.getElementById('overlay').style.display = 'none';

    // Скрыть все формы
    document.querySelectorAll('.order-form').forEach(form => {
        form.style.display = 'none';
    });
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








function scrollCarousel(direction) {
    const carousel = document.getElementById('carousel');
    const isMobile = window.innerWidth <= 768;
    const scrollDistance = isMobile 
        ? (80 * window.innerWidth / 100) // 80vw для мобильных
        : (60 * window.innerWidth / 100) + 60; // 60vw + 60px для десктопа
    carousel.scrollBy({
        left: direction * scrollDistance,
        behavior: 'smooth'
    });
}



