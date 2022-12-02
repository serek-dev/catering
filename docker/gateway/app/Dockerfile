FROM php:8.1.8-fpm-alpine

COPY . /app
WORKDIR /app

COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --no-plugins \
    --no-scripts \
    --prefer-dist

COPY . .
