FROM dunglas/frankenphp

# Production:
RUN cp $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
 
RUN install-php-extensions pcntl mysql curl gd intl zip xml mbstring opcache bcmath memcached apcu exif sqlite
 
COPY . /app
 
ENTRYPOINT ["php", "artisan", "octane:frankenphp"]