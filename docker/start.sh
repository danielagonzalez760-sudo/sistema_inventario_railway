#!/bin/sh

# 1. Limpiar a la fuerza cualquier motor cruzado de Apache
rm -f /etc/apache2/mods-enabled/mpm_event.load
rm -f /etc/apache2/mods-enabled/mpm_worker.load
a2enmod mpm_prefork

# 2. Configurar el puerto dinámico de Railway
sed -i "s/80/${PORT:-80}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# 3. Asegurar permisos correctos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 4. Limpiar cache de Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# NOTA: Comentamos las migraciones temporalmente hasta conectar la base de datos
# php artisan migrate --force

# 5. Iniciar Apache
apache2-foreground
