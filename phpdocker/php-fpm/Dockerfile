FROM phpdockerio/php80-fpm:latest
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        librdkafka-dev \
        git \ 
        php8.0-pgsql \
        php8.0-xdebug \
        php8.0-dev \
        make \
        php-pear; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN pecl install rdkafka

RUN echo extension=rdkafka.so > /etc/php/8.0/fpm/php.ini
RUN echo extension=rdkafka.so > /etc/php/8.0/cli/php.ini