# Utiliser l'image officielle de PHP avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    curl \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql zip

RUN apt-get install -y libffi-dev && docker-php-ext-install pcntl

# Ajouter le répertoire sécurisé pour Git
RUN git config --global --add safe.directory /var/www/html
# Installer et activer l'extension Redis
RUN pecl install redis && docker-php-ext-enable redis

# Installer Node.js et Yarn
RUN apt-get update && apt-get install -y curl gnupg
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install -g yarn

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurer le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet
COPY . .

# Copier la configuration Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Donner les permissions nécessaires pour le stockage et le cache Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Activer le module Apache mod_rewrite
RUN a2enmod rewrite
RUN a2enmod proxy proxy_http proxy_wstunnel
RUN apache2ctl configtest

# Installer les dépendances de Composer
RUN rm composer.lock
RUN composer install --no-dev --optimize-autoloader
RUN php artisan config:cache
RUN php artisan config:clear
RUN php artisan view:cache
# RUN php artisan websockets:serve
# RUN yarn install
# RUN yarn production
RUN php artisan migrate --force

# Exposer le port 80
EXPOSE 80


# #Utilisez l'image officielle PHP avec PHP-FPM intégré
# FROM itkdev/php8.2-fpm

# USER root

# # Installer les extensions PHP nécessaires
# RUN apt-get update && apt-get install -y \
#     git \
#     unzip \
#     curl \
#     libzip-dev \
#     libpq-dev \
#     libonig-dev \
#     libcurl4-openssl-dev \
#     default-mysql-client \
#     nginx \
#     supervisor

# # Installer et activer l'extension Redis
# RUN pecl install redis

# # Installer Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Installer Node.js et Yarn
# RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
#     && apt-get install -y nodejs \
#     && npm install -g yarn

# # Copier les fichiers de l'application
# WORKDIR /var/www/html
# COPY . .
# RUN rm composer.lock
# RUN composer install
# # RUN npm install -g laravel-echo-server
# # Run laravel-echo-server init
# # RUN php artisan horizon:install
# # Run php artisan storage:link
# # RUN yarn install
# # RUN yarn production
# # RUN npm install -g pm2
# RUN php artisan config:cache
# # RUN php artisan route:cache
# RUN php artisan view:cache

# # Donner les permissions nécessaires
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
# RUN chown -R www-data:www-data /var/www/html/entrypoint.sh
# RUN chmod +x /var/www/html/entrypoint.sh


# # Copier les configurations Nginx et Supervisor
# COPY ./default.conf /etc/nginx/conf.d/default.conf
# COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# RUN /usr/sbin/php-fpm8.2 -D
# RUN service nginx restart
# # Exposer les ports nécessaires
# EXPOSE 80

# # Lancer Supervisor pour gérer PHP-FPM et Nginx
# # CMD ["service nginx restart"]
# # CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
# # ENTRYPOINT ["service nginx restart "]
