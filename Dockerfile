FROM php:8.3-fpm

RUN docker-php-ext-install pdo_mysql pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
