FROM php:7.2-cli

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer global require phpunit/phpunit:5.7.12 \
    && ln -s $(composer global config home)/vendor/bin/phpunit /usr/local/bin/phpunit

COPY . /black_rabbit

WORKDIR /black_rabbit

RUN composer install

ENTRYPOINT ["phpunit", "/black_rabbit/test"]