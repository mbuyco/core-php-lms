FROM php:8.2-fpm-alpine

RUN apk --no-cache update && \
    apk --no-cache upgrade && \
    apk add \
        libpq-dev \
        php81-curl \
        php81-gd \
        php81-opcache \
        php81-pdo_pgsql \
        php81-pgsql \
        php81-zlib && \
    docker-php-ext-install pdo pdo_pgsql

COPY . /app
WORKDIR /app

EXPOSE 9000
