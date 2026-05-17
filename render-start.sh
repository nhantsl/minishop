#!/bin/bash

set -e

echo "Starting Laravel..."

# Ensure sqlite exists
touch /var/www/html/database/database.sqlite

# Permissions
chown -R www-data:www-data storage bootstrap/cache database

# Clear caches
php artisan config:clear

# Run migrations
php artisan migrate --force

# Optional seed
php artisan db:seed --force || true

# NOW clear cache safely
php artisan cache:clear || true

# Cache configs
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start apache
apache2-foreground
