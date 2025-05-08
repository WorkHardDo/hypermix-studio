FROM php:8.1-apache

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git libonig-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd

# Копируем файлы проекта
COPY . /var/www/html

# Переход в нужную директорию
WORKDIR /var/www/html

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка PHP-зависимостей (если есть composer.lock — он будет использован)
RUN composer install --no-dev --optimize-autoloader

# Включаем mod_rewrite
RUN a2enmod rewrite

# Настройки Apache для ЧПУ (URL rewriting)
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/frontend/web|g' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/frontend/web>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Устанавливаем переменную окружения
ENV APACHE_DOCUMENT_ROOT=/var/www/html/frontend/web
