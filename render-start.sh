#!/bin/bash

set -e

echo "Starting Laravel..."

# Create sqlite db
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Permissions
chown -R www-data:www-data storage bootstrap/cache database
chmod -R 775 storage bootstrap/cache database

# Clear caches
php artisan optimize:clear

# Generate key if missing
php artisan key:generate --force

# Migrate + seed
php artisan migrate --force
php artisan db:seed --force

# Storage link
php artisan storage:link || true

# Cache
php artisan config:cache
php artisan view:cache

echo "Laravel started!"

apache2-foreground
