FROM dunglas/frankenphp:1-php8.2-bookworm

# Production:
RUN cp $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

RUN install-php-extensions pcntl 
#gd intl zip opcache bcmath memcached apcu exif sqlite
 
COPY . /app
 
ENTRYPOINT ["php", "artisan", "octane:frankenphp"]