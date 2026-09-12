#!/bin/sh
set -e

cd /var/www/html

if [ "${APP_ENV:-local}" = "production" ]; then
    echo "Production environment detected."
    echo "Skipping automatic key generation, migrations and seeding."

else
    echo "Local development environment detected."

    # Create local .env if it does not exist
    if [ ! -f .env ]; then
        cp .env.example .env
    fi

    # Generate APP_KEY only when there isn't already one
    if [ -z "${APP_KEY:-}" ] && ! grep -q "^APP_KEY=base64:" .env 2>/dev/null; then
        php artisan key:generate --force --no-interaction
    fi

    echo "Waiting for the database to accept connections..."

    attempts=0

    until php artisan db:show >/dev/null 2>&1; do
        attempts=$((attempts + 1))

        if [ "$attempts" -ge 30 ]; then
            echo "Database did not become ready in time." >&2
            exit 1
        fi

        sleep 2
    done

    echo "Database is ready."

    php artisan migrate --force
    php artisan db:seed --force
fi

exec "$@"