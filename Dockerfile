# Use a imagem oficial do PHP com Apache
FROM php:apache

# Instale a extensão MySQLi
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copie os arquivos da aplicação para o diretório do Apache
COPY ./src /var/www/html

# Exponha a porta 80 para o Apache
EXPOSE 80
