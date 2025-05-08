FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libzip-dev unzip git libonig-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . /var/www/html

WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

RUN a2enmod rewrite

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/frontend/web|g' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/frontend/web>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

ENV APACHE_DOCUMENT_ROOT=/var/www/html/frontend/web

EXPOSE 80
CMD ["apache2-foreground"]
