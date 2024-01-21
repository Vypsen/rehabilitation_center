FROM php:8.0-fpm

RUN sudo apt-get update && sudo apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libonig-dev \
    zip \
    libzip-dev \
    libpq-dev \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl && \
    pecl install xdebug-3.0.1 && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

RUN sudo curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN sudo apt-get install -y nodejs

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN sudo curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin \

USER civz
EXPOSE 9000

CMD ["php-fpm"]
