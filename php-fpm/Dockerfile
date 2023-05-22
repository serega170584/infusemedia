FROM php:8.2-fpm-alpine
WORKDIR "/app"

RUN apk add php-cli
RUN apk add git
RUN apk add mysql-client

RUN apk add --no-cache --update --virtual buildDeps autoconf \
     && apk add build-base \
     && apk add --update linux-headers \
     && pecl install xdebug \
     && docker-php-ext-enable xdebug \
     && apk del buildDeps

RUN echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN docker-php-ext-install pdo pdo_mysql

RUN addgroup -g 1000 app && adduser -u 1000 -G app -s /bin/sh -D app