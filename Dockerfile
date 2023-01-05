FROM php:8.2-fpm-alpine

RUN apk --no-cache update && \
    apk --no-cache upgrade && \
    apk add php81-opcache php81-gd php81-zlib php81-curl

COPY . /app
WORKDIR /app

EXPOSE 9000
