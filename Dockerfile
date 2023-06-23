# Define a imagem base
FROM php:7.4-apache

# Diretório de trabalho dentro do contêiner
WORKDIR /var/www/html

# Copia os arquivos do projeto para o contêiner
COPY . .

# Instala as dependências do Laravel usando o Composer
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        zip \
        unzip \
        libpng-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install gd \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --optimize-autoloader --no-dev \
    && chown -R www-data:www-data storage

# Configura o VirtualHost do Apache
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Habilita o módulo mod_rewrite do Apache
RUN a2enmod rewrite

# Define as variáveis de ambiente para o Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV APACHE_LOG_DIR=/var/www/html/storage/logs

# Expõe a porta do Apache
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]
