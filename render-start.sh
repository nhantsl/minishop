#!/bin/bash

set -e

echo "Starting Laravel..."

touch /var/www/html/database/database.sqlite

mkdir -p storage/logs
touch storage/logs/laravel.log

chown -R www-data:www-data storage bootstrap/cache database
chmod -R 775 storage bootstrap/cache database

php artisan config:clear

php artisan migrate --force || true
php artisan db:seed --force || true

php artisan storage:link || true

php artisan config:cache
php artisan route:cache
php artisan view:cache

apache2-foreground
