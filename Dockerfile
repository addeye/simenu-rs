FROM php:7.3-apache

RUN apt update
RUN apt install -y git zip unzip

RUN apt install -y curl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /var/www/html/
WORKDIR /var/www/html/

RUN rm -rf /var/www/html/vendor /var/www/html/composer.lock

# add ext-gd
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev && docker-php-ext-install gd

RUN a2enmod rewrite

RUN composer install

EXPOSE 80
