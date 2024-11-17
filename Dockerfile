FROM dunglas/frankenphp:1-php8.2-bookworm

# Production:
RUN cp $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libicu-dev \
    libxml2-dev \
    zlib1g-dev \
    libzip-dev \
    libsqlite3-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd intl zip pcntl bcmath opcache
 
RUN install-php-extensions pcntl gd intl zip opcache bcmath memcached apcu exif sqlite
 
COPY . /app
 
ENTRYPOINT ["php", "artisan", "octane:frankenphp"]