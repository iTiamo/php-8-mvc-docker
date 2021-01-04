FROM php:8.0.0-apache
# Install mysqli
RUN docker-php-ext-install mysqli
# Enable Apache mod_rewrite
RUN a2enmod rewrite \
    && service apache2 restart
# Build, install & configure Xdebug 3.0.1
RUN curl http://xdebug.org/files/xdebug-3.0.1.tgz --output xdebug-3.0.1.tgz \
    && apt-get update \
    && apt-get install autoconf automake \
    && tar -xvzf xdebug-3.0.1.tgz \ 
    && cd xdebug-3.0.1 \
    && phpize \
    && ./configure \
    && make \
    && cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20200930 \
    && touch /usr/local/etc/php/php.ini \
    && echo 'zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20200930/xdebug.so' >> /usr/local/etc/php/php.ini
COPY ./xdebug.ini /usr/local/etc/php/conf.d/