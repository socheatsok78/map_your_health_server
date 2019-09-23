#!/usr/bin/env bash

set -e

role=${SERVICE_NAME:-app}
env=${APP_ENV:-production}

if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www/html && php artisan config:cache && php artisan route:cache && php artisan view:cache)
fi

if [ "$role" = "app" ]; then

    # Running tasks for "app" container
    echo "Starting Application Service..."
    exec php-fpm

elif [ "$role" = "queue" ]; then

    echo "Starting Queue Service..."
    php artisan horizon --verbose
    # php artisan queue:work --verbose

elif [ "$role" = "scheduler" ]; then

    echo "Starting Scheduler Service..."

    while [ true ]
    do
      php artisan schedule:run --verbose --no-interaction &
      sleep 60
    done

else
    echo "Could not match the container role \"$role\""
    exit 1
fi
