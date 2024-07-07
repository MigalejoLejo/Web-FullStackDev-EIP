#!/bin/sh

# Run database migrations
php artisan migrate --force

# Run database seeding
php artisan db:seed --force

# Start the Laravel development server
php artisan serve --host=0.0.0.0 --port=8000
