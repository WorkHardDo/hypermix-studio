FROM php:8.1-apache

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git libonig-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка рабочей директории
WORKDIR /var/www/html

# Копирование всех файлов проекта
COPY . .

# Установка зависимостей
RUN composer install --no-dev --optimize-autoloader --prefer-dist -vvv

# Включение mod_rewrite
RUN a2enmod rewrite

# Настройка Apache
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/frontend/web|g' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/frontend/web>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Установка прав доступа
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Установка переменной окружения для Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/frontend/web

EXPOSE 80
CMD ["apache2-foreground"]
