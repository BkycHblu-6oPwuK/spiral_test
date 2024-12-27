FROM ghcr.io/roadrunner-server/roadrunner:latest AS roadrunner 
FROM php:8.3-cli

ENV SUPERVISOR_PHP_USER="appuser"

# Создание пользователя и группы
RUN groupadd -g 1000 appuser \
    && useradd -ms /bin/bash -u 1000 -g appuser appuser

# Копирование бинарного файла RoadRunner
COPY --from=roadrunner /usr/bin/rr /usr/local/bin/rr

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y \
    apt-utils \
    libpq-dev \ 
    libpng-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    zip \
    unzip \
    jpegoptim \
    optipng \
    ghostscript \
    git

# Конфигурация и установка PHP-расширений
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm && \
    docker-php-ext-install sockets pdo_mysql mysqli bcmath gd zip pdo_pgsql

# Установка Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

# Установка рабочего каталога
WORKDIR /home/appuser/site