# Imagem base do PHP com Apache
FROM php:8.2-apache

# Instalar dependências do sistema necessárias para o PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar arquivos da API para o container
COPY . /var/www/html/

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html

# Limpar cache para reduzir o tamanho da imagem
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
