#!/bin/sh

# Démarre PHP-FPM en arrière-plan
/usr/sbin/php-fpm8.0 -D

# Démarre Nginx
service nginx start

# Exécute les migrations
php artisan migrate --force

# Lance Horizon en arrière-plan
php artisan horizon

# Lance Laravel Echo Server
laravel-echo-server start --config laravel-echo-server.json
