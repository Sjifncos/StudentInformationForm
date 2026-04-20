FROM php:8.2-cli

# Install system dependencies + Node.js 20 (more stable than default)
RUN apt-get update && apt-get install -y \
    curl unzip git \
    libzip-dev libxml2-dev \
    && docker-php-ext-install zip

# Install Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x -o /tmp/setup_20.x \
    && echo "2c4c6683a17b6f4128898a7b521e3c8bb725a99ffaf1b5e32ac97c6fa7d381be /tmp/setup_20.x" | sha256sum -c - \
    && bash /tmp/setup_20.x \
    && rm /tmp/setup_20.x \
    && apt-get install -y nodejs

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN rm -f .env

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies (including @tailwindcss/vite)
RUN npm ci

# Build assets (Vite + Tailwind)
RUN npm run build

# Verify Tailwind compiled correctly
RUN ls -la public/build/assets/

RUN chmod -R 777 storage bootstrap/cache

RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 8080

RUN useradd -U -u 1000 appuser && chown -R 1000:1000 /var/www
USER 1000


CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
