#!/bin/bash
set -e

# Export secrets
export DB_PASSWORD=$(cat /run/secrets/db_password)
export APP_KEY=$(cat /run/secrets/app_key)

# Clear Laravel cache supaya env terbaru terbaca
php artisan config:clear
php artisan cache:clear

# Jalankan Laravel
php artisan serve --host=0.0.0.0 --port=8000
