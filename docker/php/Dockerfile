FROM php:8.4-fpm-alpine

RUN apk update \
    && apk upgrade --available \
    && apk add --virtual build-deps \
    zlib \
    zlib-dev \
    libpng \
    libpng-dev \
    libjpeg \
    libjpeg-turbo-dev \
    freetype \
    freetype-dev \
    autoconf \
    build-base \
    icu-dev \
    libevent-dev \
    openssl-dev \
    libzip \
    libzip-dev \
    bzip2 \
    git \
    libwebp-dev \
    postgresql-dev \
    linux-headers \
    libmemcached-dev \
    wget \
    bash \
    supervisor \
    npm \
    curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) \
    intl \
    gd \
    bcmath \
    pcntl \
    pdo_pgsql \
    sockets \
    zip

RUN pecl channel-update pecl.php.net \
    && pecl install -o -f \
        memcached \
        redis \
        event \
    && rm -rf /tmp/pear \
    && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
    && echo "extension=event.so" > /usr/local/etc/php/conf.d/event.ini \
    && echo "extension=memcached.so" > /usr/local/etc/php/conf.d/memcached.ini

RUN apk update \
    && pecl install xdebug-3.4.5 \
    && docker-php-ext-enable xdebug \
    && pecl clear-cache

ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN apk --no-cache add shadow \
    && groupmod --gid ${PGID} www-data \
    && usermod --uid ${PUID} --gid ${PGID} www-data \
    && apk del shadow

COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]

WORKDIR /app
CMD ["php-fpm"]
