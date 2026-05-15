#!/bin/sh

# Asegurar que los permisos sean correctos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Limpiar y cachear configuración para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ejecutar migraciones automáticamente
php artisan migrate --force

# Iniciar Apache en primer plano
apache2-foreground
