FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl unzip git npm nodejs \
    libzip-dev libxml2-dev \
    && docker-php-ext-install zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project files
COPY . .

# Remove any existing .env to force use of Render environment variables
RUN rm -f .env

# Install dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Permissions
RUN chmod -R 777 storage bootstrap/cache

# Clear any cached config (so Render env vars are used)
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
