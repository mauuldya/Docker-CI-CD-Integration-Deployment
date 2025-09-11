#!/bin/bash
set -e

# Ambil secrets dari Swarm (kalau ada)
if [ -f /run/secrets/db_password ]; then
  export DB_PASSWORD=$(cat /run/secrets/db_password)
fi

if [ -f /run/secrets/app_key ]; then
  export APP_KEY=$(cat /run/secrets/app_key)
fi

# Bersihkan cache supaya env terbaru terbaca
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Jalankan migrasi (biar schema sync)
php artisan migrate --force || true

# Start Laravel
exec php artisan serve --host=0.0.0.0 --port=8000