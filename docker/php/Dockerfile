FROM php:7.4-fpm

COPY . /var/www

WORKDIR /var/www

# RUN apt-get update && \
#     apt-get install -y \
#     git \
#     zip \
#     curl \
#     sudo \
#     libmcrypt-dev

# RUN docker-php-ext-enable \
#     intl \
#     mbstring \
#     pgsql \
#     pdo_pgsql


RUN apt-get update && apt-get install -y \
    build-essential \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    unzip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl \
    wget \
    zsh

RUN docker-php-ext-configure zip

RUN docker-php-ext-install \
    bcmath \
    mbstring \
    pcntl \
    intl \
    zip \
    opcache

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# RUN docker-php-ext-install pdo_pgsql
# RUN docker-php-ext-install pgsql

RUN mv env .env

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# RUN chmod -R 777 writable
RUN chown -R www-data:www-data /var/www/writable

EXPOSE 9000
CMD ["php-fpm"]