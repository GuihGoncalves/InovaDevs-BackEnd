FROM php:8.3.13-apache
RUN docker-php-ext-install pdo pdo_pgsql
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
