# Imagem base do PHP com Apache
FROM php:8.3.13-apache

# Instalar extensões necessárias
RUN docker-php-ext-install pdo pdo_pgsql

# Copiar arquivos da API para o container
COPY . /var/www/html/

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html
