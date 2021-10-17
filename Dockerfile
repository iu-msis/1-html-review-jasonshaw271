FROM php:7.4-apache

LABEL maintainer="Jason Shaw"

RUN docker-php-ext-install pdo_mysql

#Set the working directory in the image
WORKDIR /srv/app

COPY app /srv/app

# PHP configuration
COPY docker/php/php.ini /usr/local/etc/php/php.ini

COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
