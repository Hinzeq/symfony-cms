FROM php:8.3-fpm

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/symfony

COPY . .

RUN chown -R www-data:www-data /var/www/symfony

EXPOSE 9000
