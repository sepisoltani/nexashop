# syntax=docker/dockerfile:1

# -----------------------------------------------------------------------------
# Stage: frontend — compiles Tailwind CSS / the Vazirmatn font bundle with Vite
# -----------------------------------------------------------------------------
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js ./
COPY resources ./resources
RUN npm run build

# -----------------------------------------------------------------------------
# Stage: vendor — installs PHP dependencies and assembles the application code
# -----------------------------------------------------------------------------
FROM php:8.4-fpm-alpine AS vendor

RUN apk add --no-cache bash git unzip \
    && apk add --no-cache --virtual .build-deps libxml2-dev oniguruma-dev \
    && docker-php-ext-install pdo_mysql mbstring bcmath pcntl xml \
    && docker-php-ext-enable opcache \
    && apk del .build-deps

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install dependencies first so this layer is cached unless composer.json/lock change.
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

COPY . .
COPY --from=frontend /app/public/build ./public/build

# Dumping the autoloader (with scripts enabled) triggers `artisan package:discover`,
# which needs the full application tree — hence running it after `COPY . .` above.
RUN composer dump-autoload --optimize \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# -----------------------------------------------------------------------------
# Stage: app — the PHP-FPM runtime image (the "app" service in docker-compose)
# -----------------------------------------------------------------------------
FROM vendor AS app

COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 9000
ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]

# -----------------------------------------------------------------------------
# Stage: webserver — Nginx serving the compiled public/ directory
#   (only needs the static public/ tree from the vendor stage, not PHP or vendor/)
# -----------------------------------------------------------------------------
FROM nginx:1.27-alpine AS webserver

COPY --from=vendor /var/www/html/public /var/www/html/public
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
