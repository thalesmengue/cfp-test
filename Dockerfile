FROM php:8.2-fpm

WORKDIR /var/www/app

RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y \
        procps \
        nano \
        git \
        unzip \
        libicu-dev \
        zlib1g-dev \
        libxml2 \
        libxml2-dev \
        libreadline-dev \
        supervisor \
        cron \
        sudo \
        libzip-dev

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
        pdo_mysql \
        sockets \
        intl \
        opcache \
        zip

RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y nodejs \
    npm

RUN npm install --global npm@9

RUN npm install --save-dev vite bootstrap @popperjs/core sass

RUN rm -rf /tmp/* \
    && rm -rf /var/list/apt/* \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER root

RUN chmod 777 -R /var/www/app

CMD ["php-fpm"]
