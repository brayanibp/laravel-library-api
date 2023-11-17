FROM php:8.2-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

ADD ./library-api/ /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN chown -R laravel:laravel /var/www/html

RUN cd /var/www/html && php artisan migrate
