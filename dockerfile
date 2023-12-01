# Use an official PHP image
FROM php:8.1-apache

WORKDIR /var/www/html

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer in the PHP image
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the code and install the dependencies
COPY . .
RUN composer install
EXPOSE 80