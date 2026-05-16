FROM php:8.3-cli

# System packages
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy source code
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port Render sẽ dùng
EXPOSE 10000

# Start app
CMD sh -c "php artisan migrate:fresh --seed && php artisan serve --host=0.0.0.0 --port=10000"
