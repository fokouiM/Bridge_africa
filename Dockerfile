# Étape 1: Utiliser une image PHP officielle
FROM php:8.1-cli

# Étape 2: Installer des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Étape 3: Définir le répertoire de travail
WORKDIR /app

# Étape 4: Copier les fichiers nécessaires à Composer en premier
COPY . /app

# Étape 5: Installer Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Étape 6: Copier le reste des fichiers de l'application
# COPY . /app/

# Étape 7: Exposer le port et définir la commande de démarrage
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
