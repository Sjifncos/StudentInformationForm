FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    curl unzip git npm nodejs \
    libzip-dev libxml2-dev \
    && docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
