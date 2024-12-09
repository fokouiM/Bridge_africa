# Utiliser une image PHP avec Apache
FROM php:8.1-apache

# Installer les extensions requises et git
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zlib1g-dev \
    git \
    unzip \
 && docker-php-ext-configure zip \
 && docker-php-ext-install zip \
 && docker-php-ext-install pdo pdo_mysql

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html

# Configurer le répertoire de travail
WORKDIR /var/www/html

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances de Composer
RUN composer install
RUN php artisan migrate --force

# Exposer le port 80
EXPOSE 80
