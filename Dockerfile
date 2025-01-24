FROM jitesoft/composer:7.3

RUN curl -O https://phar.phpunit.de/phpunit-5.7.12.phar \
    && chmod +x phpunit-5.7.12.phar \
    && mv phpunit-5.7.12.phar /usr/local/bin/phpunit

COPY . /black_rabbit

ENTRYPOINT ["phpunit", "/black_rabbit/test"]
