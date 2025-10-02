# Example content:
FROM php:8.2-fpm
RUN apt-get update && apt-get install -y git unzip libzip-dev libonig-dev && docker-php-ext-install zip
RUN pecl install mongodb && docker-php-ext-enable mongodb
WORKDIR /var/www/html
COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-scripts --no-interaction
COPY . .
EXPOSE 9000
CMD ["php-fpm"]
