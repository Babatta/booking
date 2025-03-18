# Utiliser PHP 8.3 avec Apache
FROM php:8.3-apache AS base

# Installer les dépendances requises et les extensions PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    libicu-dev \
    libzip-dev \
    default-mysql-client \
    && docker-php-ext-install pdo_mysql gd intl zip \
    && a2enmod rewrite


WORKDIR /var/www/html


COPY . .


RUN apt-get install -y curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader


RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache


COPY docker-init.sh /usr/local/bin/docker-init.sh
RUN chmod +x /usr/local/bin/docker-init.sh


EXPOSE 80
# Copier la configuration Apache personnalisée
COPY apache-laravel.conf /etc/apache2/sites-available/000-default.conf

# Activer mod_rewrite et redémarrer Apache
RUN a2enmod rewrite


CMD ["/bin/bash", "-c", "/usr/local/bin/docker-init.sh && apache2-foreground"]
