FROM php:7.4

WORKDIR /src

# копирует все из src в текущую рабочую директорию
COPY /src .

ENTRYPOINT ["php", "vendor/bin/phpunit", "."]